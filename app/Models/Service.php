<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($s) {
            $s->slug = Str::slug($s->title) . '-' . time();
        });
    }
}