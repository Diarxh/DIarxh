<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\User;
use App\Models\MemberCourse;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalPelatihan = Training::count();
        // $pelatihanSaya = MemberCourse::where('user_id', Auth::id())->count();
        $penggunaAktif = User::count(); // Menghitung semua pengguna
        $recentPelatihan = Training::latest()->take(5)->get();

        return view('user.dashboard_user', compact('totalPelatihan', 'penggunaAktif', 'recentPelatihan'));
    }
}