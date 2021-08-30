<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    public function getSubcategoriaMedidas(Request $request)
    {
        $idsub = $request->idsubcategoria;
        $subcategoria = Subcategoria::find($idsub);

        $medidas = $subcategoria->medidas;

        //return $medidas;


        return view('response.medidas', compact('medidas', 'idsub'));
    }
}
