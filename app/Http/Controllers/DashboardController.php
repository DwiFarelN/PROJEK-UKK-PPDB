<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Notifikasi;

class DashboardController extends Controller
{
    public function beranda()
    {
        $user = auth()->user(); // ambil data user login
        return view('dashboard', compact('user'));
    }

    public function calonSiswa() {
        $pendaftarans = Pendaftaran::where('user_id', auth()->id())->get();
        return view('dashboard.calon_siswa', compact('pendaftarans'));
    }

    public function biodata() {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        return view('dashboard.biodata', compact('pendaftaran'));
    }

    public function status() {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        return view('dashboard.status', compact('pendaftaran'));
    }

    public function notifikasi() {
        $notifikasi = Notifikasi::where('user_id', auth()->id())->latest()->get();
        return view('dashboard.notifikasi', compact('notifikasi'));
    }
}
