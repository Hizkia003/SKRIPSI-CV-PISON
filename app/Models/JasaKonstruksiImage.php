<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JasaKonstruksiImage extends Model
{
    protected $guarded = [];

    public function jasaKonstruksi()
    {
        return $this->belongsTo(JasaKonstruksi::class);
    }
}
