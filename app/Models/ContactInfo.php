<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $guarded = [];

    // Accessor: nomor WhatsApp lengkap dengan kode negara
    public function getWhatsappFullAttribute(): ?string
    {
        if (empty($this->whatsapp)) return null;
        return '62' . $this->whatsapp;
    }

    // Accessor: tampilan nomor yang rapi (+62 ...)
    public function getWhatsappDisplayAttribute(): ?string
    {
        if (empty($this->whatsapp)) return null;
        return '+62 ' . $this->whatsapp;
    }

    // Mutator: bersihkan input WhatsApp sebelum disimpan
    public function setWhatsappAttribute($value)
    {
        if ($value) {
            $clean = preg_replace('/[^0-9]/', '', $value);
            if (str_starts_with($clean, '62')) {
                $clean = substr($clean, 2);
            }
            $this->attributes['whatsapp'] = ltrim($clean, '0');
        } else {
            $this->attributes['whatsapp'] = null;
        }
    }
}