@php $project = $project ?? null; @endphp
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Informasi Proyek</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Proyek *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $project?->title) }}"
                        placeholder="Contoh: Pemasangan Atap Gudang PT. ABC" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori *</label>
                    <select name="category" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(\App\Models\Project::CATEGORIES as $val => $label)
                            <option value="{{ $val }}" {{ old('category', $project?->category) == $val ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control"
                        value="{{ old('location', $project?->location) }}"
                        placeholder="Contoh: Jakarta Timur, Surabaya, dll">
                </div>

                {{-- DESKRIPSI PROYEK --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi Proyek</label>
                    <textarea name="description" rows="5" class="form-control"
                        placeholder="Deskripsi lengkap proyek...">{{ old('description', $project?->description) }}</textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Klien</label>
                        <input type="text" name="client" class="form-control" value="{{ old('client', $project?->client) }}"
                            placeholder="Nama klien">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun</label>
                        <input type="text" name="year" class="form-control" value="{{ old('year', $project?->year) }}"
                            placeholder="2024">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Durasi</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $project?->duration) }}"
                            placeholder="3 bulan">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Gambar Proyek</h5>
            </div>
            <div class="card-body">
                <input type="file" name="thumbnail" class="form-control image-input" data-preview="#thumbPreview"
                    accept="image/*">
                <small class="form-text">Upload gambar proyek (maks 2MB)</small>
                <img id="thumbPreview" src="{{ $project?->thumbnail ? asset('storage/' . $project->thumbnail) : '' }}"
                    class="img-preview mt-2" style="{{ $project?->thumbnail ? '' : 'display:none' }}">
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-dark w-100 mt-2">Batal</a>
            </div>
        </div>
    </div>
</div>