<footer class="footer">
    <div class="container">
        <div class="row g-4">
            {{-- KOLOM 1: Brand & Deskripsi & Sosmed --}}
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/') }}" class="footer-brand">
                    <div>
                        <h5 class="footer-brand-name">{{ $contactInfo->company_name ?? 'PISON TEKNIK' }}</h5>
                        <small class="footer-brand-tag">Kontraktor Profesional</small>
                    </div>
                </a>

                <p class="footer-desc">
                    {{ $contactInfo->company_description ?? 'CV. Pison Teknik Indonesia adalah perusahaan kontraktor yang menyediakan jasa konstruksi dan renovasi bangunan dengan fokus pada pekerjaan struktur dan atap, serta didukung penyediaan material berkualitas untuk memenuhi kebutuhan proyek secara menyeluruh.' }}
                </p>

                {{-- SOSIAL MEDIA (TikTok) --}}
                @if(!empty($contactInfo->tiktok))
                    <div class="footer-social">
                        <a href="{{ $contactInfo->tiktok }}" target="_blank" rel="noopener" title="TikTok">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                @endif
            </div>

            {{-- KOLOM 2: Tautan Cepat --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">Tautan Cepat</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
                    <li><a href="{{ url('/about') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
                    <li><a href="{{ url('/services') }}"><i class="bi bi-chevron-right"></i> Layanan</a></li>
                    <li><a href="{{ url('/projects') }}"><i class="bi bi-chevron-right"></i> Proyek</a></li>
                    <li><a href="{{ url('/certificates') }}"><i class="bi bi-chevron-right"></i> Sertifikat</a></li>
                    <li><a href="{{ url('/contact') }}"><i class="bi bi-chevron-right"></i> Kontak</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: Layanan Kami --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Layanan Kami</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/supply-material') }}"><i class="bi bi-chevron-right"></i> Supply Material</a>
                    </li>
                    <li><a href="{{ url('/jasa-konstruksi') }}"><i class="bi bi-chevron-right"></i> Jasa Konstruksi</a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 4: Kontak Kami --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>{{ $contactInfo->address ?? 'Grand alexandria hills, Sidoarjo' }}</span>
                    </li>
                    <li>
                        <i class="bi bi-whatsapp"></i>
                        <a href="https://wa.me/{{ $contactInfo->whatsapp ?? '82141520224' }}" target="_blank">
                            +62 {{ $contactInfo->whatsapp ?? '82141520224' }}
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:{{ $contactInfo->email ?? 'cv.pisonteknikindonesia@gmail.com' }}">
                            {{ $contactInfo->email ?? 'cv.pisonteknikindonesia@gmail.com' }}
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-clock-fill"></i>
                        <span>{{ $contactInfo->working_hours ?? 'Senin - Sabtu: 08:00 - 17:00 WIB' }}</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- COPYRIGHT --}}
        <div class="footer-bottom">
            <p>{{ $contactInfo->copyright_text ?? '© ' . date('Y') . ' CV. PISON TEKNIK INDONESIA. All Rights Reserved.' }}
            </p>
        </div>
    </div>
</footer>