@php $service = $service ?? null; @endphp
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Detail Layanan</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul Layanan *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $service?->title) }}"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi *</label>
                    <textarea name="description" rows="4" class="form-control"
                        required>{{ old('description', $service?->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bahan / Lingkup Pekerjaan</label>
                    <input type="text" name="materials" class="form-control"
                        value="{{ old('materials', $service?->materials) }}"
                        placeholder="Contoh: Zinc Aluminium, UPVC, Fiberglass">
                    <small class="form-text">Pisahkan tiap bahan dengan koma (,). Akan tampil sebagai tag di halaman layanan.</small>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Icon (Bootstrap Icons) *</label>
                        <input type="text" name="icon" class="form-control"
                            value="{{ old('icon', $service?->icon ?? 'bi-building') }}" placeholder="bi-building"
                            required>
                        <small class="text-muted">Lihat daftar icon di <a href="https://icons.getbootstrap.com"
                                target="_blank">icons.getbootstrap.com</a></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control"
                            value="{{ old('order', $service?->order ?? 0) }}">
                    </div>
                </div>

                {{-- Icon Preview --}}
                <div class="mt-3 p-3 rounded-3 d-flex align-items-center gap-3" style="background: #FFF8E1; border: 1px solid #FFECB3;">
                    <div style="width:50px; height:50px; background:linear-gradient(135deg,#FFC107,#FFA000); border-radius:14px; display:flex; align-items:center; justify-content:center; color:#1a1a1a; font-size:1.4rem;">
                        <i class="bi" id="iconPreview"></i>
                    </div>
                    <div>
                        <strong class="d-block" style="font-size:0.85rem;">Preview Icon</strong>
                        <small class="text-muted">Ketik nama icon untuk melihat preview</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Status</h5>
            </div>
            <div class="card-body">
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
                        {{ old('is_active', $service?->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Aktifkan Layanan</label>
                </div>
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-dark w-100 mt-2">Batal</a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.querySelector('[name="icon"]');
    const iconPreview = document.getElementById('iconPreview');

    function updateIcon() {
        iconPreview.className = 'bi ' + iconInput.value;
    }

    if (iconInput) {
        iconInput.addEventListener('input', updateIcon);
        updateIcon();
    }
});
</script>
@endpush