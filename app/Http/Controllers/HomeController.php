<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

    public function register(Request $request)
    {
        // $this->validator($request->all())->validate();
      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the role to the user
        $role = Role::findByName('guru'); // Change 'user' to your desired role
        $user->assignRole($role);

        // Optionally, you can log the user in
        // auth()->login($user);

        return redirect('/'); // Change 'home' to your desired redirect route
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}