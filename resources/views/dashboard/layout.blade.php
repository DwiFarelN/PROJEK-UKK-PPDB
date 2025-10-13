<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 text-xl font-bold">Dashboard</div>
        <nav class="mt-6">
            <a href="{{ route('dashboard.beranda') }}" class="block py-2 px-6 hover:bg-gray-200">Beranda</a>
            <a href="{{ route('dashboard.calon_siswa') }}" class="block py-2 px-6 hover:bg-gray-200">Calon Siswa</a>
            <a href="{{ route('dashboard.biodata') }}" class="block py-2 px-6 hover:bg-gray-200">Biodata</a>
            <a href="{{ route('dashboard.status') }}" class="block py-2 px-6 hover:bg-gray-200">Status Daftar Ulang</a>
            <a href="{{ route('dashboard.notifikasi') }}" class="block py-2 px-6 hover:bg-gray-200">Notifikasi</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
        @yield('content')
    </main>
</div>

</body>
</html>
