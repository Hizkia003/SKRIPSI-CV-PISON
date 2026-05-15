@extends('layouts.app')
@section('title', 'Layanan')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Layanan Kami</h1>
        <nav data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Layanan</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Intro Section -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">LAYANAN PROFESIONAL</span>
            <h2 class="section-title">Solusi <span class="text-warning">Konstruksi</span> Terpercaya</h2>
            <p class="section-desc">Kami menyediakan berbagai layanan konstruksi dan fabrikasi dengan material berkualitas tinggi, dikerjakan oleh tenaga ahli berpengalaman untuk hasil yang presisi dan tahan lama.</p>
        </div>

        <!-- Service Cards -->
        <div class="row g-4 mt-4 justify-content-center">
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

<!-- Why Choose Us -->
<section class="section-padding" style="background: linear-gradient(135deg, #1a1a1a, #2d2d2d);">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle" style="color: #FFC107;">MENGAPA MEMILIH KAMI</span>
            <h2 class="section-title" style="color: #fff;">Keunggulan <span class="text-warning">Pison Teknik</span></h2>
        </div>
        <div class="row g-4 mt-3">
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-patch-check-fill"></i></div>
                    <h5>Material Premium</h5>
                    <p>Hanya menggunakan bahan berkualitas tinggi dengan standar industri</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-people-fill"></i></div>
                    <h5>Tim Berpengalaman</h5>
                    <p>Tenaga ahli terlatih dengan pengalaman puluhan tahun di bidangnya</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-clock-history"></i></div>
                    <h5>Tepat Waktu</h5>
                    <p>Komitmen penyelesaian proyek sesuai jadwal yang telah disepakati</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-wallet2"></i></div>
                    <h5>Harga Kompetitif</h5>
                    <p>Penawaran harga terbaik tanpa mengorbankan kualitas pekerjaan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-8">
                <h2 class="cta-title">Butuh Layanan Konstruksi Profesional?</h2>
                <p class="cta-desc">Dapatkan penawaran terbaik dengan konsultasi gratis dari tim ahli kami</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ url('/contact') }}" class="btn btn-dark btn-lg"><i class="bi bi-chat-dots-fill me-1"></i>
                    Konsultasi Sekarang</a>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* Why Choose Card */
.why-card {
    text-align: center;
    padding: 30px 20px;
    border-radius: 16px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    transition: all 0.3s;
}
.why-card:hover {
    background: rgba(255,193,7,0.08);
    border-color: rgba(255,193,7,0.25);
    transform: translateY(-4px);
}
.why-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #FFC107, #FFA000);
    color: #1a1a1a;
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 16px;
}
.why-card h5 {
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 8px;
}
.why-card p {
    color: rgba(255,255,255,0.55);
    font-size: 0.85rem;
    line-height: 1.6;
    margin: 0;
}
</style>
@endpush
@endsection