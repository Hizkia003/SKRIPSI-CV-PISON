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
        <div class="row g-4 mt-4">
            @foreach($services as $i => $srv)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="svc-card">
                    <div class="svc-card-header">
                        <div class="svc-icon-wrap">
                            <i class="bi {{ $srv->icon }}"></i>
                        </div>
                        <span class="svc-number">0{{ $i + 1 }}</span>
                    </div>
                    <div class="svc-card-body">
                        <h4 class="svc-title">{{ $srv->title }}</h4>
                        <p class="svc-desc">{{ $srv->description }}</p>
                        @if($srv->materials)
                        <div class="svc-materials">
                            <h6><i class="bi bi-box-seam-fill me-1"></i> Bahan / Lingkup</h6>
                            <div class="svc-tags">
                                @foreach(explode(',', $srv->materials) as $mat)
                                <span class="svc-tag"><i class="bi bi-check2"></i> {{ trim($mat) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="svc-card-footer">
                        <a href="{{ url('/contact') }}" class="svc-cta">
                            Konsultasi Gratis <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
/* Service Card */
.svc-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    border: 1px solid #f0f0f0;
    transition: all 0.35s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
}
.svc-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #FFC107, #FFA000);
    transform: scaleX(0);
    transition: transform 0.35s ease;
    transform-origin: left;
}
.svc-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    border-color: #FFC107;
}
.svc-card:hover::before {
    transform: scaleX(1);
}

.svc-card-header {
    padding: 30px 28px 0;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}
.svc-icon-wrap {
    width: 68px;
    height: 68px;
    background: linear-gradient(135deg, #FFF8E1, #FFECB3);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: #FFA000;
    transition: all 0.35s;
}
.svc-card:hover .svc-icon-wrap {
    background: linear-gradient(135deg, #FFC107, #FFA000);
    color: #1a1a1a;
    transform: rotate(-5deg) scale(1.08);
    box-shadow: 0 8px 24px rgba(255,193,7,0.4);
}
.svc-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: #f0f0f0;
    line-height: 1;
    transition: color 0.35s;
}
.svc-card:hover .svc-number {
    color: #FFC107;
}

.svc-card-body {
    padding: 20px 28px;
    flex: 1;
}
.svc-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: #1a1a1a;
    margin-bottom: 10px;
}
.svc-desc {
    color: #64748b;
    font-size: 0.9rem;
    line-height: 1.7;
    margin-bottom: 18px;
}

.svc-materials {
    background: #f8fafc;
    border-radius: 12px;
    padding: 14px 16px;
    border: 1px solid #e2e8f0;
}
.svc-materials h6 {
    font-size: 0.78rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.svc-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}
.svc-tag {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 0.8rem;
    color: #475569;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.2s;
}
.svc-tag i {
    color: #FFA000;
    font-size: 0.7rem;
}
.svc-card:hover .svc-tag {
    border-color: #FFC107;
    background: #FFFBEB;
}

.svc-card-footer {
    padding: 0 28px 24px;
    margin-top: auto;
}
.svc-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #FFA000;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.25s;
}
.svc-cta:hover {
    color: #1a1a1a;
    gap: 14px;
}

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