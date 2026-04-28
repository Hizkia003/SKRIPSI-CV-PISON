@php $material = $material ?? null; @endphp
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h5>Detail Material</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Material *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $material?->title) }}"
                        placeholder="Contoh: Zinc Aluminium" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi *</label>
                    <textarea name="description" rows="5" class="form-control"
                        placeholder="Jelaskan material ini secara detail..." required>{{ old('description', $material?->description) }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><h5>Pengaturan</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $material?->order ?? 0) }}">
                    <small class="form-text">Semakin kecil, semakin awal tampil</small>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
                        {{ old('is_active', $material?->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Aktifkan</label>
                </div>
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.supply-materials.index') }}" class="btn btn-outline-dark w-100 mt-2">Batal</a>
            </div>
        </div>
    </div>
</div>
