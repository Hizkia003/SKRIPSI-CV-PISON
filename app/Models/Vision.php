<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean'];
}