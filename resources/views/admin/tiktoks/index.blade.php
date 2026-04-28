@extends('admin.layouts.app')
@section('title', 'TikTok')
@section('page-title', 'Manajemen TikTok')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Konten TikTok</h5>
        <a href="{{ route('admin.tiktoks.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-lg"></i> Tambah Video
        </a>
    </div>
    <div class="card-body">
        @if($tiktoks->count())
        <div class="row g-3">
            @foreach($tiktoks as $tt)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="tt-admin-card">
                    {{-- Video preview --}}
                    <div class="tt-admin-preview">
                        @php preg_match('/video\/(\d+)/', $tt->video_url ?? '', $m); @endphp
                        @if(!empty($m[1]))
                        <iframe src="https://www.tiktok.com/player/v1/{{ $m[1] }}?music_info=0&description=0"
                            style="width:100%;height:100%;border:none;" allowfullscreen loading="lazy"></iframe>
                        @else
                        <div class="tt-admin-nothumb">
                            <i class="bi bi-tiktok"></i>
                            <small>No video ID</small>
                        </div>
                        @endif
                        <div class="tt-admin-badge">
                            @if($tt->is_active)
                            <span class="badge badge-approved">Aktif</span>
                            @else
                            <span class="badge badge-rejected">Nonaktif</span>
                            @endif
                        </div>
                        <div class="tt-admin-order">#{{ $tt->order }}</div>
                    </div>

                    {{-- Info & actions --}}
                    <div class="tt-admin-body">
                        <h6>{{ Str::limit($tt->title, 35) }}</h6>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.tiktoks.edit', $tt) }}" class="btn btn-sm btn-warning flex-fill">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.tiktoks.destroy', $tt) }}" method="POST" class="flex-fill">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100 btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $tiktoks->links() }}</div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-tiktok" style="font-size: 4rem; color: #ddd;"></i>
            <p class="text-muted mt-3">Belum ada konten TikTok.</p>
            <a href="{{ route('admin.tiktoks.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-lg"></i> Tambah Video Pertama
            </a>
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
.tt-admin-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 2px 15px rgba(0,0,0,0.06);
    transition: all 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.tt-admin-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.tt-admin-preview {
    position: relative;
    aspect-ratio: 9/16;
    background: #000;
    overflow: hidden;
}
.tt-admin-nothumb {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.2);
    gap: 6px;
}
.tt-admin-nothumb i { font-size: 2.5rem; }
.tt-admin-nothumb small { font-size: 0.75rem; }
.tt-admin-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 2;
}
.tt-admin-order {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0,0,0,0.6);
    color: #FFC107;
    padding: 2px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 700;
    z-index: 2;
}
.tt-admin-body {
    padding: 14px;
}
.tt-admin-body h6 {
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 10px;
}
</style>
@endpush
@endsection