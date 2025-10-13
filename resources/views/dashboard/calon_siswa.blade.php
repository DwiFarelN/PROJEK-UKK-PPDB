@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm p-4 bg-white">
        <h3 class="fw-bold mb-3 text-primary">📋 Data Calon Peserta Didik Baru</h3>
        <p class="text-muted">Daftar calon siswa yang telah mendaftar melalui PPDB online.</p>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Siswa</button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat / Tanggal Lahir</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendaftarans as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') }}</td>
                            <td>{{ $p->asal_sekolah }}</td>
                            <td>{{ $p->jurusan }}</td>
                            <td><span class="badge bg-warning text-dark">Proses</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">Belum ada data pendaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
