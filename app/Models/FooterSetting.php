<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $guarded = [];

    /**
     * Accessor: Gabungkan kode negara 62 + nomor WA
     * Digunakan untuk link wa.me/62xxx
     */
    public function getWhatsappFullAttribute(): ?string
    {
        if (empty($this->attributes['whatsapp'])) return null;
        $num = $this->cleanWaNumber($this->attributes['whatsapp']);
        return '62' . $num;
    }

    /**
     * Accessor: Format tampil +62 8xx...
     * Digunakan untuk menampilkan nomor di frontend
     */
    public function getWhatsappDisplayAttribute(): ?string
    {
        if (empty($this->attributes['whatsapp'])) return null;
        $num = $this->cleanWaNumber($this->attributes['whatsapp']);
        return '+62 ' . $num;
    }

    /**
     * Helper: Bersihkan nomor dari prefix 62/0
     */
    private function cleanWaNumber(string $raw): string
    {
        $clean = preg_replace('/[^0-9]/', '', $raw);
        if (str_starts_with($clean, '62')) {
            $clean = substr($clean, 2);
        }
        return ltrim($clean, '0');
    }

    /**
     * Mutator: Bersihkan nomor WA sebelum simpan
     * Hapus +, spasi, strip, dan prefix 62/0 jika ada
     */
    public function setWhatsappAttribute($value)
    {
        if ($value) {
            // Hapus karakter non-angka
            $clean = preg_replace('/[^0-9]/', '', $value);
            // Hapus prefix 62 jika admin tidak sengaja ketik
            if (str_starts_with($clean, '62')) {
                $clean = substr($clean, 2);
            }
            // Hapus 0 di depan jika ada
            $clean = ltrim($clean, '0');
            $this->attributes['whatsapp'] = $clean;
        } else {
            $this->attributes['whatsapp'] = null;
        }
    }
}