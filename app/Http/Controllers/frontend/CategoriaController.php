<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria)
    {
        $pagina = 'productos';
        $categorias = Categoria::orderBy('titulo', 'asc')->get();
        //dd($categoria);
        return view('productos', compact('categoria', 'pagina', 'categorias'));
    }
}
