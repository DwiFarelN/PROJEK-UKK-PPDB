@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-3xl bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Form Pendaftaran Siswa</h2>

    <form id="pendaftaranForm" action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Step 1: Data Siswa -->
        <div class="step">
            <h3 class="text-xl font-semibold mb-4">Step 1: Data Siswa</h3>

            <input type="text" name="nomor_pendaftaran" placeholder="Nomor Pendaftaran" class="w-full p-2 border rounded mb-3" required>
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="w-full p-2 border rounded mb-3" required>
            <input type="text" name="nisn" placeholder="NISN" class="w-full p-2 border rounded mb-3">
            <input type="text" name="asal_sekolah" placeholder="Asal Sekolah" class="w-full p-2 border rounded mb-3">
            <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="w-full p-2 border rounded mb-3">
            <input type="date" name="tanggal_lahir" class="w-full p-2 border rounded mb-3" required>
            <select name="jenis_kelamin" class="w-full p-2 border rounded mb-3" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="number" name="tinggi_badan" placeholder="Tinggi Badan (cm)" class="w-full p-2 border rounded mb-3">
            <input type="number" name="berat_badan" placeholder="Berat Badan (kg)" class="w-full p-2 border rounded mb-3">
            <input type="text" name="agama" placeholder="Agama" class="w-full p-2 border rounded mb-3">
            <input type="text" name="nik" placeholder="NIK" class="w-full p-2 border rounded mb-3">
            <input type="number" name="anak_ke" placeholder="Anak Ke-" class="w-full p-2 border rounded mb-3">
            <textarea name="alamat" placeholder="Alamat" class="w-full p-2 border rounded mb-3"></textarea>
            <input type="text" name="desa" placeholder="Desa" class="w-full p-2 border rounded mb-3">
            <input type="text" name="rt_rw" placeholder="RT/RW" class="w-full p-2 border rounded mb-3" required>
            <input type="text" name="kelurahan" placeholder="Kelurahan" class="w-full p-2 border rounded mb-3">
            <input type="text" name="kecamatan" placeholder="Kecamatan" class="w-full p-2 border rounded mb-3">
            <input type="text" name="kode_pos" placeholder="Kode Pos" class="w-full p-2 border rounded mb-3" required>
            <input type="text" name="kota" placeholder="Kota" class="w-full p-2 border rounded mb-3">
            <input type="text" name="no_hp" placeholder="No. HP" class="w-full p-2 border rounded mb-3">

            <button type="button" class="next-step bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
        </div>

        <!-- Step 2: Data Orang Tua / Wali -->
        <div class="step hidden">
            <h3 class="text-xl font-semibold mb-4">Step 2: Data Orang Tua / Wali</h3>

            <label class="inline-flex items-center mb-4">
                <input type="checkbox" id="no-parents" class="form-checkbox mr-2">
                <span>Siswa tidak punya orang tua Klik Centang, isi Wali </span>
            </label>

            <!-- Orang Tua -->
            <div id="orang-tua-section">
                <h4 class="font-semibold mb-2">Data Ayah</h4>
                <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="w-full p-2 border rounded mb-3">
                <input type="date" name="tanggal_lahir_ayah" placeholder="Tanggal Lahir Ayah" class="w-full p-2 border rounded mb-3">
                <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="w-full p-2 border rounded mb-3">
                <input type="number" step="0.01" name="penghasilan_ayah" placeholder="Penghasilan Ayah" class="w-full p-2 border rounded mb-3">
                <input type="text" name="alamat_ayah" placeholder="Alamat Ayah" class="w-full p-2 border rounded mb-3">
                <input type="text" name="no_hp_ayah" placeholder="No HP Ayah" class="w-full p-2 border rounded mb-3">
                <input type="text" name="nik_ayah" placeholder="NIK Ayah" class="w-full p-2 border rounded mb-3">

                <h4 class="font-semibold mb-2 mt-4">Data Ibu</h4>
                <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="w-full p-2 border rounded mb-3">
                <input type="date" name="tanggal_lahir_ibu" placeholder="Tanggal Lahir Ibu" class="w-full p-2 border rounded mb-3">
                <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="w-full p-2 border rounded mb-3">
                <input type="number" step="0.01" name="penghasilan_ibu" placeholder="Penghasilan Ibu" class="w-full p-2 border rounded mb-3">
                <input type="text" name="alamat_ibu" placeholder="Alamat Ibu" class="w-full p-2 border rounded mb-3">
                <input type="text" name="no_hp_ibu" placeholder="No HP Ibu" class="w-full p-2 border rounded mb-3">
                <input type="text" name="nik_ibu" placeholder="NIK Ibu" class="w-full p-2 border rounded mb-3">
            </div>

            <!-- Wali -->
            <div id="wali-section" class="hidden">
                <h4 class="font-semibold mb-2">Data Wali</h4>
                <input type="text" name="nama_wali" placeholder="Nama Wali" class="w-full p-2 border rounded mb-3">
                <input type="text" name="hubungan" placeholder="Hubungan dengan Siswa" class="w-full p-2 border rounded mb-3">
                <textarea name="alamat_wali" placeholder="Alamat Wali" class="w-full p-2 border rounded mb-3"></textarea>
                <input type="text" name="pendidikan" placeholder="Pendidikan Wali" class="w-full p-2 border rounded mb-3">
                <input type="text" name="pekerjaan" placeholder="Pekerjaan Wali" class="w-full p-2 border rounded mb-3">
                <input type="number" step="0.01" name="penghasilan" placeholder="Penghasilan Wali" class="w-full p-2 border rounded mb-3">
                <input type="text" name="no_hp_wali" placeholder="No HP Wali" class="w-full p-2 border rounded mb-3">
            </div>

            <div class="flex justify-between">
                <button type="button" class="prev-step bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">Previous</button>
                <button type="button" class="next-step bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
            </div>
        </div>

        <!-- Step 3: Upload Dokumen -->
        <div class="step hidden">
            <h3 class="text-xl font-semibold mb-4">Step 3: Upload Dokumen</h3>
            <input type="file" name="dokumen[]" multiple class="w-full p-2 border rounded mb-3" required>
            <div class="flex justify-between">
                <button type="button" class="prev-step bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">Previous</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Submit</button>
            </div>
        </div>

    </form>
</div>

<script>
    
    // Multi-step navigation
    const steps = document.querySelectorAll('.step');
    let currentStep = 0;

    document.querySelectorAll('.next-step').forEach(btn => {
        btn.addEventListener('click', () => {
            steps[currentStep].classList.add('hidden');
            currentStep++;
            steps[currentStep].classList.remove('hidden');
        });
    });

    document.querySelectorAll('.prev-step').forEach(btn => {
        btn.addEventListener('click', () => {
            steps[currentStep].classList.add('hidden');
            currentStep--;
            steps[currentStep].classList.remove('hidden');
        });
    });

    // Toggle Wali form if no parents
    const checkbox = document.getElementById('no-parents');
    const orangTua = document.getElementById('orang-tua-section');
    const wali = document.getElementById('wali-section');

    checkbox.addEventListener('change', function() {
        if(this.checked) {
            orangTua.classList.add('hidden');
            wali.classList.remove('hidden');
        } else {
            orangTua.classList.remove('hidden');
            wali.classList.add('hidden');
        }
    });
</script>
@endsection
