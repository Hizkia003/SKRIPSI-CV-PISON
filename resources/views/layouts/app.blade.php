<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV. Pison Teknik Indonesia') - Kontraktor Profesional</title>
    <meta name="description"
        content="@yield('description', 'CV. Pison Teknik Indonesia - Perusahaan kontraktor profesional dengan pengalaman bertahun-tahun')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>

<body>
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- WhatsApp Float Button -->
    @if(!empty($contactInfo->whatsapp))
        <a href="https://wa.me/{{ $contactInfo->whatsapp }}?text={{ urlencode('Halo CV. Pison Teknik Indonesia, saya tertarik dengan layanan Anda. Bisa minta informasi lebih lanjut?') }}"
            target="_blank" rel="noopener" class="whatsapp-float" id="waFloat" aria-label="Chat WhatsApp">
            <i class="bi bi-whatsapp"></i>
            <span class="wa-tooltip">Chat Kami</span>
        </a>
    @endif

    <!-- Scroll to Top -->
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Scroll to top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>