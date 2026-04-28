<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiktok extends Model
{
    protected $table = 'tiktoks';
    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];
}