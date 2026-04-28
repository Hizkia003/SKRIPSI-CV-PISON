<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JasaKonstruksi extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($j) {
            $j->slug = Str::slug($j->title) . '-' . time();
        });
    }

    public function images()
    {
        return $this->hasMany(JasaKonstruksiImage::class)->orderBy('order');
    }
}
