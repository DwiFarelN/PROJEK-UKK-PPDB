<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMK ANTARTIKA 1 SIDOARJO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <!-- Di dalam navbar -->

        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="fw-bold">PPDB</span> 
                <span class="fw-normal">SMK ANTARTIKA 1 SIDOARJO</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#persyaratan">Persyaratan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cara-daftar">Cara Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                </ul>
                <div>
                   @auth
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            {{ Auth::user()->name }} ({{ Auth::user()->role }})
        </button>
        <ul class="dropdown-menu">
            @if(Auth::user()->isAdmin())
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
            @elseif(Auth::user()->isPanitia())
                <li><a class="dropdown-item" href="{{ route('panitia.dashboard') }}">Dashboard Panitia</a></li>
            @else
                <li><a class="dropdown-item" href="{{ route('siswa.dashboard') }}">Dashboard Siswa</a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
@else
    <div>
        <a href="{{ route('login') }}" class="btn login-btn">Masuk</a>
        <a href="{{ route('register') }}" class="btn register-btn">Daftar</a>
    </div>
@endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section"
     style="background: linear-gradient(rgba(25, 36, 155, 0.7), rgba(40, 53, 147, 0.8)), url('{{ asset('images/profil.jpeg') }}');">
        <div class="container">
            <div class="logo-container">
                <h1 class="hero-title">SMK ANTARTIKA 1 SIDOARJO</h1>
            </div>
            <h2 class="hero-subtitle">Penerimaan Peserta Didik Baru</h2>
            <h3 class="hero-subtitle">Tahun Ajaran 2025/2026</h3>
            <a href="{{ route('register') }}" class="btn btn-primary-custom mt-4">Daftar Sekarang</a>
        </div>
    </section>

    <!-- School Info Section -->
    <section class="py-5">
        <div class="container">
            <div class="school-info">
                <div class="school-motto">
                    <h3>SMK BISA - HEBAT</h3>
                    <p>Pilih Sekolah yang Berkualitas Bukan Janji Tapi Bukti</p>
                </div>
                <p class="text-center">
                    <strong>SMK ANTARTIKA 1 SIDOARJO</strong> memiliki 5 Kompetensi Keahlian / Jurusan. 
                    Calon siswa dapat memilih berdasarkan minat, sesuai keahlian siswa.
                </p>
            </div>
        </div>
    </section>

    <!-- Jurusan Section -->
    <section class="py-5" id="jurusan">
        <div class="container">
            <h2 class="section-title">Program Jurusan</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card jurusan-card">
                        <img src="{{ 'images/rpl.jpg' }}" class="card-img-top jurusan-img" alt="Rekayasa Perangkat Lunak">
                        <div class="card-body">
                            <h4 class="jurusan-title">Rekayasa Perangkat Lunak</h4>
                            <p class="card-text">disiplin ilmu yang menerapkan prinsip-prinsip rekayasa dalam perancangan, pengembangan, pengujian, dan pemeliharaan perangkat lunak. Bidang ini lebih dari sekadar pemrograman, karena melibatkan proses yang sistematis, disiplin, dan terstruktur untuk memastikan perangkat lunak yang dihasilkan efisien, andal, dan berkualitas tinggi. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card jurusan-card">
                        <img src="{{ 'images/tkr.png' }}" class="card-img-top jurusan-img" alt="Teknik Kendaraan Ringan">
                        <div class="card-body">
                            <h4 class="jurusan-title">Teknik Kendaraan Ringan</h4>
                            <p class="card-text"> mempelajari berbagai aspek seperti pemeliharaan mesin, kelistrikan, sasis, dan bodi kendaraan, serta dilatih keterampilan praktis di bengkel untuk mengidentifikasi dan memperbaiki berbagai masalah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card jurusan-card">
                        <img src="{{ 'images/tpm.jpg' }}" class="card-img-top jurusan-img" alt="Teknik Permesinan">
                        <div class="card-body">
                            <h4 class="jurusan-title">Teknik Permesinan</h4>
                            <p class="card-text">Jurusan ini membekali siswa dengan keterampilan mengoperasikan mesin konvensional (bubut, frais, gerinda) dan mesin modern (CNC). Selain itu, dipelajari juga materi lain seperti membaca dan menggambar teknik, pengelasan, dan analisis material untuk menciptakan produk dengan presisi tinggi. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card jurusan-card">
                        <img src="{{ 'images/titl.jpg' }}" class="card-img-top jurusan-img" alt="Multimedia">
                        <div class="card-body">
                            <h4 class="jurusan-title">Teknik Instalasi Tenaga Listrik</h4>
                            <p class="card-text">program keahlian yang mempelajari perencanaan, pemasangan, pengoperasian, dan pemeliharaan sistem instalasi listrik untuk bangunan, industri, dan fasilitas umum. Siswa akan dibekali keterampilan untuk memasang instalasi penerangan dan tenaga, baik \(1\) fase maupun \(3\) fase, serta melakukan perbaikan peralatan listrik rumah tangga. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card jurusan-card">
                        <img src="{{ 'images/tei.jpg' }}" class="card-img-top jurusan-img" alt="Multimedia">
                        <div class="card-body">
                            <h4 class="jurusan-title">Teknik Electronica Industri</h4>
                            <p class="card-text">mempelajari rancang, rakit, operasikan, dan perbaiki sistem kontrol otomatis dalam industri, termasuk otomatisasi dengan sistem elektronika, pneumatik, dan hidrolik. Jurusan ini membekali siswa dengan keterampilan di bidang elektronika, mikrokontroler, PLC (Programmable Logic Controller), sensor, aktuator, serta teknik perawatan mesin. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Persyaratan Section -->
    <section class="py-5 bg-light" id="persyaratan">
        <div class="container">
            <h2 class="section-title">Persyaratan Pendaftaran</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h4>Dokumen yang Diperlukan</h4>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i> Fotokopi Akta Kelahiran (2 lembar)</li>
                            <li><i class="fas fa-check text-success me-2"></i> Fotokopi Kartu Keluarga (2 lembar)</li>
                            <li><i class="fas fa-check text-success me-2"></i> Pas foto 3x4 (4 lembar)</li>
                            <li><i class="fas fa-check text-success me-2"></i> Fotokopi rapor kelas 7-9</li>
                            <li><i class="fas fa-check text-success me-2"></i> Surat Keterangan Lulus/SKL</li>
                            <li><i class="fas fa-check text-success me-2"></i> Fotokopi KTP Orang Tua</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Jadwal Pendaftaran</h4>
                        <ul class="list-unstyled text-start">
                            <li><strong>Gelombang 1:</strong> 1 - 15 Januari 2024</li>
                            <li><strong>Gelombang 2:</strong> 16 - 31 Januari 2024</li>
                            <li><strong>Gelombang 3:</strong> 1 - 15 Februari 2024</li>
                            <li><strong>Pengumuman:</strong> 20 Februari 2024</li>
                            <li><strong>Daftar Ulang:</strong> 21 - 28 Februari 2024</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Daftar Section -->
    <section class="py-5" id="cara-daftar">
        <div class="container">
            <h2 class="section-title">Cara Pendaftaran</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h4>Pendaftaran Online</h4>
                        <ol class="text-start">
                            <li>Klik tombol <strong>"Daftar"</strong> di bagian atas halaman</li>
                            <li>Isi formulir pendaftaran dengan data yang valid</li>
                            <li>Upload dokumen persyaratan yang diperlukan</li>
                            <li>Submit formulir dan tunggu konfirmasi via email/SMS</li>
                            <li>Cetak bukti pendaftaran</li>
                            <li>Ikuti tes seleksi sesuai jadwal yang ditentukan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-light" id="faq">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions (FAQ)</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="faq-item active">
                        <div class="faq-question">
                            <span>Bagaimana cara mendaftar di PPDB SMK ANTARTIKA 1 SIDOARJO?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Anda dapat mendaftar melalui website ini dengan mengklik tombol "Daftar" di bagian atas halaman, kemudian mengisi formulir pendaftaran yang tersedia dengan data yang valid.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Apa saja jurusan yang tersedia di SMK ANTARTIKA 1 SIDOARJO?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>SMK ANTARTIKA 1 SIDOARJO memiliki 5 jurusan unggulan: Rekayasa Perangkat Lunak (RPL), Teknik Kendaraan Ringan (TKR), Teknik Instalasi Tenaga Listrik (TITL), Teknik Permesinan (TPM), Teknik Electronica Industri (TEI).</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Apa saja persyaratan pendaftaran PPDB?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Persyaratan meliputi: Fotokopi akta kelahiran, kartu keluarga, rapor, pas foto, dan surat keterangan lain yang diminta. Lihat bagian "Persyaratan" untuk detail lengkap.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Bagaimana cara melakukan daftar ulang?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Daftar ulang dapat dilakukan setelah pengumuman kelulusan pada tanggal 21-28 Februari 2024 dengan membayar biaya daftar ulang dan melengkapi dokumen yang diperlukan.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Siapa yang bisa dihubungi untuk informasi lebih lanjut?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Untuk informasi lebih lanjut, silakan hubungi:</p>
                            <ul>
                                <li>Bapak Joko Sukaryono: 0822-6506-1366</li>
                                <li>Ibu Mirna : 0852-9321-0624</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="contact-title">Kontak Panitia PPDB</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-user"></i> Bapak Joko Sukaryono: 0822-6506-1366</p>
                        <p><i class="fas fa-user"></i> Ibu Mirna : 0852-9321-0624</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="contact-title">Alamat Sekolah</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Siwalan Panji ,Desa bedrek Siwalan Panji, Kec. Buduran, Kab. Sidoarjo, Jawa Timur -61252</p>
                        <p><i class="fas fa-phone"></i> Telp. 0275-649300</p>
                        <p><i class="fas fa-mobile-alt"></i> Hp. 0899-7375-665</p>
                        <p><i class="fas fa-envelope"></i> info@smkantartika1sidoarjo.sch.id</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">SMK ANTARTIKA 1 SIDOARJO</h5>
                    <p>Sekolah menengah kejuruan unggulan yang berkomitmen menghasilkan lulusan kompeten dan berakhlak mulia.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#jurusan">Jurusan</a></li>
                        <li><a href="#persyaratan">Persyaratan</a></li>
                        <li><a href="#cara-daftar">Cara Daftar</a></li>
                        <li><a href="#faq">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Informasi</h5>
                    <ul class="footer-links">
                        <li><a href="#">Jadwal Pendaftaran</a></li>
                        <li><a href="#">Biaya Pendidikan</a></li>
                        <li><a href="#">Program Beasiswa</a></li>
                        <li><a href="#">Alumni</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © 2025 Farel Dwi Nugroho</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                faqItem.classList.toggle('active');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
