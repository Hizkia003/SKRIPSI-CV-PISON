<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JasaKonstruksi extends Model
{
    protected $table = 'jasa_konstruksi'; // <-- tambahkan ini

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(JasaKonstruksiImage::class, 'jasa_konstruksi_id');
    }
}
