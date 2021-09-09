<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "slug";
    }

    // protected $casts = [
    //     'fecha_ingreso' => 'date'
    // ];

    public function subcategorias()
    {
        return $this->hasMany('App\Models\Subcategoria')->orderBy('titulo', 'asc');
    }

    public function bannercategorias()
    {
        return $this->hasMany('App\Models\Bannercategoria');
    }
}
