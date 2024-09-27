<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function tipe_pelatihan()
    {
        return view('tipepelatihan');
    }

    public function pelatihan()
    {
        return view('pelatihan');
    }

    public function login()
    {
        return view('login');
    }

    public function detail_pelatihan()
    {
        return view('detail_pelatihan');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function pelatihan_saya()
    {
        return view('user.pelatihan_saya');
    }

    public function register(Request $request)
    {
        // Jalankan validasi
        $this->validator($request->all())->validate();

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
    }
}
