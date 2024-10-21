<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MemberCourse;
use App\Models\Pelatihan;
use App\Models\TipePelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            \Log::info('User authenticated: ' . $user->email);
            \Log::info('User roles: ' . implode(', ', $user->getRoleNames()->toArray()));

            if ($user->hasRole('super_admin')) {
                \Log::info('User has super_admin role');
                return redirect()->intended('/admin');
            } elseif ($user->hasAnyRole(['perusahaan', 'guru'])) {
                \Log::info('User has perusahaan or guru role');
                return redirect()->intended('/user/dashboard');
            } else {
                \Log::info('User has no recognized role');
                Auth::logout();
                return back()->withErrors([
                    'role' => 'Akses ditolak. Anda tidak memiliki peran yang sesuai.',
                ]);
            }
        }

        \Log::info('Login failed for email: ' . $request->email);
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to homepage or any other page after logout
        return redirect('/home');
    }

    public function register(Request $request)
    {
        // Jalankan validasi
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the role to the user
        $role = Role::findByName('guru');  // Ganti 'guru' sesuai kebutuhan
        $user->assignRole($role);

        // Set session success message
        session()->flash('success', 'Pendaftaran berhasil. Silakan login.');

        return redirect()->route('login');  // Redirect ke halaman login
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Pastikan email unik
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }
}
