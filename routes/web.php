<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CalonSiswaController;


// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// === REGISTER ===
Route::get('/daftar', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/daftar', [RegisterController::class, 'register'])->name('register.store');

// === LOGIN ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// === LOGOUT ===
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// === DASHBOARD ===
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
    ->name('pendaftaran.index')
    ->middleware('auth');

// === siswa ===
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/siswa', [SiswaController::class, 'index'])->name('siswa.dashboard');

    Route::get('/pendaftaran', [SiswaController::class, 'formPendaftaran'])->name('form.pendaftaran');
    Route::post('/pendaftaran', [SiswaController::class, 'storePendaftaran'])->name('pendaftaran.store');
});
// Route pendaftaran
Route::middleware('auth')->group(function () {
    Route::get('/pendaftaran', [SiswaController::class, 'formPendaftaran'])
        ->name('pendaftaran.index'); // <-- ini harus sesuai dengan yang di Blade

    Route::post('/pendaftaran', [SiswaController::class, 'storePendaftaran'])
        ->name('pendaftaran.store');
});

// dashboard siswa

Route::prefix('dashboard')->middleware('auth')->group(function(){
    
    Route::get('/', function() {
        return redirect()->route('dashboard.beranda');
    });

    Route::get('beranda', [App\Http\Controllers\DashboardController::class, 'beranda'])->name('dashboard.beranda');
    Route::get('calon_siswa', [App\Http\Controllers\DashboardController::class, 'calonSiswa'])->name('dashboard.calon_siswa');

    // 🟢 Route untuk simpan calon siswa baru
    Route::post('calon_siswa', [App\Http\Controllers\CalonSiswaController::class, 'store'])
        ->name('dashboard.calon_siswa.store');
        
    Route::get('biodata', [App\Http\Controllers\DashboardController::class, 'biodata'])->name('dashboard.biodata');
    Route::get('status', [App\Http\Controllers\DashboardController::class, 'status'])->name('dashboard.status');
    Route::get('notifikasi', [App\Http\Controllers\DashboardController::class, 'notifikasi'])->name('dashboard.notifikasi');
});

// route buat simpan data dari form pendaftaran
Route::post('/pendaftaran/store', [CalonSiswaController::class, 'store'])->name('pendaftaran.store');




