@extends('dashboard.layout')

@section('content')
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fb;
        color: #333;
    }

    .dashboard-container {
        display: flex;
        height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
        width: 260px;
        background-color: #0d1b2a;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    .sidebar img {
        width: 70px;
        margin-bottom: 10px;
    }

    .sidebar h2 {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-daftar {
        background-color: #16a34a;
        color: white;
        padding: 10px 35px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 25px;
        transition: 0.3s;
    }

    .btn-daftar:hover {
        background-color: #15803d;
    }

    .menu {
        width: 100%;
        padding-left: 25px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        padding: 10px 0;
        font-size: 15px;
        transition: 0.3s;
    }

    .menu a:hover {
        background-color: #1e293b;
        padding-left: 35px;
    }

    /* KONTEN UTAMA */
    .main-content {
        flex-grow: 1;
        padding: 30px;
        overflow-y: auto;
        position: relative;
    }

    .top-bar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    #clock {
        font-weight: 600;
    }

    .notification {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #10b981;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        position: relative;
        margin-bottom: 20px;
        animation: fadeIn 0.6s ease-in-out;
    }

    .notification button {
        position: absolute;
        top: 10px;
        right: 15px;
        border: none;
        background: none;
        font-size: 18px;
        cursor: pointer;
        color: #047857;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .jurusan-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .jurusan-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        padding: 15px;
        text-align: center;
        transition: 0.3s;
    }

    .jurusan-card:hover {
        transform: scale(1.02);
    }

    .jurusan-card img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    footer {
        text-align: center;
        margin-top: 25px;
        font-size: 13px;
        color: #666;
    }
</style>

<div class="dashboard-container">
    <div class="sidebar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <h2>PPDB SMK ANTARTIKA 1 SIDOARJO</h2>
        <a href="#" class="btn-daftar">Daftar</a>
        <div class="menu">
            <a href="{{ route('dashboard.beranda') }}">🏠 Beranda</a>
            <a href="{{ route('siswa.dashboard') }}">👥 Calon Siswa</a>
            <a href="#">📋 Biodata</a>
            <a href="#">📊 Status</a>
            <a href="#">🔁 Daftar Ulang</a>
            <a href="#">🔔 Notifikasi</a>
        </div>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <div id="clock"></div>
        </div>

        <div class="notification" id="notif">
            ✅ Anda sudah terdaftar sebagai calon peserta didik SMK ANTARTIKA 1 SIDOARJO.
            <button onclick="document.getElementById('notif').style.display='none'">×</button>
        </div>

        <h1 class="text-2xl font-bold mb-2">Selamat datang, {{ Auth::user()->name ?? 'Siswa Baru' }} 👋</h1>
        <p>SMK ANTARTIKA 1 SIDOARJO memiliki 5 Kompetensi Keahlian / Jurusan.</p>

        <div class="jurusan-container">
            <div class="jurusan-card">
                <img src="{{ asset('images/jurusan-akuntansi.jpg') }}" alt="Jurusan Akuntansi">
                <h3>Jurusan Akuntansi</h3>
                <p>Mempelajari teknik mengukur dan mengelola transaksi keuangan secara profesional.</p>
            </div>

            <div class="jurusan-card">
                <img src="{{ asset('images/jurusan-dkv.jpg') }}" alt="Desain Komunikasi Visual">
                <h3>Desain Komunikasi Visual</h3>
                <p>Belajar desain grafis, fotografi, dan videografi untuk dunia digital kreatif.</p>
            </div>

            <div class="jurusan-card">
                <img src="{{ asset('images/jurusan-ototronik.jpg') }}" alt="Jurusan Ototronik">
                <h3>Jurusan Ototronik</h3>
                <p>Fokus pada sistem otomotif modern, kontrol sensor, dan teknologi kendaraan canggih.</p>
            </div>

            <div class="jurusan-card">
                <img src="{{ asset('images/jurusan-rpl.jpg') }}" alt="Rekayasa Perangkat Lunak">
                <h3>Rekayasa Perangkat Lunak</h3>
                <p>Mempelajari pembuatan aplikasi berbasis web, mobile, dan sistem cerdas.</p>
            </div>
        </div>

        <footer>© 2025 SMK ANTARTIKA 1 SIDOARJO | All Rights Reserved</footer>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const time = now.toLocaleTimeString('id-ID', { hour12: false });
        document.getElementById('clock').textContent = time;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection
