<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Konstanta kategori untuk memudahkan penggunaan
    const CATEGORY_COMPANY = 'company_legalitas';
    const CATEGORY_WORKER = 'worker_certificate';

    public static function categories(): array
    {
        return [
            self::CATEGORY_COMPANY => 'Legalitas Perusahaan',
            self::CATEGORY_WORKER  => 'Sertifikat Pekerja',
        ];
    }
}