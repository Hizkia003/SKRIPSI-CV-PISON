@php $tiktok = $tiktok ?? null; @endphp
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Video TikTok</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">URL Video TikTok *</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tiktok"></i></span>
                        <input type="url" name="video_url" class="form-control" id="videoUrlInput"
                            value="{{ old('video_url', $tiktok?->video_url) }}"
                            placeholder="https://www.tiktok.com/@username/video/1234567890123" required>
                    </div>
                    <small class="form-text">Paste URL lengkap video TikTok. Video akan di-embed langsung di website.</small>
                </div>

                {{-- Preview embed --}}
                <div class="mb-3">
                    <label class="form-label text-muted"><i class="bi bi-eye-fill me-1"></i>Preview Video</label>
                    <div id="videoPreview" class="tt-preview-box">
                        @if($tiktok?->video_url)
                            @php preg_match('/video\/(\d+)/', $tiktok->video_url, $m); @endphp
                            @if(!empty($m[1]))
                            <iframe src="https://www.tiktok.com/player/v1/{{ $m[1] }}?music_info=0&description=0"
                                style="width:100%;height:100%;border:none;" allowfullscreen></iframe>
                            @else
                            <div class="tt-preview-empty">
                                <i class="bi bi-exclamation-triangle"></i>
                                <p>URL tidak valid</p>
                            </div>
                            @endif
                        @else
                        <div class="tt-preview-empty">
                            <i class="bi bi-tiktok"></i>
                            <p>Paste URL untuk melihat preview</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Pengaturan</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul (untuk admin) *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $tiktok?->title) }}"
                        placeholder="Contoh: BTS Proyek Gudang" required>
                    <small class="form-text">Hanya untuk identifikasi di admin, tidak tampil di website.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="order" class="form-control"
                        value="{{ old('order', $tiktok?->order ?? 0) }}">
                    <small class="form-text">Semakin kecil, semakin awal tampil</small>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
                        {{ old('is_active', $tiktok?->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Aktifkan Konten</label>
                </div>
                <button type="submit" class="btn btn-warning w-100"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.tiktoks.index') }}" class="btn btn-outline-dark w-100 mt-2">Batal</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-info-circle me-1"></i> Panduan</h5>
            </div>
            <div class="card-body">
                <ol class="small text-muted ps-3 mb-0" style="line-height:1.8;">
                    <li>Buka video TikTok yang ingin ditampilkan</li>
                    <li>Klik tombol <strong>Share / Bagikan</strong></li>
                    <li>Pilih <strong>Salin Link</strong></li>
                    <li>Paste URL di field di atas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.tt-preview-box {
    background: #000;
    border-radius: 14px;
    overflow: hidden;
    aspect-ratio: 9/16;
    max-height: 480px;
    position: relative;
}
.tt-preview-empty {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.25);
    gap: 8px;
    min-height: 300px;
}
.tt-preview-empty i { font-size: 3rem; }
.tt-preview-empty p { font-size: 0.85rem; margin: 0; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('videoUrlInput');
    const preview = document.getElementById('videoPreview');

    if (input) {
        input.addEventListener('change', updatePreview);
        input.addEventListener('paste', function() {
            setTimeout(updatePreview, 100);
        });
    }

    function updatePreview() {
        const url = input.value.trim();
        const match = url.match(/video\/(\d+)/);

        if (match) {
            preview.innerHTML = '<iframe src="https://www.tiktok.com/player/v1/' + match[1] +
                '?music_info=0&description=0" style="width:100%;height:100%;border:none;" allowfullscreen></iframe>';
        } else if (url) {
            preview.innerHTML = '<div class="tt-preview-empty"><i class="bi bi-exclamation-triangle"></i><p>URL tidak mengandung video ID</p></div>';
        } else {
            preview.innerHTML = '<div class="tt-preview-empty"><i class="bi bi-tiktok"></i><p>Paste URL untuk melihat preview</p></div>';
        }
    }
});
</script>
@endpush