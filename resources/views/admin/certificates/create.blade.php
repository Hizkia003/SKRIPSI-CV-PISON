@extends('admin.layouts.app')
@section('title', 'Tambah Sertifikat')
@section('page-title', 'Tambah Sertifikat Baru')
@section('page-subtitle', 'Upload sertifikat perusahaan')

@section('content')
<form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-patch-check-fill"></i>Informasi Sertifikat</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Contoh: ISO 9001:2015" required>
                        <small class="form-text">Nama utama sertifikat</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sub Nama Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}"
                            placeholder="Contoh: Sistem Manajemen Mutu" required>
                        <small class="form-text">Keterangan / deskripsi singkat sertifikat</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Sertifikat <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control image-input" data-preview="#imagePreview"
                            accept="image/*" required>
                        <small class="form-text">Format: JPG/PNG/WEBP, Max 3MB. Rekomendasi: 800x600px</small>
                        <img id="imagePreview" src="" class="img-preview mt-2" style="display:none">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-gear-fill"></i>Pengaturan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                        <small class="form-text">Semakin kecil, semakin atas</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_active" class="form-check-input" id="isActive" checked>
                            <label class="form-check-label" for="isActive">Aktif (ditampilkan di website)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex gap-2">
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary flex-fill">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning flex-fill">
                        <i class="bi bi-check-lg"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection