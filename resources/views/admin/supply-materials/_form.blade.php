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
            <div class="card-header"><h5>Gambar Material</h5></div>
            <div class="card-body">
                @if($material && $material->image)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $material->image) }}" 
                             class="img-fluid rounded" style="max-width: 100%; max-height: 180px; border: 1px solid #ddd;">
                        <div class="mt-2">
                            <div class="form-check">
                                <input type="checkbox" name="delete_image" value="1" id="deleteImage" class="form-check-input">
                                <label class="form-check-label text-danger" for="deleteImage">Hapus gambar saat ini</label>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label">Upload Gambar Baru</label>
                    <input type="file" name="image" class="form-control image-input" accept="image/*" data-preview="#imagePreview">
                    <small class="form-text">Format: JPG, PNG, WebP. Maks 2MB.</small>
                    <img id="imagePreview" src="#" class="img-fluid mt-2 rounded" style="max-height: 150px; display: none;">
                </div>
            </div>
        </div>

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

@push('scripts')
<script>
    document.querySelectorAll('.image-input').forEach(input => {
        input.addEventListener('change', function(e) {
            const previewId = this.dataset.preview;
            if (previewId && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const preview = document.querySelector(previewId);
                    if (preview) {
                        preview.src = ev.target.result;
                        preview.style.display = 'block';
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush