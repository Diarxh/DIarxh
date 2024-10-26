<?php

namespace App\Http\Controllers;

use App\Models\MemberCourse;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalPelatihan = Training::count(); // Total semua pelatihan
        $pelatihanSaya = MemberCourse::where('user_id', Auth::id())->count(); // Hitung pelatihan yang diikuti oleh pengguna
        $penggunaAktif = User::count(); // Menghitung semua pengguna
        $recentPelatihan = Training::latest()->take(5)->get(); // Ambil 5 pelatihan terbaru

        return view('user.dashboard_user', compact('totalPelatihan', 'pelatihanSaya', 'penggunaAktif', 'recentPelatihan'));
    }
}