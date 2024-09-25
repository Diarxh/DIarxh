<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);
Route::get('/tipepelatihan', [\App\Http\Controllers\HomeController::class, 'tipe_pelatihan']);
Route::get('/list_pelatihan', [\App\Http\Controllers\HomeController::class, 'pelatihan']);
Route::get('/login/login', function () {
    return view('login.login');
});
