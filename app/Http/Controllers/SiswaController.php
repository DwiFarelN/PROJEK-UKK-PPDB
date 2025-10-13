<?php

namespace App\Http\Controllers;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\OrangTua;

use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard siswa
    public function index()
{
   $pendaftarans = \App\Models\Pendaftaran::where('user_id', auth()->id())->get();
return view('dashboard.calon_siswa', compact('pendaftarans'));

}


    // Menampilkan form multi-step
public function formPendaftaran()
{
    return view('form.pendaftaran');
}

// Menyimpan data pendaftaran
public function storePendaftaran(Request $request)
{
    $data = $request->validate([
        // Step 1: Data Calon Siswa
        'nomor_pendaftaran' => 'required|string|unique:pendaftarans,nomor_pendaftaran',
        'nama_lengkap' => 'required|string|max:100',
        'nisn' => 'required|string|unique:pendaftarans,nisn',
        'asal_sekolah' => 'nullable|string|max:100',
        'tempat_lahir' => 'nullable|string|max:50',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|string',
        'tinggi_badan' => 'nullable|integer',
        'berat_badan' => 'nullable|integer',
        'agama' => 'nullable|string',
        'nik' => 'nullable|string|max:20',
        'anak_ke' => 'nullable|integer',
        'alamat' => 'nullable|string',
        'desa' => 'nullable|string|max:50',
        'rt_rw' => 'required|string|max:30',
        'kelurahan' => 'nullable|string|max:50',
        'kecamatan' => 'nullable|string|max:50',
        'kode_pos' => 'required|string|max:30',
        'kota' => 'nullable|string|max:50',
        'no_hp' => 'nullable|string|max:20',
        'jurusan_id' => 'nullable|integer|exists:jurusan,id',
        'tipe_kelas' => 'nullable|string',

        // Step 2: Data Orang Tua
        'nama_ayah' => 'required|string|max:100',
        'pekerjaan_ayah' => 'nullable|string|max:50',
        'no_hp_ayah' => 'nullable|string|max:20',
        'nama_ibu' => 'required|string|max:100',
        'pekerjaan_ibu' => 'nullable|string|max:50',
        'no_hp_ibu' => 'nullable|string|max:20',

        // Step 3: Dokumen
        'dokumen.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $pendaftaran = new Pendaftaran();
    $pendaftaran->fill($data);
    $pendaftaran->user_id = auth()->id();
    $pendaftaran->save();

    // Simpan dokumen
    if($request->hasFile('dokumen')){
        foreach($request->file('dokumen') as $file){
            $filename = $file->store('dokumen', 'public');
            Dokumen::create([
                'pendaftaran_id' => $pendaftaran->id,
                'file' => $filename
            ]);
        }
    }

    return redirect()->route('pendaftaran.success');
}
}
