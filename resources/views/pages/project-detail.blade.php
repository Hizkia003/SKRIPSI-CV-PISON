@extends('layouts.app')
@section('title', 'Detail Projects - ' . $project->title)

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 data-aos="fade-up">Detail Projects</h1>
            <nav data-aos="fade-up" data-aos-delay="100">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/projects') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Detail Projects</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Left: Galeri Utama + Thumbnail -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="main-image mb-4">
                        <img src="{{ $project->thumbnail ? asset('storage/' . $project->thumbnail) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800' }}"
                            alt="{{ $project->title }}" class="img-fluid rounded-4 w-100">
                    </div>

                    @if($project->images->count())
                        <div class="gallery-thumbs">
                            <h5 class="mb-3">Galeri Proyek</h5>
                            <div class="row g-2">
                                @foreach($project->images as $img)
                                    <div class="col-3 col-md-2">
                                        <a href="{{ asset('storage/' . $img->image) }}" data-lightbox="project-gallery"
                                            data-title="{{ $project->title }}">
                                            <img src="{{ asset('storage/' . $img->image) }}" class="img-fluid rounded-3"
                                                style="height: 80px; object-fit: cover;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right: Info Proyek -->
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="project-detail-info bg-white p-4 rounded-4 shadow-sm">
                        <h2 class="fw-bold mb-3">{{ $project->title }}</h2>
                        <p class="text-muted"><i class="bi bi-tag-fill me-2"></i> Kategori:
                            <strong>{{ $project->category_label }}</strong>
                        </p>
                        @if($project->location)
                            <p class="text-muted"><i class="bi bi-geo-alt-fill me-2"></i> Lokasi: {{ $project->location }}</p>
                        @endif

                        {{-- DESKRIPSI PROYEK --}}
                        <div class="mt-3 description-wrapper">
                            <h5>Deskripsi Proyek</h5>
                            <p class="text-secondary project-description">
                                {{ $project->description ?: 'Belum ada deskripsi untuk proyek ini.' }}
                            </p>
                        </div>

                        <div class="mt-4">
                            <a href="{{ url('/contact') }}" class="btn btn-warning w-100">
                                <i class="bi bi-chat-dots-fill me-2"></i> Konsultasi Proyek Serupa
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if($relatedProjects->count())
                <div class="mt-5 pt-4">
                    <h3 class="text-center mb-4">Proyek Terkait</h3>
                    <div class="row g-4">
                        @foreach($relatedProjects as $rp)
                            <div class="col-md-4">
                                <div class="project-card h-100">
                                    <div class="project-image">
                                        <img src="{{ $rp->thumbnail ? asset('storage/' . $rp->thumbnail) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600' }}"
                                            alt="{{ $rp->title }}">
                                    </div>
                                    <div class="project-info">
                                        <span class="project-category">{{ $rp->category_label }}</span>
                                        <h5>{{ $rp->title }}</h5>
                                        <a href="{{ route('projects.show', $rp->slug) }}"
                                            class="btn btn-sm btn-outline-warning mt-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
    <style>
        .description-wrapper {
            max-width: 100%;
            overflow-x: auto;
        }
        .project-description {
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            max-width: 100%;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "Gambar %1 dari %2"
        });
    </script>
@endpush