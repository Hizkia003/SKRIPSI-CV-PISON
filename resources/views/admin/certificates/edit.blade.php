@extends('admin.layouts.app')
@section('title', 'Edit Sertifikat')
@section('page-title', 'Edit Sertifikat')
@section('page-subtitle', 'Perbarui informasi sertifikat')

@section('content')
<form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-patch-check-fill"></i>Informasi Sertifikat</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $certificate->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor/ID</label>
                        <input type="text" name="number" class="form-control"
                            value="{{ old('number', $certificate->number) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="company_legalitas" {{ old('category', $certificate->category) === 'company_legalitas' ? 'selected' : '' }}>
                                Legalitas Perusahaan
                            </option>
                            <option value="worker_certificate" {{ old('category', $certificate->category) === 'worker_certificate' ? 'selected' : '' }}>
                                Sertifikat Pekerja
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Dokumen (PDF)</label>
                        @if($certificate->file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/'.$certificate->file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-file-pdf"></i> Lihat PDF Saat Ini
                                </a>
                                <small class="d-block text-muted mt-1">Upload baru jika ingin mengganti</small>
                            </div>
                        @endif
                        <input type="file" name="file" class="form-control" accept=".pdf">
                        <small class="form-text">Hanya file PDF, max 10MB</small>
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
                        <input type="number" name="order" class="form-control"
                            value="{{ old('order', $certificate->order) }}" min="0">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
                                {{ $certificate->is_active ? 'checked' : '' }}>
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
                        <i class="bi bi-check-lg"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection