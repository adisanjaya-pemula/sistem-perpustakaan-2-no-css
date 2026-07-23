<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

// Halaman awal langsung diarahkan ke daftar peminjaman
Route::get('/', function () {
    return redirect()->route('peminjaman.index');
});

// Route::resource otomatis membuat 7 route standar CRUD:
// index, create, store, show, edit, update, destroy
Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('peminjaman', PeminjamanController::class);
