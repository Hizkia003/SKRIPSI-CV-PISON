@extends('layouts.app')
@section('title', 'TikTok')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Konten TikTok Kami</h1>
        <nav data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">TikTok</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">SOCIAL MEDIA</span>
            <h2 class="section-title">Ikuti Konten <span class="text-warning">TikTok</span> Kami</h2>
            <p class="section-desc">Lihat behind the scene, tips konstruksi, dan update proyek terbaru kami</p>
            @if($about?->tiktok)
            <a href="{{ $about->tiktok }}" target="_blank" class="btn btn-dark btn-lg mt-3">
                <i class="bi bi-tiktok me-1"></i> Follow TikTok Kami
            </a>
            @endif
        </div>

        <!-- Video Grid: embed langsung, tanpa judul/deskripsi/views/likes -->
        <div class="row g-4 mt-3">
            @forelse($tiktoks as $i => $tt)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 100 }}">
                <div class="tt-embed-card">
                    @php
                        // Ekstrak video ID dari URL TikTok
                        preg_match('/video\/(\d+)/', $tt->video_url ?? '', $match);
                        $videoId = $match[1] ?? null;
                    @endphp

                    @if($videoId)
                    {{-- Embed langsung via iframe TikTok --}}
                    <iframe
                        src="https://www.tiktok.com/player/v1/{{ $videoId }}?music_info=0&description=0"
                        class="tt-player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                    @else
                    {{-- Fallback: thumbnail + link jika URL tidak valid --}}
                    <a href="{{ $tt->video_url }}" target="_blank" class="tt-fallback">
                        @if($tt->thumbnail)
                        <img src="{{ asset('storage/'.$tt->thumbnail) }}" alt="{{ $tt->title }}">
                        @else
                        <div class="tt-placeholder">
                            <i class="bi bi-tiktok"></i>
                        </div>
                        @endif
                        <div class="tt-fallback-play">
                            <i class="bi bi-play-fill"></i>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-tiktok" style="font-size: 5rem; color: #ddd;"></i>
                <p class="text-muted mt-3">Belum ada konten TikTok yang tersedia</p>
            </div>
            @endforelse
        </div>

        @if($tiktoks->count() && $about?->tiktok)
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ $about->tiktok }}" target="_blank" class="btn btn-warning btn-lg">
                Lihat Lebih Banyak <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        @endif
    </div>
</section>

@push('styles')
<style>
/* ===== TikTok Embed Card ===== */
.tt-embed-card {
    border-radius: 16px;
    overflow: hidden;
    background: #000;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    aspect-ratio: 9 / 16;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.tt-embed-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.2);
}

/* Iframe player — full card */
.tt-player {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
}

/* Fallback: thumbnail + play button */
.tt-fallback {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    text-decoration: none;
}
.tt-fallback img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.tt-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: rgba(255,255,255,0.15);
}
.tt-fallback-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.95);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: #1a1a1a;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    transition: transform 0.3s;
}
.tt-fallback:hover .tt-fallback-play {
    transform: translate(-50%, -50%) scale(1.15);
}
</style>
@endpush
@endsection