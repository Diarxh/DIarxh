<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;

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

Route::get('/profile', [HomeController::class, 'showProfile'])->name('profile');

// Authentication routes
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [HomeController::class, 'register']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [HomeController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile', [HomeController::class, 'saveprofile'])->name('profile.save');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change.password');
    Route::get('/updateprofile', [HomeController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/pelatihan_saya', [HomeController::class, 'pelatihan_saya']);
    Route::get('/registercourse/{any}', [HomeController::class, 'registercourse'])->name('registercourse');
    Route::post('registercourse-do', [HomeController::class, 'registercoursedo'])->name('registercoursedo');
    Route::get('/profile', [HomeController::class, 'showProfile'])->name('profile.show');
});

// User dashboard routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard_user');
    })->name('user.dashboard');
    Route::get('/user/pelatihan-saya', [HomeController::class, 'pelatihan_saya'])->name('user.pelatihan_saya');
});

// Admin dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Filament routes
// Route::domain(config('filament.domain'))
//     ->middleware([
//         \Illuminate\Cookie\Middleware\EncryptCookies::class,
//         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
//         \Illuminate\Session\Middleware\StartSession::class,
//         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
//         \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
//         \Illuminate\Routing\Middleware\SubstituteBindings::class,
//         'auth.filament', // Gunakan middleware baru di sini
//         FilamentAuthenticate::class,

//     ])
//     ->group(function () {
//         Route::get('/', \App\Filament\Pages\Dashboard::class)->name('filament.pages.dashboard');
//     });