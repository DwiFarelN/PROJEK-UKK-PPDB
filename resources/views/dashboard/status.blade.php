@extends('dashboard.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Status Daftar Ulang</h1>

<div class="bg-white shadow p-6 rounded-lg">
    <p>Status Pendaftaran Kamu: <span class="font-bold">{{ $pendaftaran->status ?? 'Belum Diverifikasi' }}</span></p>
    @if($pendaftaran->status == 'Diterima')
        <p>Silakan lakukan daftar ulang sesuai jadwal.</p>
    @else
        <p>Harap tunggu verifikasi oleh admin.</p>
    @endif
</div>
@endsection
