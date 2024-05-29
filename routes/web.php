<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/siswa/{id}/presensi', [App\Http\Controllers\HomeController::class, 'siswaPresensi'])->name('presensi.siswa');
Route::get('/tambah', [App\Http\Controllers\HomeController::class, 'tambah'])->name('tambah');
Route::get('/presensi/{id}', [App\Http\Controllers\HomeController::class, 'presensi'])->name('presensi');
Route::post('/simpan', [App\Http\Controllers\HomeController::class, 'simpan'])->name('simpan');
Route::post('/masuk/{id}', [App\Http\Controllers\HomeController::class, 'masuk'])->name('masuk');

Route::get('/edit/{id}/siswa', [App\Http\Controllers\HomeController::class, 'editTambah'])->name('editTambah');
Route::post('/edit/{id}/siswa', [App\Http\Controllers\HomeController::class, 'editSiswa'])->name('editSiswa');
route::delete('/siswa/{id}', [App\Http\Controllers\HomeController::class, 'hapusSiswa'])->name('hapus.siswa');
route::delete('/presensi/{id}', [App\Http\Controllers\HomeController::class, 'hapusPresensi'])->name('hapus.presensi');




