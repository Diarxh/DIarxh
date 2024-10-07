<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MemberCourse;
use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log; // Tambahkan ini


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

    // PROFILL

    public function detail_profile()
    {
        $guru = Guru::where('User_Id', Auth::id())->first();

        if (!$guru) {
            return redirect()->route('profile.create')->with('error', 'Profile not found. Please create a profile.');
        }

        return view('user.detail_profile', compact('guru'));
    }

    public function profile()
    {
        $profile = Guru::where('User_Id', Auth::user()->id)->first();
        return view('user.detail_profile', compact('profile'));

    }
    // END PROFILE
    public function updateprofile()
    {
        $profile = Guru::where('User_Id', Auth::user()->id)->first();
        return view('user.edit_profile', compact('profile'));
    }

    public function saveprofile(Request $request)
    {
        $data = $request->all();
        $id = $request->id;

        if ($id) {
            // Jika ID diberikan, update data
            $guru = Guru::find($id);
            if ($guru) {
                $guru->update($data);
                return redirect()->back()->with('success', 'Berhasil update profile');
            } else {
                return redirect()->back()->with('error', 'Data guru tidak ditemukan');
            }
        } else {
            // Jika ID tidak diberikan, buat data baru
            Guru::create($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan guru baru');
        }
    }
    public function tipe_pelatihan()
    {
        return view('tipepelatihan');
    }

    public function pelatihan()
    {
        $pelatihan = Pelatihan::latest()->get();
        return view(view: 'pelatihan', data: compact('pelatihan'));
    }

    public function login1ss()
    {
        return view('login');
    }

    public function detail_pelatihan(int $id)
    {
        $detail = Pelatihan::where('id', $id)->firstOrFail();
        $peserta = MemberCourse::with('guru') // Mengambil data guru yang terkait
            ->where('pelatihan_id', $detail->id)
            ->where('status', 2)
            ->get();

        // Debugging: Cek apakah peserta berhasil diambil
        // dd($peserta);

        return view('detail_pelatihan', compact('detail', 'peserta'));
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

    // TAMBAH METHODE LOGIN
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            Log::info('User logged in: ' . Auth::user()->email); // Log email pengguna
            return redirect()->intended('/user/dashboard');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
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
    // }
    public function registercoursedo(Request $request)
    {
        $data = $request->all();
        MemberCourse::create($data);
        return redirect()->back()->with('success', 'Berhasil mendaftar');
    }



}
