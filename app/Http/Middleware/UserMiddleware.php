<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin == 0) {
            return $next($request);
        }

        // Redirect admin ke dashboard admin
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return redirect('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Redirect user yang belum login ke halaman login dengan pesan
        return redirect('/login')->with(key: 'error', value: 'Silakan login terlebih dahulu.');
    }
}