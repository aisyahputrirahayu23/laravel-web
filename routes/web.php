<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\MataKuliahController;

// Pertemuan 4
use App\Http\Controllers\HomeController;

// Pertemuan 5
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;

// Latihan Classroom
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama Saya : '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'Nim Saya : '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/matakuliah/show/{kode}', [MataKuliahController::class, 'show']);

// pertemuan 4
Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
->name('question.store');

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Latihan Classroom
Route::get('/pegawai', [PegawaiController::class, 'index']);