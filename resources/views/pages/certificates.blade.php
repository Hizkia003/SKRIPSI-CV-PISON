@extends('layouts.app')
@section('title', 'Sertifikat')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div data-aos="fade-right">
                <span class="page-subtitle">LEGALITAS PERUSAHAAN</span>
                <h1 class="page-title">Sertifikat <span class="text-warning">Kami</span></h1>
            </div>
            <div data-aos="fade-left">
                <nav class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="bi bi-chevron-right"></i>
                    <span>Sertifikat</span>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Certificates Grid -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">SERTIFIKAT PERUSAHAAN</span>
            <h2 class="section-title">Legalitas & <span class="text-warning">Sertifikasi</span></h2>
            <p class="section-desc">Kami berkomitmen pada standar kualitas tertinggi dengan sertifikasi yang diakui</p>
        </div>

        @if($certificates->count() > 0)
        <div class="row g-4">
            @foreach($certificates as $i => $cert)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                <div class="certificate-card">
                    <div class="certificate-image">
                        @if($cert->image)
                        <img src="{{ asset('storage/'.$cert->image) }}" alt="{{ $cert->name }}" loading="lazy"
                            onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'cert-no-img\'><i class=\'bi bi-image\'></i><p>Gambar tidak dapat dimuat</p></div>'">

                        <div class="certificate-overlay">
                            <a href="{{ asset('storage/'.$cert->image) }}" target="_blank"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-eye-fill"></i> Lihat Gambar
                            </a>
                        </div>
                        @else
                        <div class="cert-no-img">
                            <i class="bi bi-patch-check-fill"></i>
                            <p>Foto belum tersedia</p>
                        </div>
                        @endif
                    </div>
                    <div class="certificate-info">
                        <div class="certificate-icon">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div>
                            <h5 class="certificate-name">{{ $cert->name }}</h5>
                            <p class="certificate-subtitle">{{ $cert->subtitle }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-patch-check" style="font-size: 5rem; color: #ddd;"></i>
            <h4 class="mt-3 text-muted">Belum ada sertifikat tersedia</h4>
        </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-8">
                <h2 class="cta-title">Tertarik dengan Layanan Kami?</h2>
                <p class="cta-desc">Hubungi kami untuk konsultasi gratis dan penawaran terbaik!</p>
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