@extends('layouts.app')
@section('title', 'Projects')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Portfolio Proyek</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-subtitle">PORTFOLIO KAMI</span>
                <h2 class="section-title">Proyek <span class="text-warning">Terbaik</span> Kami</h2>
                <p class="section-desc">Beberapa proyek yang telah kami selesaikan dengan sukses</p>
            </div>

            <div class="project-filter text-center mb-5" data-aos="fade-up">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="atap-dinding-lisplang">Atap, Dinding & Lisplang</button>
                <button class="filter-btn" data-filter="talang-skylight">Talang & Skylight</button>
                <button class="filter-btn" data-filter="safetyline-railing">Safetyline & Railing</button>
                <button class="filter-btn" data-filter="konstruksi">Konstruksi</button>
                <button class="filter-btn" data-filter="insulasi">Insulasi</button>
            </div>

            <div class="row g-4 project-grid">
                @forelse($projects as $i => $p)
                    <div class="col-lg-4 col-md-6 project-item" data-category="{{ $p->category }}" data-aos="zoom-in"
                        data-aos-delay="{{ ($i % 3) * 100 }}">
                        <a href="{{ route('projects.show', $p->slug) }}" class="text-decoration-none text-dark">
                            <div class="project-card">
                                <div class="project-image">
                                    <img src="{{ $p->thumbnail ? asset('storage/' . $p->thumbnail) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600' }}"
                                        alt="{{ $p->title }}">
                                </div>
                                <div class="project-info">
                                    <span class="project-category">{{ $p->category_label }}</span>
                                    <h5>{{ $p->title }}</h5>
                                    @if($p->location)
                                        <p class="project-location"><i class="bi bi-geo-alt-fill"></i> {{ $p->location }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-folder2-open" style="font-size: 4rem; color: #ddd;"></i>
                        <p class="text-muted mt-3">Belum ada proyek yang tersedia</p>
                    </div>
                @endforelse
            </div>

            @if(method_exists($projects, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection