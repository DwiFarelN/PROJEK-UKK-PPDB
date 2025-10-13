@extends('layouts.app')

@section('content')
<h2>Formulir Pendaftaran</h2>
<form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" id="multiStepForm">
    @csrf

    <!-- Step 1: Data Siswa -->
    <div class="step" id="step1">
        <h3>Data Calon Siswa</h3>
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required>
        <label>NISN:</label>
        <input type="text" name="nisn" required>
        <label>Jurusan:</label>
        <select name="jurusan_id">
            @foreach($jurusan as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
            @endforeach
        </select>
        <!-- Tambahkan field lain sesuai kebutuhan -->
        <button type="button" onclick="nextStep()">Selanjutnya</button>
    </div>

    <!-- Step 2: Data Orang Tua -->
    <div class="step" id="step2" style="display:none;">
        <h3>Data Orang Tua</h3>
        <label>Nama Ayah:</label>
        <input type="text" name="nama_ayah" required>
        <label>Pekerjaan Ayah:</label>
        <input type="text" name="pekerjaan_ayah">
        <label>No HP Ayah:</label>
        <input type="text" name="no_hp_ayah">
        <label>Nama Ibu:</label>
        <input type="text" name="nama_ibu" required>
        <label>Pekerjaan Ibu:</label>
        <input type="text" name="pekerjaan_ibu">
        <label>No HP Ibu:</label>
        <input type="text" name="no_hp_ibu">
        <button type="button" onclick="prevStep()">Kembali</button>
        <button type="button" onclick="nextStep()">Selanjutnya</button>
    </div>

    <!-- Step 3: Unggah Dokumen -->
    <div class="step" id="step3" style="display:none;">
        <h3>Unggah Dokumen</h3>
        <input type="file" name="dokumen[]" multiple required>
        <button type="button" onclick="prevStep()">Kembali</button>
        <button type="submit">Submit Pendaftaran</button>
    </div>
</form>

<script>
let currentStep = 1;
function nextStep() {
    document.getElementById('step'+currentStep).style.display = 'none';
    currentStep++;
    document.getElementById('step'+currentStep).style.display = 'block';
}
function prevStep() {
    document.getElementById('step'+currentStep).style.display = 'none';
    currentStep--;
    document.getElementById('step'+currentStep).style.display = 'block';
}
</script>
@endsection
