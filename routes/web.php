<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;
use Illuminate\Support\Facades\Route;

// Redirect root to home
Route::get('/', function () {
    return redirect('/home');
});

// Public routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/tes', [HomeController::class, 'tes']);
Route::get('/tipepelatihan', [HomeController::class, 'tipe_pelatihan']);
Route::get('/list_pelatihan', [HomeController::class, 'pelatihan']);
Route::get('/detail_pelatihan/{any}', [HomeController::class, 'detail_pelatihan']);

// AUTO DISTRIK
Route::get('/get-regencies', [UserController::class, 'getRegencies'])->name('get.regencies');
Route::get('/get-districts', [UserController::class, 'getDistricts'])->name('get.districts');
Route::get('/getRegencies', [UserController::class, 'getRegencies']);
Route::get('/getDistricts', [UserController::class, 'getDistricts']);
// Hapus route duplikat berikut ini
// Route::get('/get-regencies', [UserController::class, 'getRegencies'])->name('get.regencies');
// Route::get('/get-districts', [UserController::class, 'getDistricts'])->name('get.districts');
// Route::get('/get-regencies', [UserController::class, 'getRegencies'])->name('get.regencies');
// Route::get('/get-districts', [UserController::class, 'getDistricts'])->name('get.districts');

// Authentication routes
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [HomeController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Hapus route berikut ini karena sudah didefinisikan sebelumnya
// Route::get('/cities', [UserController::class, 'cities'])->name('cities');
// Route::get('/districts', [UserController::class, 'districts'])->name('districts');
// Route::get('/get-regencies', [UserController::class, 'getRegencies'])->name('get.regencies');
// Route::get('/get-districts', [UserController::class, 'getDistricts'])->name('get.districts');

// Authenticated user routes
Route::middleware(['auth', 'updateLastLogin'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile', [UserController::class, 'saveprofile'])->name('profile.save');

    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change.password');
    Route::get('/updateprofile', [HomeController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/pelatihan_saya', [HomeController::class, 'pelatihan_saya'])->name('pelatihan_saya');
    Route::get('/registercourse/{any}', [HomeController::class, 'registercourse'])->name('registercourse');
    Route::post('registercourse-do', [HomeController::class, 'registercoursedo'])->name('registercoursedo');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->middleware(['user', 'updateLastLogin'])
        ->name('user.dashboard_user');
    Route::get('/user/pelatihan-saya', [HomeController::class, 'pelatihan_saya'])->name('user.pelatihan_saya');
});

// Hapus route duplikat berikut ini
// Route::middleware(['auth'])->group(function () {
//     Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
//         ->name('user.dashboard_user');
// });

// Filament routes
Route::domain(config('filament.domain'))
    ->middleware([
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'auth.filament', // Gunakan middleware baru di sini
        FilamentAuthenticate::class,
    ]);
