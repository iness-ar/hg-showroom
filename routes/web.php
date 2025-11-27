<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('mobil', MobilController::class);

Route::get('/arsip', function () {
    return view('arsip');
});
Route::get('/login', function () {
    return view('login');
});
