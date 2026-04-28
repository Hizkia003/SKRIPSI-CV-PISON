@php $item = $item ?? null; @endphp
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h5>Detail Layanan</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Layanan *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $item?->title) }}"
                        placeholder="Contoh: Pembuatan Atap, Dinding & Lisplang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi *</label>
                    <textarea name="description" rows="5" class="form-control"
                        placeholder="Jelaskan layanan ini secara detail..." required>{{ old('description', $item?->description) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Galeri Foto --}}
        <div class="card">
            <div class="card-header"><h5><i class="bi bi-images me-1"></i> Galeri Foto</h5></div>
            <div class="card-body">
                {{-- Gambar yang sudah ada --}}
                @if($item && $item->images->count())
                <div class="mb-3">
                    <label class="form-label text-muted">Foto Saat Ini</label>
                    <div class="jk-img-grid">
                        @foreach($item->images as $img)
                        <div class="jk-img-item">
                            <img src="{{ asset('storage/'.$img->image) }}" alt="Foto {{ $loop->iteration }}">
                            <label class="jk-img-delete">
                                <input type="checkbox" name="delete_images[]" value="{{ $img->id }}">
                                <span><i class="bi bi-trash3"></i> Hapus</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Upload baru --}}
                <div>
                    <label class="form-label">Upload Foto Baru</label>
                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                    <small class="form-text">Format: JPG, PNG, WebP. Maks 2MB/foto.</small>
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
                    <input type="number" name="order" class="form-control" value="{{ old('order', $item?->order ?? 0) }}">
                    <small class="form-text">Semakin kecil, semakin awal tampil</small>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
                        {{ old('is_active', $item?->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Aktifkan</label>
                </div>
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.jasa-konstruksi.index') }}" class="btn btn-outline-dark w-100 mt-2">Batal</a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.jk-img-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px;
}
.jk-img-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #eee;
}
.jk-img-item img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    display: block;
}
.jk-img-delete {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 6px 8px;
    font-size: 0.75rem;
    cursor: pointer;
    background: #fff;
}
.jk-img-delete input:checked + span {
    color: #dc3545;
    font-weight: 600;
}
</style>
@endpush
