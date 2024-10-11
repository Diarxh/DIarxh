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


    public function contact()
    {
        return view('contact');
    }


    public function about()
    {
        return view('about');
    }

    public function tes()
    {
        return view('user.profile');
    }

    // PROFILL

    public function detail_profile()
    {
        $guru = Guru::where('user_id', Auth::id())->first();
        if (!$guru) {
            return view('user.detail_profile')->with('alert', 'Anda belum memiliki data guru. Silakan lengkapi data Anda.');
        }
        return view('user.detail_profile', compact('guru'));
    }

    public function profile()
    {
        $teacher = Guru::where('User_Id', Auth::user()->id)->first();
        return view('user.detail_profile', compact('teacher'));
    }

    public function showProfile()
    {
        $guru = Guru::where('user_id', Auth::id())->first();
        $user = Auth::user();
        $roles = $user->roles; // Mengambil peran pengguna

        // Mengembalikan view dengan data pengguna, role, dan guru
        return view('user.detail_profile', compact('user', 'roles', 'guru'));
    }


    public function updateprofile()
    {
        // Mengambil data profil guru berdasarkan User_Id yang sedang login
        $profile = Guru::where('User_Id', Auth::user()->id)->first();

        // Mengembalikan view edit_profile dengan data profil
        return view('user.edit_profile', compact('profile'));
    }


    public function editProfile()
    {
        // Cek apakah guru sudah ada
        $guru = Guru::where('user_id', Auth::id())->first();

        // Jika tidak ada, buat objek baru untuk form
        if (!$guru) {
            $guru = new Guru();
        }

        return view('user.edit_profile', compact('guru'));
    }

    public function saveprofile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'last_education' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:1000',

        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $guru = Guru::where('user_id', Auth::id())->first();

        if ($guru) {
            $guru->update($validatedData);
            $message = 'Profil berhasil diperbarui';
        } else {
            Guru::create($validatedData);
            $message = 'Profil berhasil dibuat';
        }

        return redirect()->route('profile.detail')->with('success', $message);
    }
    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required|string|min:8',
            'newpassword' => 'required|string|min:8|confirmed',
        ]);

        // Cek apakah password saat ini benar
        $user = Auth::user();
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password saat ini tidak sesuai.']);
        }

        // Update password
        $user->password = Hash::make($request->newpassword);
        $user->save();

        // Redirect ke route profile
        return redirect()->route('profile')->with('success', 'Password berhasil diubah.');
    }


    // END PROFILE







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

    // TERUNTUK nambah data ke table guru


}