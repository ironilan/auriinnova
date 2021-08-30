<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    // protected $casts = [
    //     'fecha_ingreso' => 'date'
    // ];

    public function lineas()
    {
        return $this->hasMany('App\Models\Linea');
    }

    public function valoragregado()
    {
        return $this->hasMany('App\Models\Valoragregado')->orderBY('titulo', 'asc');
    }
}
