@extends('admin.layouts.app')
@section('title', 'Konten Home')
@section('page-title', 'Edit Konten Home')
@section('page-subtitle', 'Kelola statistik dan deskripsi di halaman Home')

@section('content')
<form action="{{ route('admin.site-contents.update') }}" method="POST">
    @csrf @method('PUT')

    {{-- STATISTIK --}}
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-bar-chart-fill"></i>Statistik Home</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">🏗️ Proyek Selesai <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" name="total_projects" class="form-control"
                            value="{{ old('total_projects', $content->total_projects) }}" min="0" max="99999" required>
                        <span class="input-group-text">+</span>
                    </div>
                    <small class="form-text">Jumlah proyek yang telah diselesaikan</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">📅 Tahun Pengalaman <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" name="experience_years" class="form-control"
                            value="{{ old('experience_years', $content->experience_years) }}" min="0" max="100"
                            required>
                        <span class="input-group-text">Tahun</span>
                    </div>
                    <small class="form-text">Berapa lama perusahaan beroperasi</small>
                </div>

                <div class="col-12">
                    <div class="alert alert-info mb-0" style="font-size: 0.82rem;">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Preview:</strong>
                            <strong>{{ $content->total_projects ?? 500 }}+</strong> Proyek Selesai •
                            <strong>{{ $content->experience_years ?? 15 }}+</strong> Tahun Pengalaman
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DESKRIPSI HOME --}}
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-house-heart-fill"></i>Deskripsi Home (Hero Section)</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Deskripsi Perusahaan <span class="text-danger">*</span></label>
                <textarea name="home_description" rows="5" class="form-control" maxlength="500" required id="descField"
                    oninput="updateCount()">{{ old('home_description', $content->home_description) }}</textarea>
                <div class="d-flex justify-content-between mt-2">
                    <small class="form-text">Muncul di Hero Section halaman Home (di bawah judul utama)</small>
                    <small class="text-muted"><span
                            id="descCount">{{ strlen($content->home_description ?? '') }}</span>/500 karakter</small>
                </div>
            </div>

            <div class="alert alert-warning mb-0" style="font-size: 0.82rem;">
                <i class="bi bi-lightbulb-fill"></i>
                <div>
                    <strong>Tips:</strong> Buat deskripsi singkat, jelas, dan menarik (1-2 kalimat).
                    Ini adalah kesan pertama pengunjung website!
                </div>
            </div>
        </div>
    </div>

    {{-- INFO FOOTER --}}
    <div class="card" style="background: linear-gradient(135deg, #E3F2FD, #F5F9FF); border-color: #2196F3;">
        <div class="card-body">
            <div class="d-flex align-items-start gap-3">
                <div style="font-size: 2rem; color: #1976D2;">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="flex-fill">
                    <h6 class="mb-2" style="color: #0D47A1;">ℹ️ Informasi</h6>
                    <p class="mb-2" style="font-size: 0.88rem; color: #1565C0;">
                        Halaman ini hanya mengatur konten <strong>Home Page</strong>.
                    </p>
                    <p class="mb-0" style="font-size: 0.85rem; color: #1976D2;">
                        Untuk mengatur <strong>Footer</strong> (kontak, alamat, sosmed, copyright),
                        silakan kunjungi menu
                        <a href="{{ route('admin.footer.edit') }}" class="fw-bold text-decoration-underline">🦶
                            Footer</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ACTION BUTTONS --}}
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
            <small class="text-muted">
                <i class="bi bi-info-circle"></i>
                Perubahan akan langsung terlihat di halaman Home setelah disimpan
            </small>
            <div class="d-flex gap-2">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-dark">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Website
                </a>
                <button type="submit" class="btn btn-warning btn-lg">
                    <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
function updateCount() {
    const textarea = document.getElementById('descField');
    const counter = document.getElementById('descCount');
    if (textarea && counter) {
        counter.textContent = textarea.value.length;
        if (textarea.value.length > 450) {
            counter.style.color = '#dc3545';
            counter.style.fontWeight = '700';
        } else if (textarea.value.length > 400) {
            counter.style.color = '#f59e0b';
            counter.style.fontWeight = '600';
        } else {
            counter.style.color = '';
            counter.style.fontWeight = '';
        }
    }
}
</script>
@endpush

@endsection