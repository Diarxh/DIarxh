<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);
Route::get('/tipepelatihan', [\App\Http\Controllers\HomeController::class, 'tipe_pelatihan']);
Route::get('/list_pelatihan', [\App\Http\Controllers\HomeController::class, 'pelatihan']);
Route::get('/login', [\App\Http\Controllers\HomeController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\HomeController::class, 'register']);
Route::get('/detail_pelatihan/{any}', [\App\Http\Controllers\HomeController::class, 'detail_pelatihan']);
Route::get('/profile', [HomeController::class, 'detail_profile'])->name('profile.detail');
Route::get('/updateprofile', [\App\Http\Controllers\HomeController::class, 'updateprofile']);
// Route::get('/login/login', function () {
//     return view('login.login');
// });

Route::get('register', [HomeController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [HomeController::class, 'register']);
Route::get('login', [HomeController::class, 'login'])->name('login');
route::get('/pelatihan_saya', [HomeController::class, 'pelatihan_saya']);
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/registercourse/{any}', [HomeController::class, 'registercourse'])->name('registercourse');
Route::post('registercourse-do', [HomeController::class, 'registercoursedo'])->name('registercoursedo');
// loogin
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/user/dashboard', function () {
    return view('user.dashboard_user');
})->name('user.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard_user');
    })->name('user.dashboard');

    Route::get('/user/pelatihan-saya', [HomeController::class, 'pelatihan_saya'])->name('user.pelatihan_saya');
    // Tambahkan route lain yang memerlukan autentikasi di sini
});