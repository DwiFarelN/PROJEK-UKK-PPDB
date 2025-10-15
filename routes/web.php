<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanitiaController;

// === HALAMAN UTAMA ===
Route::get('/', function () {
    return view('home');
})->name('home');

// === REGISTER ===
Route::get('/daftar', [AuthController::class, 'showDaftarForm'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'daftarStore'])->name('daftar.store');

// === LOGIN ===
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// === LOGOUT ===
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === DASHBOARD UMUM (HANYA LOGIN) ===
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'beranda'])->name('dashboard');
    Route::get('/beranda', [DashboardController::class, 'beranda'])->name('dashboard.beranda');
    Route::get('/calon_siswa', [DashboardController::class, 'calonSiswa'])->name('dashboard.calon_siswa');
    Route::get('/biodata', [DashboardController::class, 'biodata'])->name('dashboard.biodata');
    Route::get('/status', [DashboardController::class, 'status'])->name('dashboard.status');
    Route::get('/notifikasi', [DashboardController::class, 'notifikasi'])->name('dashboard.notifikasi');
});

// === PENDAFTARAN ===
Route::middleware('auth')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
});

// === DATA SISWA ===
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});

// === ADMIN ===
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

// === PANITIA ===
Route::middleware(['auth', 'role:admin,panitia'])->prefix('panitia')->group(function () {
    Route::get('/', [PanitiaController::class, 'index'])->name('panitia.dashboard');
});
