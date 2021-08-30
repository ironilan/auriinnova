<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad');
    }
}
