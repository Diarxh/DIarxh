<?php

namespace App\Http\Controllers;

// use App\Models\District;
use App\Models\MemberCourse;
use App\Models\Regency;
// use App\Models\Province;
use App\Models\Teacher;
use App\Models\Training;
use App\Models\TrainingType;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Laravolt\Indonesia\Models\Province;
// use Laravolt\Indonesia\Models\City;
// use Laravolt\Indonesia\Models\District;
// use Laravolt\Indonesia\Models\Village;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    //home
    public function index()
    {
        $tipepelatihan = TrainingType::orderBy('trainer_type_name', 'asc')->get();

        // Debug hasil query
        // \Log::info($tipepelatihan);
        return view('home', compact('tipepelatihan'));
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function pelatihan_saya()
    {
        $user_id = auth()->id();
        $pelatihan = MemberCourse::where('user_id', $user_id)->with('pelatihan')->get();
        return view('user.pelatihan_saya', compact('pelatihan'));
    }
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function tipe_pelatihan()
    {
        $tipepelatihan = TrainingType::orderBy('trainer_type_name', 'asc')->get();

        return view('tipepelatihan', data: compact('tipepelatihan'));
    }

    public function pelatihan(Request $request)
    {
        // Ambil query pencarian dari form
        $search = $request->input('search');

        // Query pelatihan dengan pencarian jika ada, dan urutkan berdasarkan yang terbaru
        $pelatihan = Training::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(1); // Menampilkan 12 item per halaman

        // Kirim data pelatihan dan pencarian ke view
        return view('pelatihan', compact('pelatihan', 'search'));
    }

    public function detail_profile()
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->first();
        $roles = $user->roles; // Assuming you're using a roles relationship

        if (!$guru) {
            return view('user.detail_profile', compact('user', 'roles'))->with('alert', 'Anda belum memiliki data guru. Silakan lengkapi data Anda.');
        }

        return view('user.detail_profile', compact('user', 'guru', 'roles'));
    }

    public function detail_pelatihan(int $id)
    {
        $detail = Training::with('peserta.guru')->findOrFail($id);
        $peserta = MemberCourse::with('guru')->where('training_id', $id)->get();

        return view('detail_pelatihan', compact('detail', 'peserta'));
    }
    // / TrainingController.php
    public function registercoursedo(Request $request)
    {
        try {
            // Cek apakah sudah terdaftar
            $existing = MemberCourse::where('user_id', $request->user_id)
                ->where('training_id', $request->training_id)
                ->first();

            if ($existing) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah terdaftar di pelatihan ini'
                ], 400);
            }

            // Buat pendaftaran baru
            MemberCourse::create([
                'training_id' => $request->training_id,
                'user_id' => $request->user_id,
                'status' => 1
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendaftar pelatihan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // TERUNTUK nambah data ke table guru

}