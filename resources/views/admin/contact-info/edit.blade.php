@extends('admin.layouts.app')
@section('title', 'Info Kontak Perusahaan')
@section('page-title', 'Info Kontak')
@section('page-subtitle', 'Kelola informasi kontak yang muncul di halaman kontak dan footer')

@section('content')
    <form action="{{ route('admin.contact-info.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-telephone-fill"></i> Informasi Kontak</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name', $contactInfo->company_name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">WhatsApp</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" name="whatsapp" class="form-control"
                                value="{{ old('whatsapp', $contactInfo->whatsapp) }}" placeholder="81234567890">
                        </div>
                        <small class="form-text">Masukkan nomor tanpa 0 atau +62</small>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="address" rows="2"
                            class="form-control">{{ old('address', $contactInfo->address) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $contactInfo->email) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam Operasional</label>
                        <input type="text" name="working_hours" class="form-control"
                            value="{{ old('working_hours', $contactInfo->working_hours) }}"
                            placeholder="Senin - Sabtu: 08:00 - 17:00">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Google Maps Embed URL</label>
                        <textarea name="map_embed" rows="2" class="form-control"
                            placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed', $contactInfo->map_embed) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">TikTok URL</label>
                        <input type="url" name="tiktok" class="form-control"
                            value="{{ old('tiktok', $contactInfo->tiktok) }}" placeholder="https://tiktok.com/@username">
                    </div>
                    {{-- HAPUS field copyright_text --}}
                    {{-- <div class="col-md-6">
                        <label class="form-label">Teks Copyright</label>
                        <input type="text" name="copyright_text" class="form-control"
                            value="{{ old('copyright_text', $contactInfo->copyright_text) }}"
                            placeholder="© 2024 Nama Perusahaan. All Rights Reserved.">
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <small class="text-muted">Data ini akan tampil di halaman Kontak dan Footer website.</small>
                <button type="submit" class="btn btn-warning btn-lg">Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection