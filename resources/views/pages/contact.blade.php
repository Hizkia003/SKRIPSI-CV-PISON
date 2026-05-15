@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Hubungi Kami</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kontak</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Section: Informasi Kontak (4 Cards) -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">HUBUNGI KAMI</span>
                <h2 class="section-title">Informasi <span class="text-warning">Kontak</span></h2>
                <p class="section-desc">Hubungi tim kami melalui berbagai saluran berikut</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Alamat -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                    <div class="contact-info-card-modern">
                        <div class="contact-icon-modern">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <h5>Alamat Perusahaan</h5>
                        <p>{{ $contactInfo->address ?? 'Jl. Industri Raya No. 123, Jakarta Timur 13920' }}</p>
                    </div>
                </div>

                <!-- Nomor Telepon / WhatsApp -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card-modern">
                        <div class="contact-icon-modern">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <h5>Nomor Telepon</h5>
                        <p>
                            @if(!empty($contactInfo->whatsapp))
                                <a href="https://wa.me/{{ $contactInfo->whatsapp_full }}" target="_blank">
                                    {{ $contactInfo->whatsapp_display }}
                                </a>
                            @else
                                +62 812-3456-7890
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card-modern">
                        <div class="contact-icon-modern">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h5>Email Perusahaan</h5>
                        <p>
                            @if(!empty($contactInfo->email))
                                <a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                            @else
                                info@pisonteknik.co.id
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-card-modern">
                        <div class="contact-icon-modern">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <h5>Jam Operasional</h5>
                        <p>{{ $contactInfo->working_hours ?? 'Senin - Sabtu: 08:00 - 17:00' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Lokasi Kami (Google Maps) -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">TEMUKAN KAMI</span>
                <h2 class="section-title">Lokasi <span class="text-warning">Kantor</span></h2>
                <p class="section-desc">Kunjungi kantor kami untuk konsultasi langsung</p>
            </div>

            <div class="map-card" data-aos="fade-up" data-aos-delay="100">
                <div class="map-container">
                    @if(!empty($contactInfo->map_embed))
                        <iframe src="{{ $contactInfo->map_embed }}" width="100%" height="400" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section (Optional, bisa dipertahankan) -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
                    <p class="cta-desc">Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami sekarang juga!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    @if(!empty($contactInfo->whatsapp))
                        <a href="https://wa.me/{{ $contactInfo->whatsapp_full }}" target="_blank" class="btn btn-dark btn-lg">
                            <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            /* Modern Contact Card Styles */
            .contact-info-card-modern {
                background: #fff;
                border-radius: 24px;
                padding: 32px 20px;
                text-align: center;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                border: 1px solid #f0f0f0;
                height: 100%;
            }

            .contact-info-card-modern:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                border-color: #FFC107;
            }

            .contact-icon-modern {
                width: 70px;
                height: 70px;
                margin: 0 auto 20px;
                background: linear-gradient(135deg, #FFC107, #FFA000);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.8rem;
                color: #1a1a1a;
                transition: all 0.3s ease;
                box-shadow: 0 8px 20px rgba(255, 193, 7, 0.3);
            }

            .contact-info-card-modern:hover .contact-icon-modern {
                transform: scale(1.05);
                box-shadow: 0 12px 28px rgba(255, 193, 7, 0.4);
            }

            .contact-info-card-modern h5 {
                font-size: 1.1rem;
                font-weight: 700;
                margin-bottom: 12px;
                color: #1a1a1a;
            }

            .contact-info-card-modern p {
                margin: 0;
                color: #64748b;
                font-size: 0.95rem;
                line-height: 1.5;
                word-break: break-word;
            }

            .contact-info-card-modern a {
                color: #FFA000;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            }

            .contact-info-card-modern a:hover {
                color: #1a1a1a;
            }

            /* Map Card */
            .map-card {
                border-radius: 24px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
                border: 3px solid #FFC107;
            }

            .map-card iframe {
                display: block;
            }

            /* Adjust padding for section after grid */
            .section-padding.pt-0 {
                padding-top: 0;
            }

            @media (max-width: 991px) {
                .contact-info-card-modern {
                    padding: 28px 16px;
                }

                .contact-icon-modern {
                    width: 60px;
                    height: 60px;
                    font-size: 1.5rem;
                }
            }

            @media (max-width: 767px) {
                .contact-info-card-modern {
                    padding: 24px 16px;
                }
            }
        </style>
    @endpush
@endsection