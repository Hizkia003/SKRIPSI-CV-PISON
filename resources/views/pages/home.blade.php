@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-7" data-aos="fade-right">
                    <h1 class="hero-title">
                        Membangun <span class="text-warning">Masa Depan</span> dengan Kualitas Terbaik
                    </h1>
                    <p class="hero-desc">
                        CV. Pison Teknik Indonesia adalah perusahaan kontraktor yang menyediakan jasa konstruksi dan
                        renovasi bangunan dengan fokus pada pekerjaan struktur dan atap, serta didukung penyediaan material
                        berkualitas untuk memenuhi kebutuhan proyek secara menyeluruh.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ url('/contact') }}" class="btn btn-warning btn-lg me-2">
                            <i class="bi bi-chat-dots-fill me-1"></i> Hubungi Kami
                        </a>
                        <a href="{{ url('/projects') }}" class="btn btn-outline-light btn-lg">
                            Lihat Proyek <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="hero-features mt-4">
                        <div class="feature-item"><i class="bi bi-check-circle-fill text-warning"></i> Sertifikat izin
                            pendirian perusahaan</div>
                        <div class="feature-item"><i class="bi bi-check-circle-fill text-warning"></i> Harga Kompetitif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800" alt="Construction"
                            class="img-fluid rounded-4 shadow-lg">
                        <div class="hero-card-float">
                            <i class="bi bi-building text-warning"></i>
                            <div>
                                <h6 class="mb-0">250+ Proyek</h6>
                                <small>Telah diselesaikan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6" data-aos="fade-up">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-building-check"></i></div>
                        <h2 class="stat-number" data-count="250">0</h2>
                        <p>Proyek Selesai</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
                        <h2 class="stat-number" data-count="4">0</h2>
                        <p>Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Kami — Two Buttons -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">LAYANAN KAMI</span>
                <h2 class="section-title">Solusi Konstruksi <span class="text-warning">Terpadu</span></h2>
                <p class="section-desc">Kami menyediakan layanan supply material berkualitas dan jasa konstruksi profesional
                </p>
            </div>
            <div class="row g-4 mt-3 justify-content-center">
                <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <a href="{{ url('/supply-material') }}" class="layanan-btn-card">
                        <div class="layanan-icon">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <h3>Supply Material</h3>
                        <p>Zinc Aluminium, UPVC, Fiberglass, Stainless Steel, dan berbagai material berkualitas lainnya</p>
                        <span class="layanan-link">Lihat Material <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ url('/jasa-konstruksi') }}" class="layanan-btn-card">
                        <div class="layanan-icon">
                            <i class="bi bi-building-fill-gear"></i>
                        </div>
                        <h3>Jasa Konstruksi</h3>
                        <p>Pembuatan atap, dinding, lisplang, talang, skylight, safetyline, railing, dan lainnya</p>
                        <span class="layanan-link">Lihat Layanan <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">PROYEK TERBARU</span>
                <h2 class="section-title">Portfolio <span class="text-warning">Terbaik</span> Kami</h2>
                <p class="section-desc">Beberapa proyek yang telah kami selesaikan dengan kualitas terbaik</p>
            </div>
            <div class="row g-4 mt-3">
                @forelse($projects as $i => $p)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                        <div class="project-card">
                            <div class="project-image">
                                <img src="{{ $p->thumbnail ? asset('storage/' . $p->thumbnail) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600' }}"
                                    alt="{{ $p->title }}">
                            </div>
                            <div class="project-info">
                                <span class="project-category">{{ ucfirst($p->category) }} • {{ $p->year ?? '2024' }}</span>
                                <h5>{{ $p->title }}</h5>
                                <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> {{ $p->location }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-folder2-open" style="font-size: 4rem; color: #ddd;"></i>
                        <p class="text-muted mt-3">Belum ada proyek yang tersedia</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ url('/projects') }}" class="btn btn-outline-dark btn-lg">Lihat Semua Proyek</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
                    <p class="cta-desc">Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami sekarang juga!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ url('/contact') }}" class="btn btn-dark btn-lg">
                        <i class="bi bi-telephone-fill me-1"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection