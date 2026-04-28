@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
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
                <p class="lead mb-3">{{ $about->company_name ?? 'CV. Pison Teknik Indonesia' }}</p>
                <p class="text-muted mb-4">{{ $about->description }}</p>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="about-feature"><i class="bi bi-check-circle-fill text-warning"></i><span>Sertifikat
                                izin pendirian perusahaan
                            </span></div>
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
@endsection