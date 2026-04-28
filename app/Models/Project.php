<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $guarded = [];

    public const CATEGORIES = [
        'atap-dinding-lisplang' => 'Atap, Dinding & Lisplang',
        'talang-skylight' => 'Talang & Skylight',
        'safetyline-railing' => 'Safetyline & Railing',
        'konstruksi' => 'Konstruksi',
        'insulasi' => 'Insulasi',
    ];

    protected static function booted()
    {
        static::creating(function ($p) {
            $p->slug = Str::slug($p->title) . '-' . time();
        });
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? ucfirst($this->category);
    }
}