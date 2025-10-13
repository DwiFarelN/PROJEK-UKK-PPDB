@extends('dashboard.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Biodata</h1>

<div class="bg-white shadow p-6 rounded-lg">
    <p><strong>Nama Lengkap:</strong> {{ $pendaftaran->nama_lengkap }}</p>
    <p><strong>NISN:</strong> {{ $pendaftaran->nisn }}</p>
    <p><strong>Asal Sekolah:</strong> {{ $pendaftaran->asal_sekolah }}</p>
    <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}, {{ $pendaftaran->kota }}</p>
    <p><strong>Nomor HP:</strong> {{ $pendaftaran->no_hp }}</p>
</div>
@endsection
