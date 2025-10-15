@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4">
    <div class="text-center mb-8">
        <img src="{{ asset('images/logo.png') }}" class="mx-auto w-24 h-24 mb-3" alt="Logo Sekolah">
        <h2 class="text-2xl font-semibold text-gray-800">SMK ANTARTIKA 1 SIDOARJO</h2>
    </div>

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-600 focus:border-indigo-600">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-600 focus:border-indigo-600">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Belum punya akun?
            <a href="{{ route('daftar') }}" class="text-indigo-600 hover:underline">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
