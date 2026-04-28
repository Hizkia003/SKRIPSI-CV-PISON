@extends('admin.layouts.app')
@section('title', 'Edit Tentang Kami')
@section('page-title', 'Tentang Kami')

@section('content')
<form action="{{ route('admin.about.update') }}" method="POST">
    @csrf @method('PUT')
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Informasi Perusahaan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Perusahaan *</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name', $about->company_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi *</label>
                        <textarea name="description" rows="5" class="form-control"
                            required>{{ old('description', $about->description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-warning w-100 btn-lg">
                        <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection