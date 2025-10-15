<?php

namespace App\Http\Controllers;
use App\Models\Jurusan; // model jurusan
use Illuminate\Http\Request;
use App\Models\Siswa; // misal model data pendaftaran
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all(); // ambil semua jurusan
        return view('pendaftaran.form', compact('jurusan'));
    }

    public function store(Request $request)
    {
        // simpan data pendaftaran siswa
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required|date',
        ]);

        $user = Auth::user();

        Siswa::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect()->route('siswa.dashboard')->with('success', 'Data pendaftaran berhasil disimpan!');
    }
}
