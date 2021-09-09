<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio_final',
        'precio_antes',
        'slug',
        'imagen',
        'estrellas',
        'sku',
        'descripcion',
        'color',
        'codigo_color',
        'codigo_color_filtro',
        'procedencia',
        'largo',
        'ancho',
        'alto',
        'peso',
        'material',
        'atributos',
        'limpieza',
        'recomendaciones',
        'categoria_id',
        'subcategoria_id',
        'nuevo'
    ];

    public function subcategoria()
    {
        return $this->belongsTo('App\Models\Subcategoria');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function imagesproductos()
    {
        return $this->hasMany(Imagesproducto::class);
    }

    /****** muchos a muchos ***************/
    public function medidas()
    {
        return $this->belongsToMany(Medida::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }




    // public function scopeSubcategoria($query, $subcategoria)
    // {
    //     if($subcategoria)
    //         return $query->where('subcategoria', "%$subcategoria%");
    // }


    // public function scopeCategoria($query, $categoria)
    // {
    //     $query->whereHas('categorias', function ($query) use ($categoria) {
    //         $query->where('categorias.nombre', 'like',"%$categoria%");
    //     });
    // }
}
