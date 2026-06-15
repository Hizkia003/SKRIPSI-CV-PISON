@extends('layouts.app')
@section('title', 'Supply Material')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Supply Material</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Supply Material</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">MATERIAL BERKUALITAS</span>
                <h2 class="section-title">Material <span class="text-warning">Unggulan</span> Kami</h2>
                <p class="section-desc">Kami menyediakan berbagai material berkualitas tinggi untuk kebutuhan konstruksi
                    Anda</p>
            </div>

            @forelse($materials as $i => $m)
                <div class="sm-section" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                    <div class="sm-layout">
                        {{-- Kiri: Gambar + Nomor + Nama --}}
                        <div class="sm-left">
                            @if($m->image)
                                <div class="sm-image-wrap">
                                    <img src="{{ asset('storage/' . $m->image) }}" alt="{{ $m->title }}" class="sm-image">
                                </div>
                            @else
                                <div class="sm-icon-wrap">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                            @endif
                            <span class="sm-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $m->title }}</h3>
                        </div>

                        {{-- Kanan: Deskripsi Material --}}
                        <div class="sm-right">
                            <p class="sm-desc">{{ $m->description }}</p>
                            <a href="{{ url('/contact') }}" class="sm-link">
                                <span>Tanyakan Harga</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="bi bi-box-seam" style="font-size: 4rem; color: #ddd;"></i>
                    <p class="text-muted mt-3">Belum ada material yang tersedia</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="cta-title">Butuh Material untuk Proyek Anda?</h2>
                    <p class="cta-desc">Hubungi kami untuk konsultasi dan penawaran harga terbaik!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ url('/contact') }}" class="btn btn-dark btn-lg">
                        <i class="bi bi-telephone-fill me-1"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            .sm-section {
                margin-bottom: 28px;
            }

            .sm-layout {
                display: grid;
                grid-template-columns: 280px 1fr;
                gap: 48px;
                background: #fff;
                border-radius: 20px;
                padding: 32px 40px;
                box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
                border-left: 5px solid #FFC107;
                transition: all 0.35s ease;
                align-items: center;
            }

            .sm-layout:hover {
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10);
                border-left-color: #FF9800;
                transform: translateY(-3px);
            }

            .sm-left {
                text-align: center;
            }

            .sm-image-wrap {
                margin-bottom: 16px;
            }

            .sm-image {
                width: 100%;
                max-width: 200px;
                max-height: 160px;
                object-fit: cover;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                margin: 0 auto;
            }

            .sm-icon-wrap {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #FFF8E1, #FFECB3);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 16px;
            }

            .sm-icon-wrap i {
                font-size: 2rem;
                color: #F57F17;
            }

            .sm-number {
                font-size: 1.8rem;
                font-weight: 800;
                color: #E5A800;
                display: block;
                margin-bottom: 4px;
            }

            .sm-left h3 {
                font-size: 1.3rem;
                font-weight: 700;
                margin: 8px 0 0;
                color: #1a1a1a;
            }

            .sm-desc {
                color: #555;
                line-height: 1.7;
                margin-bottom: 16px;
                text-align: justify;
            }

            .sm-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: #F57F17;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.2s;
            }

            .sm-link:hover {
                gap: 12px;
                color: #E65100;
            }

            @media (max-width: 991px) {
                .sm-layout {
                    grid-template-columns: 1fr;
                    gap: 24px;
                    padding: 28px 30px;
                    text-align: center;
                }

                .sm-image {
                    max-width: 180px;
                }

                .sm-desc {
                    text-align: left;
                }
            }

            @media (max-width: 576px) {
                .sm-layout {
                    padding: 20px;
                }

                .sm-number {
                    font-size: 1.5rem;
                }
            }
        </style>
    @endpush
@endsection