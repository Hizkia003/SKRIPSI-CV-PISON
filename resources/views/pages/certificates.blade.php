{{-- resources/views/frontend/certificates.blade.php --}}
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
                                <div class="doc-icon">
                                    <i class="bi bi-file-pdf"></i>
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
@endsection

{{-- Script Filter --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterBtns = document.querySelectorAll('.btn-filter');
            const items = document.querySelectorAll('.certificate-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    // Update active button
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

            // Tampilkan hanya kategori pertama saat load
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