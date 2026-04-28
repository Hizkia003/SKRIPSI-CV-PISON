<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        Service::truncate();

        $services = [
            [
                'title' => 'Atap, Dinding & Lisplang',
                'description' => 'Pembuatan dan pemasangan atap, dinding panel, serta lisplang dengan material berkualitas tinggi. Kami mengerjakan proyek residensial maupun komersial dengan hasil presisi dan tahan lama.',
                'materials' => 'Zinc Aluminium, UPVC, Fiberglass',
                'icon' => 'bi-house-fill',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Talang & Skylight',
                'description' => 'Instalasi talang air dan skylight untuk pencahayaan alami. Dirancang tahan bocor dengan sistem drainase optimal serta pencahayaan yang memaksimalkan kenyamanan ruangan.',
                'materials' => 'Zinc Aluminium, Fiberglass',
                'icon' => 'bi-droplet-half',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Safetyline & Railing',
                'description' => 'Pembuatan dan pemasangan safety railing, handrail, serta pagar pengaman sesuai standar keselamatan kerja. Kokoh, estetis, dan dirancang untuk keamanan maksimal.',
                'materials' => 'Stainless Steel, Aluminium, Metal/Baja',
                'icon' => 'bi-shield-check',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Konstruksi',
                'description' => 'Layanan konstruksi menyeluruh meliputi bongkar pasang struktur bangunan lama dan pembangunan baru. Dikerjakan oleh tim berpengalaman dengan peralatan modern.',
                'materials' => 'Bongkar Pasang, Pasang Baru Bangunan',
                'icon' => 'bi-buildings',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Insulasi',
                'description' => 'Pemasangan material insulasi untuk peredam panas, suara, dan kelembaban. Meningkatkan efisiensi energi bangunan serta kenyamanan lingkungan kerja.',
                'materials' => 'Material Insulasi Termal & Akustik',
                'icon' => 'bi-thermometer-half',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
