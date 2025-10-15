<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

 <nav class="bg-blue-900 text-white p-4 fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            PPDB Online
        </a>
        <div>
            <a href="{{ route('home') }}" class="mx-2 hover:underline">Beranda</a>
            <a href="{{ route('daftar') }}" class="mx-2 hover:underline">Daftar</a>
            <a href="{{ route('login') }}" class="mx-2 hover:underline">Login</a>
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
