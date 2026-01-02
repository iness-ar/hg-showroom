<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/', [AdminAuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/mobil/dashboard', [DashboardController::class, 'index'])->name('mobil.dashboard');
    // mobil CRUD (tanpa index, create, show)
    Route::resource('mobil', MobilController::class)->except(['index', 'create', 'show']);
    // arsip mobil
    Route::get('/mobil/arsip', [MobilController::class, 'arsip'])->name('mobil.arsip');

    // transaksi
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayat'])->name('transaksi.riwayat');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //search
    Route::get('/mobil/search', [MobilController::class, 'search'])->name('mobil.search');


    //Cetak struk transaksi
    Route::get('/transaksi/{id}/struk-pdf', [TransaksiController::class, 'generatePDF'])->name('transaksi.pdf');
    Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'cetakStruk'])->name('transaksi.struk');
});
