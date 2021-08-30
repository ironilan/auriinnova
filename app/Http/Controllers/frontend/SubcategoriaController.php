<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function show(Subcategoria $subcategoria)
    {
        $pagina = 'productos';
        $categorias = Categoria::orderBy('titulo', 'asc')->get();
        return view('productos', compact('categorias', 'pagina', 'subcategoria'));
    }
}
