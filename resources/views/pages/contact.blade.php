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

    <!-- Contact Info Cards -->
    <section class="section-padding">
        <div class="container">
            <!-- Maps & Info -->
            <div class="row g-4 mt-4">
                <div class="col-lg-12" data-aos="fade-up">
                    <div class="map-card mb-4">
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

                    <!-- Informasi Kontak Tambahan -->
                    <div class="contact-side-card">
                        <h5 class="mb-4"><i class="bi bi-info-circle-fill text-warning me-2"></i>Informasi Kontak</h5>

                        @if(!empty($contactInfo->address))
                            <div class="contact-side-item">
                                <div class="contact-side-icon"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    <h6>Alamat</h6>
                                    <p>{{ $contactInfo->address }}</p>
                                </div>
                            </div>
                        @endif

                        @if(!empty($contactInfo->whatsapp))
                            <div class="contact-side-item">
                                <div class="contact-side-icon" style="background: linear-gradient(135deg, #25D366, #128C7E);"><i
                                        class="bi bi-whatsapp"></i></div>
                                <div>
                                    <h6>WhatsApp</h6>
                                    <p><a href="https://wa.me/{{ $contactInfo->whatsapp_full }}"
                                            target="_blank">{{ $contactInfo->whatsapp_display }}</a></p>
                                </div>
                            </div>
                        @endif

                        @if(!empty($contactInfo->email))
                            <div class="contact-side-item">
                                <div class="contact-side-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);"><i
                                        class="bi bi-envelope-fill"></i></div>
                                <div>
                                    <h6>Email</h6>
                                    <p><a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p>
                                </div>
                            </div>
                        @endif

                        @if(!empty($contactInfo->working_hours))
                            <div class="contact-side-item">
                                <div class="contact-side-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);"><i
                                        class="bi bi-clock-fill"></i></div>
                                <div>
                                    <h6>Jam Operasional</h6>
                                    <p>{{ $contactInfo->working_hours }}</p>
                                </div>
                            </div>
                        @endif
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
            /* Map Card */
            .map-card {
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
                border: 3px solid #FFC107;
            }

            .map-card iframe {
                display: block;
            }

            /* Contact Side Card */
            .contact-side-card {
                background: #fff;
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            }

            .contact-side-card h5 {
                font-size: 1.1rem;
                font-weight: 700;
            }

            .contact-side-item {
                display: flex;
                gap: 15px;
                align-items: flex-start;
                padding: 15px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .contact-side-item:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }

            .contact-side-icon {
                width: 44px;
                height: 44px;
                background: linear-gradient(135deg, var(--primary), var(--primary-dark));
                color: #fff;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.1rem;
                flex-shrink: 0;
            }

            .contact-side-item h6 {
                font-size: 0.85rem;
                font-weight: 700;
                margin-bottom: 2px;
                color: #1a1a1a;
            }

            .contact-side-item p {
                margin: 0;
                color: #64748b;
                font-size: 0.9rem;
            }

            .contact-side-item a {
                color: #FFA000;
                text-decoration: none;
                font-weight: 500;
            }

            .contact-side-item a:hover {
                color: #1a1a1a;
            }
        </style>
    @endpush
@endsection