<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class CalonSiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data pendaftar
        $pendaftarans = Pendaftaran::latest()->get();
        return view('dashboard.calon_siswa', compact('pendaftarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required|string',
            'jurusan' => 'required|string',
        ]);

        Pendaftaran::create($request->all());

        return redirect()->route('dashboard.calon_siswa')->with('success', 'Data calon siswa berhasil disimpan!');
    }
}
