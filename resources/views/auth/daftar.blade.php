@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-center text-2xl font-semibold mb-6 text-gray-800">Daftar Akun PPDB</h2>

        <form action="{{ route('daftar.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="w-full mt-1 border-gray-300 rounded-md">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full mt-1 border-gray-300 rounded-md">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full mt-1 border-gray-300 rounded-md">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full mt-1 border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Daftar</button>
        </form>

        <p class="text-center text-sm mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login di sini</a>
        </p>
    </div>
</div>
@endsection
