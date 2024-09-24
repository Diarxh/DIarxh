<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);
