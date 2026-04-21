<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang.public');
Route::get('/anak-asuh', [HomeController::class, 'anakAsuh'])->name('anak-asuh.public');

Route::get('/kegiatan', [\App\Http\Controllers\KegiatanController::class, 'index'])->name('kegiatan.public');
Route::get('/kegiatan/{kegiatan}', [\App\Http\Controllers\KegiatanController::class, 'show'])->name('kegiatan.show');
