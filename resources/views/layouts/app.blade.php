<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
<nav class="bg-blue-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo PPDB" class="h-10 w-auto">
            <span class="text-2xl font-bold text-white hover:text-red-400">PPDB Online</span>
        </a>
        <div class="space-x-6 text-lg">
            <a href="{{ route('home') }}" class="hover:text-red-400">Beranda</a>
            <a href="{{ route('register') }}" class="hover:text-red-400">Daftar</a>
            <a href="#" class="hover:text-red-400">Login</a>
        </div>
    </div>
</nav>


    {{-- Main content --}}
    <main class="min-h-screen py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-blue-900 text-center text-white py-4 mt-10">
        <p class="text-sm">&copy; {{ date('Y') }} PPDB Online | SMK ANTARTIKA 1 SIDOARJO</p>
    </footer>

</body>
</html>
