<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran')->unique();
            $table->string('nama_lengkap');
            $table->string('nisn')->nullable()->unique();
            $table->string('asal_sekolah')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('agama')->nullable();
            $table->string('nik')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('rt_rw');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kode_pos');
            $table->string('kota')->nullable();
            $table->string('no_hp')->nullable();

            // Data Ayah
            $table->string('nama_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->decimal('penghasilan_ayah', 15, 2)->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('nik_ayah')->nullable();

            // Data Ibu
            $table->string('nama_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->decimal('penghasilan_ibu', 15, 2)->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('nik_ibu')->nullable();

            // Data Wali
            $table->string('nama_wali')->nullable();
            $table->string('hubungan')->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->decimal('penghasilan', 12, 2)->nullable();
            $table->string('no_hp_wali')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
