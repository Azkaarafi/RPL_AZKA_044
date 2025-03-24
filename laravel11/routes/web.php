<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tes\tes1;
use App\Http\Controllers\MarketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tiptoe/login', [tes1::class, 'login'])->name('login');
Route::post('/tiptoe/login', [tes1::class, 'store'])->name('login');
Route::get('/tiptoe/index', [tes1::class, 'index'])->name('index');
Route::get('/tiptoe/dokter', [tes1::class, 'dokter'])->name('dokter');
Route::post('/tiptoe/dokter', [tes1::class, 'rekam_medis'])->name('dokter');
Route::get('/tiptoe/Perawat', [tes1::class, 'Perawat'])->name('Perawat');
////////////////////////////////new
Route::get('/tiptoe/hapus', [tes1::class, 'halhapus'])->name('hapusrekam_medis');
Route::post('/tiptoe/hapus', [tes1::class, 'hapus'])->name('hapusrekam_medis');
////////////////////////////////new
Route::get('/tiptoe/update', [tes1::class, 'halupdate'])->name('updaterekam_medis');
Route::post('/tiptoe/update', [tes1::class, 'update'])->name('updaterekam_medis');
// Route::get('/', function () {});
