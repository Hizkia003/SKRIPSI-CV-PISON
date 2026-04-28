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
            <p class="section-desc">Kami menyediakan berbagai material berkualitas tinggi untuk kebutuhan konstruksi Anda</p>
        </div>

        @forelse($materials as $i => $m)
        <div class="sm-section" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
            <div class="sm-layout">
                {{-- Kiri: Nomor + Ikon + Nama Material --}}
                <div class="sm-left">
                    <span class="sm-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="sm-icon-wrap">
                        <i class="bi {{ $m->icon ?? 'bi-box-seam' }}"></i>
                    </div>
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
/* ==========================================================
   SUPPLY MATERIAL — Edge-Aligned Two-Column Layout (Revisi)
   
   Strategi spacing:
   ┌──────────────────────────────────────────────────────┐
   │ 48px │  NAMA MATERIAL  │  gap  │  DESKRIPSI  │ 48px │
   │ pad  │  (30%, min 240) │ clamp │  (1fr sisa) │ pad  │
   └──────────────────────────────────────────────────────┘
   
   1. Padding horizontal 48px → konten cukup dekat ke tepi
      card tapi masih ada ruang nafas yang proporsional
   2. Kolom kiri 30% (min 240px) → proporsi lebih besar
      sehingga nama material punya ruang yang memadai
   3. Gap clamp(48px, 5vw, 90px) → jarak antar kolom
      responsif, tidak terlalu sempit & tidak berlebihan
   4. justify-self: start / end → masing-masing kolom
      menempel ke sisi kiri & kanan card (edge-aligned)
   ========================================================== */

/* ---------- Card Wrapper ---------- */
.sm-section {
    margin-bottom: 28px;
}

.sm-layout {
    display: grid;
    /* Kolom kiri 420px → mendorong deskripsi lebih ke kanan */
    grid-template-columns: 420px 1fr;
    gap: 96px;
    background: #fff;
    border-radius: 20px;
    padding: 48px 56px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
    border-left: 5px solid #FFC107;
    transition: box-shadow 0.35s ease, border-color 0.35s ease, transform 0.35s ease;
    align-items: center;
}

.sm-layout:hover {
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10);
    border-left-color: #FF9800;
    transform: translateY(-3px);
}

/* ---------- Kolom Kiri : Nomor + Ikon + Nama ---------- */
.sm-left {
    display: flex;
    flex-direction: column;
    /* Konten menempel ke sisi kiri card (edge-aligned) */
    align-items: flex-start;
    justify-self: start;
}

.sm-number {
    font-size: 3.6rem;
    font-weight: 900;
    color: #E5A800;
    -webkit-text-fill-color: #E5A800;
    background: none;
    -webkit-background-clip: unset;
    background-clip: unset;
    line-height: 1;
    margin-bottom: 6px;
    letter-spacing: -2px;
    position: relative;
    text-shadow: 0 2px 8px rgba(229, 168, 0, 0.18);
}

.sm-number::after {
    content: '';
    display: block;
    width: 36px;
    height: 3px;
    background: linear-gradient(90deg, #FFC107, #FF9800);
    border-radius: 2px;
    margin-top: 8px;
}

.sm-icon-wrap {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, #FFF8E1, #FFECB3);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.sm-layout:hover .sm-icon-wrap {
    transform: scale(1.08);
    box-shadow: 0 4px 16px rgba(255,193,7,0.18);
}

.sm-icon-wrap i {
    font-size: 1.35rem;
    color: #F57F17;
}

.sm-left h3 {
    font-weight: 700;
    font-size: 1.3rem;
    color: #1a1a1a;
    margin: 0;
    line-height: 1.35;
}

/* ---------- Kolom Kanan : Deskripsi ---------- */
.sm-right {
    min-width: 0;
    /*
     * justify-self: stretch → kolom kanan mengisi
     * seluruh ruang grid-nya sampai ke padding kanan card,
     * menghasilkan efek edge-aligned di sisi kanan
     */
    justify-self: stretch;
    /* Teks rata kanan-kiri agar terlihat rapi di kolom lebar */
    text-align: justify;
}

.sm-desc {
    color: #555;
    line-height: 1.85;
    font-size: 0.95rem;
    margin: 0 0 16px 0;
    word-break: break-word;
}

.sm-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #F57F17;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    transition: gap 0.3s ease, color 0.3s ease;
}

.sm-link:hover {
    gap: 12px;
    color: #E65100;
}

.sm-link i {
    font-size: 0.9rem;
    transition: transform 0.3s ease;
}

.sm-link:hover i {
    transform: translateX(2px);
}

/* ==========================================================
   RESPONSIVE BREAKPOINTS
   
   Strategi:
   ─────────────────────────────────────────────────────────
   ≥1200px : kolom kiri 30% (≈300px), gap ≈80px, pad 48px
             → layout paling lega, edge-aligned sempurna
   
   1024–1199px : kolom kiri 28% (≈260px), gap ≈60px, pad 40px
                 → sedikit lebih kompak, tetap proporsional
   
   768–1023px : kolom kiri fixed 220px, gap ≈44px, pad 32px
                → tablet landscape, spacing lebih ketat
   
   <768px : stack vertikal (1 kolom), gap 16px, pad 24px
            → mobile, layout berubah ke vertikal
   ─────────────────────────────────────────────────────────
   
   clamp() pada gap otomatis menyesuaikan di tiap breakpoint,
   override hanya diperlukan untuk grid-columns & padding
   ========================================================== */

/* ---------- Desktop kecil / Laptop ---------- */
@media (max-width: 1199px) {
    .sm-layout {
        grid-template-columns: 280px 1fr;
        gap: 48px;
        padding: 40px 44px;
    }
}

/* ---------- Tablet Landscape ---------- */
@media (max-width: 1023px) {
    .sm-layout {
        grid-template-columns: 220px 1fr;
        gap: 36px;
        padding: 32px 32px;
    }
}

/* ---------- Mobile / Tablet Portrait ---------- */
@media (max-width: 767px) {
    .sm-layout {
        grid-template-columns: 1fr;
        gap: 16px;
        padding: 24px 22px;
        border-left-width: 4px;
    }
    .sm-left {
        flex-direction: row;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .sm-number {
        font-size: 2.2rem;
        margin-bottom: 0;
    }
    .sm-number::after {
        display: none;
    }
    .sm-icon-wrap {
        width: 42px;
        height: 42px;
        margin-bottom: 0;
    }
    .sm-left h3 {
        font-size: 1.15rem;
        flex: 1;
        min-width: 120px;
    }
    .sm-right {
        text-align: left;
    }
}</style>
@endpush
@endsection

