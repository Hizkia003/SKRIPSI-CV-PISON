@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <nav data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Kontak</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="contact-info-card">
                    <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <h5>Alamat Kantor</h5>
                    <p>{{ $footer->address ?? 'Jl. Industri Raya No. 123, Jakarta Timur 13920' }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info-card">
                    <div class="contact-icon"><i class="bi bi-whatsapp"></i></div>
                    <h5>WhatsApp</h5>
                    <p>
                        @if(!empty($footer->whatsapp))
                        <a href="https://wa.me/{{ $footer->whatsapp_full }}" target="_blank" class="text-decoration-none">
                            {{ $footer->whatsapp_display }}
                        </a>
                        @else
                        +62 812-3456-7890
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-info-card">
                    <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                    <h5>Email</h5>
                    <p>
                        @if(!empty($footer->email))
                        <a href="mailto:{{ $footer->email }}" class="text-decoration-none">{{ $footer->email }}</a>
                        @else
                        info@pisonteknik.co.id
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Form & Maps -->
        <div class="row g-4 mt-4">
            <!-- Form Kontak -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="contact-form-card">
                    <div class="contact-form-header">
                        <h3><i class="bi bi-send-fill text-warning me-2"></i>Kirim Pesan</h3>
                        <p class="text-muted mb-0">Isi form di bawah ini, kami akan merespon secepat mungkin.</p>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center gap-2 mx-4" role="alert">
                        <i class="bi bi-check-circle-fill"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger mx-4">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        @foreach($errors->all() as $err)<div>{{ $err }}</div>@endforeach
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form-body">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Masukkan nama Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No. WA / Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-chat-dots-fill"></i></span>
                                    <input type="text" name="contact" class="form-control" value="{{ old('contact') }}"
                                        placeholder="08xx atau email@contoh.com" required>
                                </div>
                                <small class="form-text text-muted">Masukkan nomor WhatsApp atau alamat email</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Subjek <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}"
                                        placeholder="Contoh: Konsultasi Proyek Gedung" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pesan <span class="text-danger">*</span></label>
                                <textarea name="message" rows="5" class="form-control"
                                    placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-lg w-100">
                                    <i class="bi bi-send-fill me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Maps & Info -->
            <div class="col-lg-5" data-aos="fade-left">
                <!-- Google Maps -->
                <div class="map-card mb-4">
                    <div class="map-container">
                        @if(!empty($footer->map_embed))
                        <iframe src="{{ $footer->map_embed }}" width="100%" height="300" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                    </div>
                </div>

                <!-- Informasi Kontak Samping -->
                <div class="contact-side-card">
                    <h5 class="mb-4"><i class="bi bi-info-circle-fill text-warning me-2"></i>Informasi Kontak</h5>

                    @if(!empty($footer->address))
                    <div class="contact-side-item">
                        <div class="contact-side-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <h6>Alamat</h6>
                            <p>{{ $footer->address }}</p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($footer->whatsapp))
                    <div class="contact-side-item">
                        <div class="contact-side-icon" style="background: linear-gradient(135deg, #25D366, #128C7E);"><i class="bi bi-whatsapp"></i></div>
                        <div>
                            <h6>WhatsApp</h6>
                            <p><a href="https://wa.me/{{ $footer->whatsapp_full }}" target="_blank">{{ $footer->whatsapp_display }}</a></p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($footer->email))
                    <div class="contact-side-item">
                        <div class="contact-side-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <h6>Email</h6>
                            <p><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($footer->working_hours))
                    <div class="contact-side-item">
                        <div class="contact-side-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);"><i class="bi bi-clock-fill"></i></div>
                        <div>
                            <h6>Jam Operasional</h6>
                            <p>{{ $footer->working_hours }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-8">
                <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
                <p class="cta-desc">Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami sekarang juga!</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                @if(!empty($footer->whatsapp))
                <a href="https://wa.me/{{ $footer->whatsapp_full }}" target="_blank" class="btn btn-dark btn-lg">
                    <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* Contact Form Card */
.contact-form-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    overflow: hidden;
    height: 100%;
}
.contact-form-header {
    background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
    padding: 28px 30px;
    color: #fff;
}
.contact-form-header h3 {
    color: #fff;
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 6px;
}
.contact-form-body {
    padding: 30px;
}
.contact-form-body .input-group-text {
    background: #FFF8E1;
    border: 2px solid #e5e5e5;
    border-right: 0;
    color: #FFA000;
    font-size: 1rem;
}
.contact-form-body .form-control {
    border: 2px solid #e5e5e5;
    border-left: 0;
    padding: 12px 18px;
    border-radius: 0 12px 12px 0;
    transition: all 0.3s;
}
.contact-form-body .input-group-text { border-radius: 12px 0 0 12px; }
.contact-form-body .form-control:focus {
    border-color: #FFC107;
    box-shadow: 0 0 0 3px rgba(255,193,7,0.15);
}
.contact-form-body .form-control:focus + .input-group-text,
.contact-form-body .input-group:focus-within .input-group-text {
    border-color: #FFC107;
}
.contact-form-body textarea.form-control {
    border: 2px solid #e5e5e5;
    border-left: 2px solid #e5e5e5;
    border-radius: 12px;
    padding: 14px 18px;
}

/* Map Card */
.map-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    border: 3px solid #FFC107;
}
.map-card iframe {
    display: block;
}

/* Contact Side Card */
.contact-side-card {
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
}
.contact-side-card h5 {
    font-size: 1.1rem;
    font-weight: 700;
}
.contact-side-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}
.contact-side-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
.contact-side-icon {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: #fff;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.contact-side-item h6 {
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 2px;
    color: #1a1a1a;
}
.contact-side-item p {
    margin: 0;
    color: #64748b;
    font-size: 0.9rem;
}
.contact-side-item a {
    color: #FFA000;
    text-decoration: none;
    font-weight: 500;
}
.contact-side-item a:hover {
    color: #1a1a1a;
}
</style>
@endpush
@endsection