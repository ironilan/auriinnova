<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function show(Unidad $unidad)
    {
        $pagina = 'unidades';
        $clientes = Cliente::orderBY('titulo', 'asc')->get();
        return view('unidad', compact('unidad', 'pagina', 'clientes'));
    }
}
