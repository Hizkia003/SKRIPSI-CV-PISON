<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JasaKonstruksiImage extends Model
{
    protected $table = 'jasa_konstruksi_images';

    protected $guarded = [];

    public function jasaKonstruksi()
    {
        return $this->belongsTo(JasaKonstruksi::class);
    }
}