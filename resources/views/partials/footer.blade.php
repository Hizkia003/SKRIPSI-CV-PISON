<footer class="footer">
    <div class="container">
        <div class="row g-4">
            {{-- KOLOM 1: Brand & Deskripsi & Sosmed --}}
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/') }}" class="footer-brand">
                    <span class="footer-brand-icon"><i class="bi bi-building-gear"></i></span>
                    <div>
                        <h5 class="footer-brand-name">{{ $footer->brand_name ?? 'PISON TEKNIK' }}</h5>
                        <small class="footer-brand-tag">{{ $footer->brand_tagline ?? 'Kontraktor Profesional' }}</small>
                    </div>
                </a>

                <p class="footer-desc">
                    {{ $footer->description ?? 'CV. Pison Teknik Indonesia adalah perusahaan kontraktor profesional.' }}
                </p>

                {{-- SOSIAL MEDIA (TikTok saja) --}}
                @if(!empty($footer->tiktok))
                <div class="footer-social">
                    <a href="{{ $footer->tiktok }}" target="_blank" rel="noopener" title="TikTok">
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

            {{-- KOLOM 3: Layanan --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Layanan Kami</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/supply-material') }}"><i class="bi bi-chevron-right"></i> Supply Material</a></li>
                    <li><a href="{{ url('/jasa-konstruksi') }}"><i class="bi bi-chevron-right"></i> Jasa Konstruksi</a></li>
                </ul>
            </div>

            {{-- KOLOM 4: Kontak --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    @if(!empty($footer->address))
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>{{ $footer->address }}</span>
                    </li>
                    @endif

                    @if(!empty($footer->whatsapp))
                    <li>
                        <i class="bi bi-whatsapp"></i>
                        <a href="https://wa.me/{{ $footer->whatsapp_full }}" target="_blank">{{ $footer->whatsapp_display }}</a>
                    </li>
                    @endif

                    @if(!empty($footer->email))
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                    </li>
                    @endif

                    @if(!empty($footer->working_hours))
                    <li>
                        <i class="bi bi-clock-fill"></i>
                        <span>{{ $footer->working_hours }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        {{-- COPYRIGHT --}}
        <div class="footer-bottom">
            <p>{{ $footer->copyright_text ?? '© '.date('Y').' '.($footer->company_name ?? 'PISON TEKNIK INDONESIA').'. All Rights Reserved.' }}
            </p>
        </div>
    </div>
</footer>