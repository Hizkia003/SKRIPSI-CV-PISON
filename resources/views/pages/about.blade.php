@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    {{-- Hero / Page Header --}}
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Tentang Kami</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Deskripsi Perusahaan --}}
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800" alt="About"
                            class="img-fluid rounded-4">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-subtitle">TENTANG KAMI</span>
                    <h2 class="section-title mb-4">Kontraktor Profesional dengan <span class="text-warning">Pengalaman
                            Luas</span></h2>
                    <p class="lead mb-3">CV. Pison Teknik Indonesia</p>
                    <p class="text-muted mb-4">CV. Pison Teknik Indonesia merupakan perusahaan kontraktor yang berdiri sejak tahun 2022 dan bergerak di bidang jasa renovasi serta konstruksi bangunan, dengan fokus pada pekerjaan struktur dan atap untuk kebutuhan gedung industrial maupun bangunan residensial. Seiring dengan perkembangan usaha dan meningkatnya kebutuhan pasar, perusahaan ini juga memperluas layanannya sebagai distributor material bahan bangunan, khususnya pada sektor atap dan konstruksi, guna memberikan solusi yang lebih terintegrasi kepada pelanggan. Dengan mengedepankan kualitas pekerjaan, ketepatan waktu, serta pelayanan yang profesional, CV. Pison Teknik Indonesia berkomitmen untuk menjadi mitra yang dapat diandalkan dalam setiap proyek yang dikerjakan.</p>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="about-feature"><i class="bi bi-check-circle-fill text-warning"></i><span>Sertifikat
                                    izin pendirian perusahaan</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-feature"><i class="bi bi-check-circle-fill text-warning"></i><span>Harga
                                    Kompetitif</span></div>
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="btn btn-warning btn-lg">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi & Misi (dengan penomoran) --}}
    <section class="section-padding bg-light">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">MENGAPA KAMI</span>
                <h2 class="section-title">Visi & <span class="text-warning">Misi</span></h2>
            </div>

            <div class="row g-4">
                <!-- Visi -->
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="vision-card h-100">
                        <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
                        <h3>Visi</h3>
                        <ol class="number-list">
                            <li>Menjadi perusahaan kontraktor terdepan di Indonesia yang mengedepankan kualitas, keselamatan, dan inovasi.</li>
                            <li>Mewujudkan ekosistem pembangunan berkelanjutan yang memberikan nilai tambah bagi masyarakat dan lingkungan.</li>
                        </ol>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="vision-card h-100">
                        <div class="vm-icon"><i class="bi bi-bullseye"></i></div>
                        <h3>Misi</h3>
                        <ol class="number-list">
                            <li>Menyediakan jasa konstruksi berkualitas tinggi sesuai standar nasional dan internasional.</li>
                            <li>Menerapkan teknologi terkini untuk efisiensi waktu dan biaya proyek.</li>
                            <li>Membangun kemitraan jangka panjang dengan klien berdasarkan kepercayaan dan hasil nyata.</li>
                            <li>Meningkatkan kompetensi sumber daya manusia secara berkelanjutan melalui pelatihan dan sertifikasi.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Keunggulan (dipisah & tampil lebih menonjol) --}}
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">MENGAPA KAMI</span>
                <h2 class="section-title">Keunggulan <span class="text-warning">Kami</span></h2>
                <p class="section-desc">Inilah yang membuat kami berbeda dan dipercaya oleh klien</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-up" data-aos-delay="0">
                    <div class="advantage-card-new">
                        <div class="adv-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="adv-name">Tenaga Ahli Berpengalaman</h5>
                        <p class="adv-desc">Tim kami terdiri dari para profesional bersertifikasi nasional dengan pengalaman di berbagai proyek besar.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-up" data-aos-delay="100">
                    <div class="advantage-card-new">
                        <div class="adv-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="adv-name">Material Berkualitas</h5>
                        <p class="adv-desc">Kami hanya menggunakan bahan baku premium yang telah teruji untuk menjamin kekuatan dan ketahanan bangunan.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-up" data-aos-delay="200">
                    <div class="advantage-card-new">
                        <div class="adv-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="adv-name">Harga Kompetitif</h5>
                        <p class="adv-desc">Dapatkan penawaran terbaik dengan transparansi biaya tanpa biaya tersembunyi.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="zoom-in-up" data-aos-delay="300">
                    <div class="advantage-card-new">
                        <div class="adv-icon">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="adv-name">Tepat Waktu</h5>
                        <p class="adv-desc">Komitmen kami menyelesaikan setiap proyek sesuai jadwal yang disepakati tanpa mengorbankan kualitas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection