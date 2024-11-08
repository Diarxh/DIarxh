<?php

namespace App\Http\Controllers;

use App\Models\MemberCourse;
use App\Models\Teacher;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Teacher::where('user_id', $user->id)->first();
        $roles = $user->roles;
        $totalPelatihan = Training::count();
        $pelatihanSaya = MemberCourse::where('user_id', Auth::id())->count();
        $penggunaAktif = User::count();

        // Ambil pelatihan terbaru yang diikuti oleh pengguna
        $recentPelatihan = MemberCourse::with('Training')  // Pastikan relasi 'Training' didefinisikan dengan benar di model MemberCourse
            ->where('user_id', Auth::id())
            ->latest()  // Mengambil yang terbaru
            ->take(5)  // Mengambil 5 pelatihan terbaru, atau ubah sesuai kebutuhan
            ->get();  // Mengambil semua pelatihan yang diikuti pengguna

        return view('user.dashboard_user', compact('totalPelatihan', 'pelatihanSaya', 'penggunaAktif', 'recentPelatihan'));
    }


}