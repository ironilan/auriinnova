<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    /****** muchos a muchos ***************/
    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
