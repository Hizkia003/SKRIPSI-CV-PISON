@extends('layouts.app')
@section('title', 'Sertifikat')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div data-aos="fade-right">
                    <span class="page-subtitle">DOKUMEN & SERTIFIKASI</span>
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

    <!-- Filter & Dokumen -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle">DOKUMEN RESMI</span>
                <h2 class="section-title">Legalitas & <span class="text-warning">Sertifikasi</span></h2>
                <p class="section-desc">Kami berkomitmen pada standar kualitas tertinggi dengan dokumentasi yang lengkap</p>
            </div>

            {{-- Tombol Filter --}}
            <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap" data-aos="fade-up">
                <button class="btn btn-filter active" data-filter="company_legalitas">
                    <i class="bi bi-building-check me-2"></i> Legalitas Perusahaan
                </button>
                <button class="btn btn-filter" data-filter="worker_certificate">
                    <i class="bi bi-person-badge me-2"></i> Sertifikat Pekerja
                </button>
            </div>

            {{-- Daftar Dokumen --}}
            @if($certificates->count() > 0)
                <div class="row g-4" id="certificateContainer">
                    @foreach($certificates as $i => $cert)
                        <div class="col-lg-6 col-md-6 certificate-item" data-category="{{ $cert->category }}" data-aos="fade-up"
                            data-aos-delay="{{ $i * 100 }}">
                            <div class="doc-card">
                                {{-- PREVIEW DOKUMEN --}}
                                <div class="doc-preview">
                                    @php
                                        $filePath = $cert->file ? public_path('storage/' . $cert->file) : null;
                                        $fileExtension = $cert->file ? pathinfo($cert->file, PATHINFO_EXTENSION) : null;
                                    @endphp
                                    @if($cert->file && file_exists($filePath))
                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <img src="{{ asset('storage/' . $cert->file) }}" alt="{{ $cert->name }}"
                                                class="doc-image img-fluid">
                                        @elseif($fileExtension === 'pdf')
                                            <embed src="{{ asset('storage/' . $cert->file) }}" type="application/pdf" class="doc-pdf-embed">
                                        @else
                                            <div class="doc-icon-big"><i class="bi bi-file-earmark"></i></div>
                                        @endif
                                    @else
                                        <div class="doc-icon-big"><i class="bi bi-file-earmark-pdf"></i></div>
                                    @endif
                                </div>

                                <div class="doc-body">
                                    <h5 class="doc-name">{{ $cert->name }}</h5>
                                    @if($cert->number)
                                        <p class="doc-number mb-1"><strong>Nomor:</strong> {{ $cert->number }}</p>
                                    @endif
                                    <p class="doc-category">
                                        <span class="badge-doc">
                                            @if($cert->category === 'company_legalitas')
                                                <i class="bi bi-building-check"></i> Legalitas Perusahaan
                                            @else
                                                <i class="bi bi-person-badge"></i> Sertifikat Pekerja
                                            @endif
                                        </span>
                                    </p>
                                    @if($cert->file)
                                        <a href="{{ asset('storage/' . $cert->file) }}" target="_blank"
                                            class="btn btn-sm btn-outline-warning mt-2">
                                            <i class="bi bi-eye-fill me-1"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-file-pdf" style="font-size: 5rem; color: #ddd;"></i>
                    <h4 class="mt-3 text-muted">Belum ada dokumen tersedia</h4>
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

    <style>
        .doc-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
            height: 100%;
        }

        .doc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            border-color: #FFC107;
        }

        .doc-preview {
            width: 100%;
            height: 200px;
            background: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            border: 1px solid #e2e8f0;
        }

        .doc-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .doc-pdf-embed {
            width: 100%;
            height: 100%;
            border: none;
        }

        .doc-icon-big {
            font-size: 4rem;
            color: #94a3b8;
        }

        .doc-body {
            flex: 1;
        }

        .doc-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 6px;
        }

        .doc-number {
            color: #64748b;
            font-size: 0.9rem;
        }

        .badge-doc {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF8E1;
            color: #92400E;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .btn-outline-warning {
            color: #FFA000;
            border-color: #FFC107;
        }

        .btn-outline-warning:hover {
            background: #FFC107;
            color: #1a1a1a;
        }
    </style>
@endsection

{{-- Script Filter --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterBtns = document.querySelectorAll('.btn-filter');
            const items = document.querySelectorAll('.certificate-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;

                    items.forEach(item => {
                        if (item.dataset.category === filter) {
                            item.style.display = 'block';
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0)';
                            }, 10);
                        } else {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                item.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });

            const defaultFilter = document.querySelector('.btn-filter.active');
            if (defaultFilter) {
                const filter = defaultFilter.dataset.filter;
                items.forEach(item => {
                    if (item.dataset.category !== filter) {
                        item.style.display = 'none';
                        item.style.opacity = '0';
                    } else {
                        item.style.opacity = '1';
                    }
                });
            }
        });
    </script>
@endpush