<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    
    public function user() {
    return $this->belongsTo(User::class);
}

    protected $fillable = [
        'nomor_pendaftaran',
        'nama_lengkap',
        'nisn',
        'asal_sekolah',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tinggi_badan',
        'berat_badan',
        'agama',
        'nik',
        'anak_ke',
        'alamat',
        'desa',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'kota',
        'no_hp',

        // Data Ayah
        'nama_ayah',
        'tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'alamat_ayah',
        'no_hp_ayah',
        'nik_ayah',

        // Data Ibu
        'nama_ibu',
        'tanggal_lahir_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'alamat_ibu',
        'no_hp_ibu',
        'nik_ibu',

        // Data Wali
        'nama_wali',
        'hubungan',
        'alamat_wali',
        'pendidikan',
        'pekerjaan',
        'penghasilan',
        'no_hp_wali',

        // Jika ada relasi user
        'user_id',
    ];
}
