<?php

namespace App\Http\Controllers;

// use App\Models\District;
use App\Models\Guru;
use App\Models\MemberCourse;
use App\Models\Pelatihan;
// use App\Models\Province;
use App\Models\Regency;
use App\Models\TipePelatihan;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Laravolt\Indonesia\Models\Province;
// use Laravolt\Indonesia\Models\City;
// use Laravolt\Indonesia\Models\District;
// use Laravolt\Indonesia\Models\Village;

use Illuminate\Support\Facades\Log; // Tambahkan ini
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;
use Spatie\Permission\Models\Role;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class HomeController extends Controller
{
    //

    public function create()
    {
        $provinces = Province::pluck('name', 'id');
        return view('your-view', compact('provinces'));
    }
    public function index()
    {
        $tipepelatihan = TipePelatihan::orderBy('trainer_type_name', 'asc')->get();

        // Debug hasil query
        \Log::info($tipepelatihan);

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
        $tipepelatihan = TipePelatihan::orderBy('trainer_type_name', 'asc')->get();

        return view('tipepelatihan', data: compact('tipepelatihan'));
    }

    public function pelatihan()
    {
        $pelatihan = Pelatihan::latest()->get();
        return view(view: 'pelatihan', data: compact('pelatihan'));
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
        // Mengambil detail pelatihan beserta peserta dan guru
        $detail = Pelatihan::with('peserta.guru')->where('id', $id)->firstOrFail();

        // Mengambil peserta yang terdaftar dengan status 2
        $peserta = $detail->peserta()->where('status', 2)->get();

        // Debugging: Cek apakah peserta berhasil diambil
        // dd($detail);
        // Ini akan menampilkan isi dari $peserta

        return view('detail_pelatihan', compact('detail', 'peserta'));
    }



    public function getCities($provinceId)
    {
        $cities = Regency::where('province_id', $provinceId)->pluck('name', 'id');
        return response()->json($cities);
    }

    public function getDistricts($cityId)
    {
        $districts = District::where('regency_id', $cityId)->pluck('name', 'id');
        return response()->json($districts);
    }

    public function getVillages($districtId)
    {
        $villages = Village::where('district_id', $districtId)->pluck('name', 'id');
        return response()->json($villages);
    }




    public function registercourse($id = null)
    {

        if (Auth::user()) {
            $course = Pelatihan::where('id', $id)->first();
            $user = Auth::user()->id;
            $status = MemberCourse::where('user_id', $user)->where(
                'pelatihan_id',
                $course->id
            )->first();
            if ($status != null) {
                $status = 'terdaftar';
            } else {
                $status = 'mendaftar';
            }
            return view('confirm', compact('course', 'user', 'status'));
        } else {
            return redirect('/login');
        }
    }

    // public function registercoursedo(Request $request)
    // {
    //     $data = $request->all();
    //     MemberCourse::create($data);
    //     return redirect()->back()->with('success', 'Berhasil mendaftar');
    public function registercoursedo(Request $request)
    {
        $data = $request->all();
        MemberCourse::create($data);
        return redirect()->route('pelatihan_saya')->with('success', 'Berhasil mendaftar');
    }

    // TERUNTUK nambah data ke table guru


}
