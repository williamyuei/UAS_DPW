<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\KembaliAnggotaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamHeaderAnggotaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Semua route berikut hanya bisa diakses setelah login
Route::middleware(['auth:petugas'])->group(function () {
    Route::get('/', [MenuController::class,'index'])->name('menu');

    Route::resource('buku', BukuController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('peminjaman', PinjamHeaderAnggotaController::class);
    Route::get('pengembalian', [KembaliAnggotaController::class, 'index'])->name('pengembalian.index');
    Route::resource('petugas', PetugasController::class);

    // Laporan
    Route::get('laporan', [LaporanController::class,'index'])->name('laporan.index');
    Route::get('laporan/anggota', [LaporanController::class,'anggota'])->name('laporan.anggota');
    Route::get('laporan/buku', [LaporanController::class,'buku'])->name('laporan.buku');
    Route::get('laporan/peminjaman', [LaporanController::class,'peminjaman'])->name('laporan.peminjaman');

    // Cetak
    Route::get('laporan/anggota/cetak', [CetakController::class,'anggota'])->name('cetak.anggota');
    Route::get('laporan/buku/cetak', [CetakController::class,'buku'])->name('cetak.buku');
    Route::get('laporan/peminjaman/cetak', [CetakController::class,'peminjaman'])->name('cetak.peminjaman');
    Route::post('laporan/cetak-multiple', [CetakController::class,'cetakMultiple'])->name('cetak.multiple');
});