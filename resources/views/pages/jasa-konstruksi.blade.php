@extends('layouts.app')
@section('title', 'Jasa Konstruksi')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Jasa Konstruksi</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Jasa Konstruksi</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">LAYANAN KONSTRUKSI</span>
                <h2 class="section-title">Jasa Konstruksi <span class="text-warning">Profesional</span></h2>
                <p class="section-desc">Layanan konstruksi terpadu dengan tenaga ahli berpengalaman dan hasil berkualitas
                    tinggi</p>
            </div>

            @forelse($jasa as $i => $j)
                <div class="jk-section" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="jk-layout">
                        {{-- Kiri: Nama Jasa --}}
                        <div class="jk-left">
                            <span class="jk-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $j->title }}</h3>
                            <a href="{{ url('/contact') }}" class="btn btn-warning btn-sm mt-3 jk-btn">
                                <i class="bi bi-chat-dots-fill me-1"></i> Konsultasi
                            </a>
                        </div>

                        {{-- Kanan: Deskripsi + Galeri --}}
                        <div class="jk-right">
                            <p class="jk-desc">{{ $j->description }}</p>

                            {{-- Galeri Foto (maks 5 gambar) --}}
                            <div class="jk-gallery">
                                @if($j->images->count())
                                    @foreach($j->images->take(5) as $img)
                                        <a href="{{ asset('storage/' . $img->image) }}" class="jk-thumb" data-bs-toggle="modal"
                                            data-bs-target="#lightboxModal" data-img="{{ asset('storage/' . $img->image) }}"
                                            data-caption="{{ $j->title }} - Foto {{ $loop->iteration }}">
                                            <img src="{{ asset('storage/' . $img->image) }}"
                                                alt="{{ $j->title }} - Foto {{ $loop->iteration }}" loading="lazy">
                                            <div class="jk-thumb-overlay"><i class="bi bi-zoom-in"></i></div>
                                        </a>
                                    @endforeach
                                @else
                                    {{-- Tampilkan gambar dummy jika tidak ada gambar --}}
                                    @php
                                        $seed = 'jasa-konstruksi-' . $j->id;
                                        $width = 300;
                                        $height = 200;
                                    @endphp
                                    <a href="https://picsum.photos/seed/{{ $seed }}/800/600" class="jk-thumb" data-bs-toggle="modal"
                                        data-bs-target="#lightboxModal" data-img="https://picsum.photos/seed/{{ $seed }}/800/600"
                                        data-caption="{{ $j->title }} - Gambar Dummy">
                                        <img src="https://picsum.photos/seed/{{ $seed }}/{{ $width }}/{{ $height }}"
                                            alt="Gambar dummy {{ $j->title }}" loading="lazy"
                                            style="width:100%; height:100%; object-fit:cover;">
                                        <div class="jk-thumb-overlay"><i class="bi bi-zoom-in"></i></div>
                                    </a>
                                    {{-- Tambahkan hingga 5 thumbnail dummy jika diperlukan --}}
                                    @for($i = 2; $i <= 5; $i++)
                                        @php
                                            $seed = 'jasa-konstruksi-' . $j->id . '-' . $i;
                                        @endphp
                                        <a href="https://picsum.photos/seed/{{ $seed }}/800/600" class="jk-thumb" data-bs-toggle="modal"
                                            data-bs-target="#lightboxModal" data-img="https://picsum.photos/seed/{{ $seed }}/800/600"
                                            data-caption="{{ $j->title }} - Gambar Dummy {{ $i }}">
                                            <img src="https://picsum.photos/seed/{{ $seed }}/300/200"
                                                alt="Gambar dummy {{ $j->title }} {{ $i }}" loading="lazy"
                                                style="width:100%; height:100%; object-fit:cover;">
                                            <div class="jk-thumb-overlay"><i class="bi bi-zoom-in"></i></div>
                                        </a>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5" data-aos="fade-up">
                    <i class="bi bi-building" style="font-size: 4rem; color: #ddd;"></i>
                    <p class="text-muted mt-3">Belum ada layanan yang tersedia</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
                    <p class="cta-desc">Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami sekarang!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ url('/contact') }}" class="btn btn-dark btn-lg">
                        <i class="bi bi-telephone-fill me-1"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Lightbox Modal --}}
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0 shadow-none">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" aria-label="Tutup" style="z-index:10;"></button>
                <div class="modal-body p-0 text-center">
                    <img id="lightboxImage" src="" alt="" class="img-fluid rounded-4"
                        style="max-height:80vh; object-fit:contain;">
                    <p id="lightboxCaption" class="text-white mt-2 mb-0 fw-medium"></p>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* ==========================================================
           JASA KONSTRUKSI — CSS Grid Layout (Refined)
           - Kolom kiri lebih lebar → deskripsi & galeri tergeser ke kanan
           - Nomor ("01") dibuat lebih elegan & jelas terlihat
           - Ukuran thumbnail diperkecil agar lebih rapi
           ========================================================== */

            /* ---------- Card Wrapper ---------- */
            .jk-section {
                margin-bottom: 36px;
            }

            .jk-layout {
                display: grid;
                /* Kolom kiri 420px → mendorong konten kanan lebih ke kanan */
                grid-template-columns: 420px 1fr;
                gap: 96px;
                background: #fff;
                border-radius: 20px;
                padding: 48px 56px;
                box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
                border-left: 5px solid #FFC107;
                transition: box-shadow 0.35s ease, border-color 0.35s ease, transform 0.35s ease;
                overflow: hidden;
            }

            .jk-layout:hover {
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10);
                border-left-color: #FF9800;
                transform: translateY(-3px);
            }

            /* ---------- Kolom Kiri : Nomor + Judul + CTA ---------- */
            .jk-left {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
            }

            /* ---- Nomor Elegan ---- */
            .jk-number {
                font-size: 3.6rem;
                font-weight: 900;
                /* Warna solid emas dengan opacity tinggi agar jelas terbaca */
                color: #E5A800;
                -webkit-text-fill-color: #E5A800;
                background: none;
                -webkit-background-clip: unset;
                background-clip: unset;
                line-height: 1;
                margin-bottom: 6px;
                letter-spacing: -2px;
                position: relative;
                /* Subtle shadow untuk kedalaman */
                text-shadow: 0 2px 8px rgba(229, 168, 0, 0.18);
            }

            /* Garis dekoratif pendek di bawah nomor */
            .jk-number::after {
                content: '';
                display: block;
                width: 36px;
                height: 3px;
                background: linear-gradient(90deg, #FFC107, #FF9800);
                border-radius: 2px;
                margin-top: 8px;
            }

            .jk-left h3 {
                font-weight: 700;
                font-size: 1.35rem;
                color: #1a1a1a;
                margin: 8px 0 4px 0;
                line-height: 1.35;
            }

            .jk-btn {
                font-size: 0.82rem;
                font-weight: 600;
                border-radius: 8px;
                padding: 8px 18px;
                transition: transform 0.25s ease, box-shadow 0.25s ease;
            }

            .jk-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 14px rgba(255, 193, 7, 0.35);
            }

            /* ---------- Kolom Kanan : Deskripsi + Galeri ---------- */
            .jk-right {
                min-width: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .jk-desc {
                color: #555;
                line-height: 1.85;
                font-size: 0.95rem;
                margin-bottom: 20px;
                word-break: break-word;
            }

            /* ---------- Galeri Grid — Thumbnail Diperkecil ---------- */
            .jk-gallery {
                display: grid;
                /* min 90px → thumbnail lebih kecil & rapi */
                grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
                gap: 8px;
                max-width: 520px;
                /* batas lebar galeri agar tidak terlalu melar */
            }

            .jk-thumb {
                position: relative;
                aspect-ratio: 4 / 3;
                border-radius: 8px;
                overflow: hidden;
                cursor: pointer;
                text-decoration: none;
                display: block;
            }

            .jk-thumb img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .jk-thumb-overlay {
                position: absolute;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(0, 0, 0, 0.35);
                opacity: 0;
                transition: opacity 0.3s ease;
                color: #fff;
                font-size: 1.2rem;
            }

            .jk-thumb:hover img {
                transform: scale(1.08);
            }

            .jk-thumb:hover .jk-thumb-overlay {
                opacity: 1;
            }

            /* ---------- Lightbox Modal ---------- */
            #lightboxModal .modal-content {
                background: transparent !important;
            }

            /* ==========================================================
           RESPONSIVE BREAKPOINTS
           ========================================================== */

            /* Desktop kecil */
            @media (max-width: 1199px) {
                .jk-layout {
                    grid-template-columns: 280px 1fr;
                    gap: 48px;
                    padding: 40px 44px;
                }

                .jk-number {
                    font-size: 3.2rem;
                }

                .jk-gallery {
                    max-width: 460px;
                }
            }

            /* Tablet landscape */
            @media (max-width: 1023px) {
                .jk-layout {
                    grid-template-columns: 220px 1fr;
                    gap: 36px;
                    padding: 32px 32px;
                }

                .jk-number {
                    font-size: 2.8rem;
                }

                .jk-gallery {
                    grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
                    max-width: 400px;
                }
            }

            /* Mobile / Tablet portrait */
            @media (max-width: 767px) {
                .jk-layout {
                    grid-template-columns: 1fr;
                    gap: 18px;
                    padding: 24px 22px;
                    border-left-width: 4px;
                }

                .jk-left {
                    flex-direction: row;
                    align-items: center;
                    gap: 14px;
                    flex-wrap: wrap;
                }

                .jk-number {
                    font-size: 2.2rem;
                    margin-bottom: 0;
                }

                .jk-number::after {
                    display: none;
                }

                .jk-left h3 {
                    font-size: 1.15rem;
                    margin-top: 0;
                }

                .jk-gallery {
                    grid-template-columns: repeat(auto-fill, minmax(75px, 1fr));
                    gap: 6px;
                    max-width: 100%;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Lightbox: set image src saat modal terbuka
            document.querySelectorAll('.jk-thumb[data-img]').forEach(function (thumb) {
                thumb.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('lightboxImage').src = this.dataset.img;
                    document.getElementById('lightboxCaption').textContent = this.dataset.caption || '';
                });
            });
        </script>
    @endpush
@endsection