<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    public function store(Request $request)
    {
        // Nanti isi logika simpan data calon siswa di sini
        return back()->with('success', 'Data calon siswa berhasil disimpan.');
    }
}
