<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\ContactInfo;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share $contactInfo ke semua view
        View::composer('*', function ($view) {
            try {
                $contactInfo = ContactInfo::first();
            } catch (\Exception $e) {
                $contactInfo = null;
            }

            // Jika tidak ada data, buat objek kosong dengan nilai default
            if (!$contactInfo) {
                $contactInfo = new ContactInfo([
                    'company_name' => 'CV. Pison Teknik Indonesia',
                    'address' => 'Grand alexandria hills, Sidoarjo',
                    'whatsapp' => '82141520224',
                    'email' => 'cv.pisonteknikindonesia@gmail.com',
                    'working_hours' => 'Senin - Sabtu: 08:00 - 17:00 WIB',
                    'map_embed' => 'https://maps.app.goo.gl/XtuZYN7cE9zjjF7f6',
                    'tiktok' => 'https://tiktok.com/@kuli_panggilansurabaya',
                    'copyright_text' => '© ' . date('Y') . ' CV. PISON TEKNIK INDONESIA. All Rights Reserved.',
                ]);
            }

            $view->with('contactInfo', $contactInfo);
        });
    }
}