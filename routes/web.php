<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.dashboard_user');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);
Route::get('/tipepelatihan', [\App\Http\Controllers\HomeController::class, 'tipe_pelatihan']);
Route::get('/list_pelatihan', [\App\Http\Controllers\HomeController::class, 'pelatihan']);
Route::get('/login', [\App\Http\Controllers\HomeController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\HomeController::class, 'register']);
Route::get('/detail_pelatihan', [\App\Http\Controllers\HomeController::class, 'detail_pelatihan']);
Route::get('/login/login', function () {
    return view('login.login');
});


Route::get('register', [HomeController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [HomeController::class, 'register']);
