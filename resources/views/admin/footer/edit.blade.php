@extends('admin.layouts.app')
@section('title', 'Pengaturan Footer')
@section('page-title', 'Pengaturan Footer')
@section('page-subtitle', 'Kelola konten dan informasi di footer website')

@section('content')
<form action="{{ route('admin.footer.update') }}" method="POST">
    @csrf @method('PUT')

    {{-- TAB NAVIGATION --}}
    <ul class="nav nav-pills mb-4" id="footerTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-brand" type="button">
                <i class="bi bi-building-gear me-1"></i> Brand & Deskripsi
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-contact" type="button">
                <i class="bi bi-telephone-fill me-1"></i> Info Kontak
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-social" type="button">
                <i class="bi bi-tiktok me-1"></i> Sosial Media
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-copyright" type="button">
                <i class="bi bi-c-circle me-1"></i> Copyright
            </button>
        </li>
    </ul>

    <div class="tab-content">

        {{-- TAB 1: BRAND & DESKRIPSI --}}
        <div class="tab-pane fade show active" id="tab-brand">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-building-gear"></i>Brand & Deskripsi Footer</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Brand <span class="text-danger">*</span></label>
                            <input type="text" name="brand_name" class="form-control"
                                value="{{ old('brand_name', $footer->brand_name) }}" required>
                            <small class="form-text">Muncul sebagai judul besar di footer</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tagline Brand <span class="text-danger">*</span></label>
                            <input type="text" name="brand_tagline" class="form-control"
                                value="{{ old('brand_tagline', $footer->brand_tagline) }}" required>
                            <small class="form-text">Tagline kecil di bawah nama brand</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deskripsi Perusahaan <span class="text-danger">*</span></label>
                            <textarea name="description" rows="5" class="form-control" maxlength="500" required
                                id="descField"
                                oninput="updateCount()">{{ old('description', $footer->description) }}</textarea>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="form-text">Deskripsi singkat perusahaan di footer</small>
                                <small class="text-muted"><span
                                        id="descCount">{{ strlen($footer->description ?? '') }}</span>/500
                                    karakter</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 2: INFO KONTAK --}}
        <div class="tab-pane fade" id="tab-contact">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-telephone-fill"></i>Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" style="font-size: 0.85rem;">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>Informasi ini akan muncul di kolom "Kontak Kami" pada footer.</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" name="company_name" class="form-control"
                                value="{{ old('company_name', $footer->company_name) }}" required>
                            <small class="form-text">Nama resmi perusahaan</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-geo-alt-fill text-warning"></i> Alamat</label>
                            <textarea name="address" rows="2" class="form-control"
                                placeholder="Jl. Industri Raya No. 123, Jakarta Timur">{{ old('address', $footer->address) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-whatsapp text-warning"></i> WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#1a1a1a; color:#FFC107; font-weight:700; border-color:#333;">+62</span>
                                <input type="text" name="whatsapp" class="form-control" id="waInput"
                                    value="{{ old('whatsapp', $footer->whatsapp) }}"
                                    placeholder="81234567890" pattern="[0-9]*" inputmode="numeric"
                                    maxlength="13">
                            </div>
                            <small class="form-text">Masukkan nomor tanpa 0 di depan. Contoh: 81234567890</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-envelope-fill text-warning"></i> Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $footer->email) }}" placeholder="info@pisonteknik.co.id">
                        </div>

                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-clock-fill text-warning"></i> Jam Kerja</label>
                            <input type="text" name="working_hours" class="form-control"
                                value="{{ old('working_hours', $footer->working_hours) }}"
                                placeholder="Senin - Sabtu: 08:00 - 17:00 WIB">
                        </div>

                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-map-fill text-warning"></i> Google Maps Embed URL</label>
                            <textarea name="map_embed" rows="2" class="form-control"
                                placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed', $footer->map_embed) }}</textarea>
                            <small class="form-text">Buka Google Maps → Share → Embed → salin URL dari src="..."</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 3: SOSIAL MEDIA --}}
        <div class="tab-pane fade" id="tab-social">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-tiktok"></i>Sosial Media</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" style="font-size: 0.85rem;">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Catatan:</strong> Kosongkan field jika tidak punya akun.
                            Icon TikTok hanya akan muncul di footer jika link diisi.
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">
                                <i class="bi bi-tiktok" style="font-size: 1.1rem;"></i>
                                <strong>TikTok</strong>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                <input type="url" name="tiktok" class="form-control"
                                    value="{{ old('tiktok', $footer->tiktok) }}"
                                    placeholder="https://tiktok.com/@username">
                            </div>
                            <small class="form-text">Masukkan URL lengkap akun TikTok perusahaan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 4: COPYRIGHT --}}
        <div class="tab-pane fade" id="tab-copyright">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-c-circle"></i>Teks Copyright</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Teks Copyright</label>
                        <input type="text" name="copyright_text" class="form-control"
                            value="{{ old('copyright_text', $footer->copyright_text) }}"
                            placeholder="© 2024 PISON TEKNIK INDONESIA. All Rights Reserved.">
                        <small class="form-text">Tampil di bagian paling bawah footer</small>
                    </div>

                    <div class="alert alert-warning mb-0" style="font-size: 0.85rem;">
                        <i class="bi bi-lightbulb-fill"></i>
                        <div>
                            <strong>Tips:</strong> Kosongkan field untuk menggunakan format default otomatis:
                            <code>© {tahun saat ini} NAMA_PERUSAHAAN. All Rights Reserved.</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PREVIEW FOOTER --}}
    <div class="card mt-3">
        <div class="card-header">
            <h5><i class="bi bi-eye-fill"></i>Preview Footer</h5>
        </div>
        <div class="card-body p-0">
            <div class="footer-preview">
                <div class="footer-preview-container">
                    {{-- Kolom Brand --}}
                    <div class="fp-col fp-brand-col">
                        <div class="fp-brand-box">
                            <div class="fp-icon"><i class="bi bi-building-gear"></i></div>
                            <div>
                                <div class="fp-brand-name" id="previewBrandName">{{ $footer->brand_name }}</div>
                                <div class="fp-brand-tag" id="previewBrandTag">{{ $footer->brand_tagline }}</div>
                            </div>
                        </div>
                        <p class="fp-desc" id="previewDesc">{{ $footer->description }}</p>
                        <div class="fp-social">
                            @if($footer->tiktok)
                            <a><i class="bi bi-tiktok"></i></a>
                            @endif
                        </div>
                    </div>

                    {{-- Kolom Tautan --}}
                    <div class="fp-col">
                        <h6 class="fp-title">Tautan Cepat</h6>
                        <ul class="fp-links">
                            <li>› Home</li>
                            <li>› Tentang</li>
                            <li>› Layanan</li>
                            <li>› Proyek</li>
                            <li>› Sertifikat</li>
                            <li>› Kontak</li>
                        </ul>
                    </div>

                    {{-- Kolom Layanan --}}
                    <div class="fp-col">
                        <h6 class="fp-title">Layanan Kami</h6>
                        <ul class="fp-links">
                            <li>› Konstruksi Gedung</li>
                            <li>› Renovasi & Interior</li>
                            <li>› Instalasi Industri</li>
                            <li>› Konsultasi Teknik</li>
                            <li>› Maintenance</li>
                        </ul>
                    </div>

                    {{-- Kolom Kontak --}}
                    <div class="fp-col">
                        <h6 class="fp-title">Kontak</h6>
                        <ul class="fp-contact">
                            @if($footer->address)<li><i class="bi bi-geo-alt-fill"></i>
                                <span>{{ $footer->address }}</span></li>@endif
                            @if($footer->whatsapp)<li><i class="bi bi-whatsapp"></i> {{ $footer->whatsapp_display }}</li>@endif
                            @if($footer->email)<li><i class="bi bi-envelope-fill"></i> {{ $footer->email }}</li>@endif
                            @if($footer->working_hours)<li><i class="bi bi-clock-fill"></i> {{ $footer->working_hours }}
                            </li>@endif
                        </ul>
                    </div>
                </div>
                <div class="fp-copyright">
                    {{ $footer->copyright_text ?? '© '.date('Y').' '.$footer->company_name.'. All Rights Reserved.' }}
                </div>
            </div>
        </div>
    </div>

    {{-- ACTION BUTTONS --}}
    <div class="card mt-3">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
            <small class="text-muted">
                <i class="bi bi-info-circle"></i>
                Perubahan akan langsung terlihat di footer website setelah disimpan
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

@push('styles')
<style>
/* Tab Pills Style */
.nav-pills .nav-link {
    background: #fff;
    color: #64748b;
    border: 1.5px solid #e2e8f0;
    padding: 10px 18px;
    margin-right: 6px;
    border-radius: 10px;
    font-weight: 500;
    font-size: 0.88rem;
    transition: all 0.2s;
}

.nav-pills .nav-link:hover {
    border-color: #FFC107;
    color: #1a1a1a;
    background: #FFF8E1;
}

.nav-pills .nav-link.active {
    background: #FFC107;
    color: #1a1a1a;
    border-color: #FFC107;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
}

/* Footer Preview */
.footer-preview {
    background: linear-gradient(135deg, #0F172A, #1E293B);
    color: #CBD5E1;
    padding: 40px 30px 0;
    border-radius: 0 0 12px 12px;
}

.footer-preview-container {
    display: grid;
    grid-template-columns: 2fr 1fr 1.2fr 1.5fr;
    gap: 25px;
    margin-bottom: 30px;
}

.fp-brand-box {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.fp-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #FFC107, #FFA000);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a1a1a;
    font-size: 1.2rem;
}

.fp-brand-name {
    color: #fff;
    font-weight: 800;
    font-size: 1rem;
    line-height: 1;
}

.fp-brand-tag {
    color: #FFC107;
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.fp-desc {
    color: #94A3B8;
    font-size: 0.8rem;
    line-height: 1.6;
    margin-bottom: 12px;
}

.fp-social {
    display: flex;
    gap: 8px;
}

.fp-social a {
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 0.85rem;
}

.fp-title {
    color: #fff;
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    padding-bottom: 8px;
}

.fp-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 30px;
    height: 2px;
    background: #FFC107;
    border-radius: 2px;
}

.fp-links,
.fp-contact {
    list-style: none;
    padding: 0;
    margin: 0;
}

.fp-links li {
    color: #94A3B8;
    font-size: 0.78rem;
    margin-bottom: 8px;
}

.fp-contact li {
    color: #94A3B8;
    font-size: 0.78rem;
    margin-bottom: 10px;
    display: flex;
    gap: 8px;
    align-items: flex-start;
    line-height: 1.5;
}

.fp-contact li i {
    color: #FFC107;
    font-size: 0.85rem;
    margin-top: 2px;
    flex-shrink: 0;
}

.fp-copyright {
    text-align: center;
    padding: 15px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    color: #64748B;
    font-size: 0.75rem;
}

@media (max-width: 991.98px) {
    .footer-preview-container {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 575.98px) {
    .footer-preview-container {
        grid-template-columns: 1fr;
    }

    .nav-pills {
        flex-wrap: wrap;
        gap: 6px;
    }

    .nav-pills .nav-link {
        flex: 1;
        font-size: 0.75rem;
        padding: 8px 10px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Live preview
document.addEventListener('DOMContentLoaded', function() {
    const brandName = document.querySelector('[name="brand_name"]');
    const brandTag = document.querySelector('[name="brand_tagline"]');
    const desc = document.querySelector('[name="description"]');

    if (brandName) brandName.addEventListener('input', e => {
        document.getElementById('previewBrandName').textContent = e.target.value;
    });
    if (brandTag) brandTag.addEventListener('input', e => {
        document.getElementById('previewBrandTag').textContent = e.target.value;
    });
    if (desc) desc.addEventListener('input', e => {
        document.getElementById('previewDesc').textContent = e.target.value;
    });
});

// Character counter
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

// ===== WhatsApp Input Validation =====
const waInput = document.getElementById('waInput');
if (waInput) {
    waInput.addEventListener('input', function() {
        // Hanya izinkan angka
        this.value = this.value.replace(/[^0-9]/g, '');
        // Hapus 0 di depan jika ada
        this.value = this.value.replace(/^0+/, '');
    });
}
</script>
@endpush

@endsection