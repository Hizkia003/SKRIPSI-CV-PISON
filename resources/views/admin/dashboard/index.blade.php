@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview & statistik website')

@section('content')

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <h4>Selamat datang, {{ auth()->user()->name }}! 👋</h4>
        <p>Kelola seluruh konten website CV. Pison Teknik Indonesia dari satu tempat.</p>
        <i class="bi bi-speedometer2 banner-icon"></i>
    </div>

    <!-- Stats Grid -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-box">
                <div class="stat-box-icon"><i class="bi bi-buildings-fill"></i></div>
                <div class="stat-box-body">
                    <h3>{{ $stats['projects'] }}</h3>
                    <p>Total Proyek</p>
                    <small class="stat-note">Semua proyek terdaftar</small>
                </div>
            </div>
        </div>
        {{-- HAPUS widget Contacts / Pesan Masuk --}}
        {{-- <div class="col-xl-3 col-md-6"> ... </div> --}}

        <div class="col-xl-3 col-md-6">
            <div class="stat-box">
                <div class="stat-box-icon icon-success"><i class="bi bi-patch-check-fill"></i></div>
                <div class="stat-box-body">
                    <h3>{{ $stats['certificates'] ?? 0 }}</h3>
                    <p>Sertifikat</p>
                    <small class="stat-note">Legalitas: {{ $stats['legalitas_count'] ?? 0 }}, Pekerja: {{ $stats['worker_cert_count'] ?? 0 }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        {{-- HAPUS widget Pesan Terbaru (Contact) --}}
        {{-- <div class="col-lg-6"> ... </div> --}}

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-buildings-fill"></i>Proyek Terbaru</h5>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-dark">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestProjects as $p)
                                    <tr>
                                        <td><strong>{{ $p->title }}</strong><br><small class="text-muted"><i class="bi bi-geo-alt"></i> {{ $p->location }}</small></td>
                                        <td><span class="badge badge-warning">{{ ucfirst($p->category) }}</span></td>
                                        <td>{{ $p->year }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="empty-state" style="padding:30px"><i class="bi bi-buildings"></i>
                                                <p>Belum ada proyek</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection