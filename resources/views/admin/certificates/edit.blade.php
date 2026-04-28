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
                        <label class="form-label">Sub Nama Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" name="subtitle" class="form-control"
                            value="{{ old('subtitle', $certificate->subtitle) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Sertifikat</label>
                        @if($certificate->image && \Storage::disk('public')->exists($certificate->image))
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$certificate->image) }}" class="img-preview"
                                style="max-height:200px">
                            <small class="d-block text-muted mt-1">Foto saat ini (upload baru jika ingin
                                mengganti)</small>
                        </div>
                        @endif
                        <input type="file" name="image" class="form-control image-input" data-preview="#imagePreview"
                            accept="image/*">
                        <small class="form-text">Format: JPG/PNG/WEBP, Max 3MB</small>
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
                        <input type="number" name="order" class="form-control"
                            value="{{ old('order', $certificate->order) }}" min="0">
                        <small class="form-text">Semakin kecil, semakin atas</small>
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