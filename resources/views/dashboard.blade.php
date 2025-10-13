@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-lg text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Selamat Datang, {{ auth()->user()->name }} 👋
        </h1>

        <p class="text-gray-600 mb-6">
            Anda berhasil login ke sistem PPDB Sekolah.
        </p>

        <a href="{{ route('pendaftaran.index') }}"
            class="inline-block bg-blue-900 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-800 transition">
            📄 Daftar Sebagai Calon Peserta Didik
        </a>

        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                class="text-red-600 hover:underline font-medium">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
