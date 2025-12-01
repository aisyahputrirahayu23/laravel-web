<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

// Pertemuan 4
use App\Http\Controllers\MahasiswaController;

// Pertemuan 5
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PegawaiController;

// Latihan Classroom
use App\Http\Controllers\PelangganController;

//Pertemuan 6
use App\Http\Controllers\QuestionController;

//pertemuan 7
use App\Http\Controllers\UserController;

//Pertemuan 8
use Illuminate\Support\Facades\Route;

//halaman guest
Route::middleware('guest')->group(function () {
// Halaman Form Login
    Route::get('/auth', [AuthController::class, 'index'])->name('login');

// Proses Submit Login
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

// Halaman Depan
    Route::get('/', function () {
        return view('welcome');
    });
});

//halaman wajib login
Route::middleware('auth')->group(function () {

// Logout (Bisa diakses semua user yang login)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// -- DASHBOARD UNTUK USER BIASA --
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Fitur User Biasa (Contoh: Kirim Pertanyaan)
    Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/home', [HomeController::class, 'index']);

//Khusus admin
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('pelanggan', PelangganController::class);
    });
});

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
    return 'Nama Saya : ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'Nim Saya : ' . $param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

//matakuliah
Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
Route::get('/matakuliah/show/{kode}', [MataKuliahController::class, 'show']);

// pertemuan 4
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

// Route::get('/auth', [AuthController::class, 'index']);
// Route::post('/auth/login', [AuthController::class, 'login']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Latihan Classroom
Route::get('/pegawai', [PegawaiController::class, 'index']);

//Pertemuan 6
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//pertemuan 7
Route::resource('pelanggan', PelangganController::class);

// pertemuan 8
// Route::resource('user', UserController::class);
// Route::get('/login',[AuthController::class, 'index'])->name('login');
// Route::post('/auth/login',[AuthController::class, 'login'])->name('login.post');
