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
    <div class="col-xl-3 col-md-6">
        <div class="stat-box">
            <div class="stat-box-icon icon-info"><i class="bi bi-gear-fill"></i></div>
            <div class="stat-box-body">
                <h3>{{ $stats['services'] }}</h3>
                <p>Layanan Aktif</p>
                <small class="stat-note">Tersedia di website</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-box">
            <div class="stat-box-icon icon-danger"><i class="bi bi-envelope-fill"></i></div>
            <div class="stat-box-body">
                <h3>{{ $stats['contacts'] }}</h3>
                <p>Pesan Masuk</p>
                <small class="stat-note text-danger">{{ $stats['unread_contacts'] }} belum dibaca</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-box">
            <div class="stat-box-icon icon-dark"><i class="bi bi-tiktok"></i></div>
            <div class="stat-box-body">
                <h3>{{ $stats['tiktoks'] ?? 0 }}</h3>
                <p>Konten TikTok</p>
                <small class="stat-note">Video terpublikasi</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-box">
            <div class="stat-box-icon icon-success"><i class="bi bi-patch-check-fill"></i></div>
            <div class="stat-box-body">
                <h3>{{ $stats['certificates'] ?? 0 }}</h3>
                <p>Sertifikat</p>
                <small class="stat-note">Legalitas perusahaan</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-envelope-fill"></i>Pesan Terbaru</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-dark">Lihat Semua <i
                        class="bi bi-arrow-right"></i></a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Pengirim</th>
                                <th>Waktu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestContacts as $c)
                            <tr>
                                <td>
                                    <strong>{{ $c->name }}</strong>
                                    @if(!$c->is_read)<span class="badge badge-new ms-1">BARU</span>@endif
                                    <br><small class="text-muted">{{ $c->contact }}</small>
                                </td>
                                <td><small>{{ $c->created_at->diffForHumans() }}</small></td>
                                <td><a href="{{ route('admin.contacts.show', $c->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="bi bi-eye"></i></a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="empty-state" style="padding:30px"><i class="bi bi-inbox"></i>
                                        <p>Belum ada pesan</p>
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-buildings-fill"></i>Proyek Terbaru</h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-dark">Lihat Semua <i
                        class="bi bi-arrow-right"></i></a>
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
                                <td><strong>{{ $p->title }}</strong><br><small class="text-muted"><i
                                            class="bi bi-geo-alt"></i> {{ $p->location }}</small></td>
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