<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // USER ADMIN
        // ============================================
        \App\Models\User::create([
            'name' => 'Admin Pison',
            'email' => 'admin@pisonteknik.com',
            'password' => bcrypt('admin123'),
        ]);

        // ============================================
        // SITE CONTENT (HOME)
        // ============================================
        \App\Models\SiteContent::create([
            'home_description' => 'CV. Pison Teknik Indonesia adalah mitra terpercaya Anda untuk solusi konstruksi profesional, industri, dan renovasi dengan standar kualitas tinggi.',
            'total_projects' => 500,
            'experience_years' => 15,
        ]);

        // ============================================
        // FOOTER SETTING
        // ============================================
        \App\Models\FooterSetting::create([
            'brand_name' => 'PISON TEKNIK',
            'brand_tagline' => 'Kontraktor Profesional',
            'description' => 'CV. Pison Teknik Indonesia adalah perusahaan kontraktor profesional yang telah berpengalaman lebih dari 15 tahun dalam industri konstruksi.',
            'company_name' => 'CV. PISON TEKNIK INDONESIA',
            'address' => 'Jl. Industri Raya No. 123, Jakarta Timur 13920',
            'whatsapp' => '6281234567890',
            'email' => 'info@pisonteknik.co.id',
            'working_hours' => 'Senin - Sabtu: 08:00 - 17:00 WIB',
            'tiktok' => 'https://tiktok.com/@pisonteknik',
            'copyright_text' => '© 2024 PISON TEKNIK INDONESIA. All Rights Reserved.',
        ]);

        // ============================================
        // ABOUT
        // ============================================
        \App\Models\About::create([
            'title' => 'Tentang Kami',
            'subtitle' => 'Kontraktor Profesional Terpercaya',
            'description' => 'CV. Pison Teknik Indonesia didirikan pada tahun 2010 dengan visi menjadi kontraktor terpercaya...',
            'vision' => 'Menjadi perusahaan kontraktor terdepan di Indonesia.',
            'mission' => 'Memberikan layanan konstruksi berkualitas tinggi.',
        ]);

        // ============================================
        // SERVICES
        // ============================================
        $services = [
            ['icon' => 'bi-building', 'title' => 'Konstruksi Gedung', 'description' => 'Kami menyediakan layanan konstruksi gedung komersial dan industri dengan standar kualitas tinggi.'],
            ['icon' => 'bi-house-door', 'title' => 'Renovasi & Interior', 'description' => 'Layanan renovasi dan desain interior untuk berbagai kebutuhan.'],
            ['icon' => 'bi-gear-wide-connected', 'title' => 'Instalasi Industri', 'description' => 'Instalasi mesin dan peralatan industri dengan presisi tinggi.'],
            ['icon' => 'bi-clipboard-check', 'title' => 'Konsultasi Teknik', 'description' => 'Konsultasi teknik profesional untuk proyek konstruksi Anda.'],
            ['icon' => 'bi-tools', 'title' => 'Maintenance', 'description' => 'Layanan pemeliharaan dan perawatan rutin untuk menjaga kualitas bangunan.'],
            ['icon' => 'bi-shield-check', 'title' => 'Safety Installation', 'description' => 'Pemasangan sistem keamanan dan keselamatan untuk bangunan.'],
        ];
        foreach ($services as $i => $s) {
            \App\Models\Service::create([
                'icon' => $s['icon'],
                'title' => $s['title'],
                'description' => $s['description'],
                'order' => $i + 1,
                'is_active' => true,
            ]);
        }

        // ============================================
        // PROJECTS
        // ============================================
        $projects = [
            ['title' => 'Gedung Perkantoran Modern', 'category' => 'construction', 'year' => 2024, 'location' => 'Jakarta Pusat'],
            ['title' => 'Renovasi Pabrik Tekstil', 'category' => 'renovation', 'year' => 2023, 'location' => 'Bandung'],
            ['title' => 'Instalasi Mesin Industri', 'category' => 'installation', 'year' => 2024, 'location' => 'Surabaya'],
            ['title' => 'Pembangunan Warehouse', 'category' => 'construction', 'year' => 2023, 'location' => 'Bekasi'],
            ['title' => 'Kantor Startup Modern', 'category' => 'renovation', 'year' => 2024, 'location' => 'Jakarta Selatan'],
            ['title' => 'Sistem Elektrikal Pabrik', 'category' => 'installation', 'year' => 2023, 'location' => 'Tangerang'],
        ];
        foreach ($projects as $p) {
            \App\Models\Project::create([
                'title' => $p['title'],
                'slug' => \Str::slug($p['title']),
                'category' => $p['category'],
                'year' => $p['year'],
                'location' => $p['location'],
                'description' => 'Deskripsi detail proyek ini.',
                'thumbnail' => null,
            ]);
        }

        // ============================================
        // CERTIFICATES
        // ============================================
        $certificates = [
            ['name' => 'ISO 9001:2015', 'subtitle' => 'Sistem Manajemen Mutu'],
            ['name' => 'ISO 14001:2015', 'subtitle' => 'Sistem Manajemen Lingkungan'],
            ['name' => 'OHSAS 18001', 'subtitle' => 'Keselamatan & Kesehatan Kerja'],
            ['name' => 'SBU Konstruksi', 'subtitle' => 'Sertifikat Badan Usaha'],
            ['name' => 'SIUJK', 'subtitle' => 'Surat Izin Usaha Jasa Konstruksi'],
            ['name' => 'K3 Konstruksi', 'subtitle' => 'Sertifikat Ahli K3 Konstruksi'],
        ];
        foreach ($certificates as $i => $c) {
            \App\Models\Certificate::create([
                'name' => $c['name'],
                'subtitle' => $c['subtitle'],
                'image' => null,
                'order' => $i + 1,
                'is_active' => true,
            ]);
        }

        // ============================================
        // TIKTOKS
        // ============================================
        $tiktoks = [
            'https://www.tiktok.com/@username/video/1234567890',
            'https://www.tiktok.com/@username/video/0987654321',
            'https://www.tiktok.com/@username/video/1122334455',
        ];
        foreach ($tiktoks as $i => $url) {
            \App\Models\Tiktok::create([
                'video_url' => $url,
                'title' => 'Video TikTok #' . ($i + 1),
                'order' => $i + 1,
                'is_active' => true,
            ]);
        }
    }
}