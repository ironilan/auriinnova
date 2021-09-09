<?php

namespace App\Imports;

use App\Models\Categoria;
use App\Models\Imagesproducto;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductoImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        //dd($rows);
        foreach ($rows as $row) 
        {
            $categoriamodfromexcel = ucwords(mb_strtolower($row['categoria_id']));
            $subcategoriamodfromexcel = ucwords(mb_strtolower($row['subcategoria_id']));

            $categoria = Categoria::where('titulo', $categoriamodfromexcel)->first();
            $subcategoria = Subcategoria::where('titulo', $subcategoriamodfromexcel)->first();

            if($categoria and $subcategoria)
            {
                $producto = Producto::create([
                    'nombre'                => $row['nombre'],
                    'precio_final'          => $row['precio_final'],
                    'precio_antes'          => $row['precio_antes'],
                    'slug'                  => Str::slug($row['nombre'],'-'),
                    'imagen'                => $row['imagen1'],
                    'estrellas'             => $row['estrellas'],
                    'sku'                   => $row['sku'],
                    'descripcion'           => $row['descripcion'],
                    'color'                 => $row['color'],
                    'codigo_color'          => $row['codigo_color'],
                    'codigo_color_filtro'   => $row['codigo_color_filtro'],
                    'procedencia'           => $row['procedencia'],
                    'largo'                 => $row['largo'],
                    'ancho'                 => $row['ancho'],
                    'alto'                  => $row['espesor'],
                    'peso'                  => $row['peso'],
                    'material'              => $row['material'],
                    'atributos'             => $row['atributos'],
                    'limpieza'              => $row['limpieza'],
                    'recomendaciones'       => $row['recomendaciones'],
                    'nuevo'                 => $row['nuevo'],
                    'subcategoria_id'       => $subcategoria->id,
                    'categoria_id'          => $categoria->id,
                ]);


                $foto = new Imagesproducto;

                //porque en el excel hay 4 imagenes                
                
                if (!is_null($row['imagen2'])) {
                    $foto->imagen = $row['imagen2'];
                    $foto->producto_id = $producto->id;
                    $foto->save();
                }

                if (!is_null($row['imagen3'])) {
                    $foto->imagen = $row['imagen3'];
                    $foto->producto_id = $producto->id;
                    $foto->save();
                }

                if (!is_null($row['imagen4'])) {
                    $foto->imagen = $row['imagen4'];
                    $foto->producto_id = $producto->id;
                    $foto->save();
                }
                
            }
            
            



            if (!is_null($row['medidas'])) {
                $medidas = explode(',', $row['medidas']);

                for ($i=0; $i < count($medidas); $i++) { 
                    $medida = Medida::where('titulo', $medidas[$i])->first();

                    if ($medida) {
                        $producto->medidas()->attach($medida->id);
                    }
                }
            }

        }


    }
}
