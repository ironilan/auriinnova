<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $pagina = 'productos';
        $categorias = Categoria::orderBy('titulo', 'asc')->get();
        $categoria = Categoria::first();
        return view('productos', compact('pagina', 'categorias', 'categoria')); 
    }


    public function producto_ajax(Request $request)
    {

        $idprod = $request->idprod;
        $producto = Producto::find($idprod);
        $colores = Producto::where('codigo_color_filtro', $producto->codigo_color_filtro)->get();
        return view('response.producto_ajax', compact('producto', 'colores'));
    }

    public function show(Producto $producto)
    {
        $pagina = 'productos';
        $colores = Producto::where('codigo_color_filtro', $producto->codigo_color_filtro)->get();
        return view('producto', compact('producto', 'pagina', 'colores'));
    }


    //ajax
    public function getProductosCategoria(Request $request)
    {
        $idcategoria = $request->idcategoria;

        $productos = Producto::where('categoria_id', $idcategoria)->orderBy('precio_final', 'asc')->get();

        //
        return view('response.productos', compact('productos'));
    }


    public function getProductosSubcategoria(Request $request)
    {
        $idsubcategoria = $request->idsubcategoria;

        $productos = Producto::where('subcategoria_id', $idsubcategoria)->orderBy('precio_final', 'asc')->get();

        //
        return view('response.productos', compact('productos'));
    }


    public function getProductosMedida(Request $request)
    {
        $idsubcategoria = $request->idsubcategoria;
        $idmedida = $request->idmedida;

        $productos = Producto::whereHas('medidas', function($query) use ($idmedida){
            $query->where('medidas.id', $idmedida);
        })
        ->where('subcategoria_id', $idsubcategoria)
        ->orderBy('precio_final', 'asc')->paginate(16);


        // $doctors = Doctor::with('categories')->whereHas('categories', function ($query) {
        //     $query->where('categories.id', 1);
        // })->get();

        //return response()->json($productos->appends());
        //
        return view('response.productos', compact('productos'));
    }



    public function getProductosRelacionados(Request $request)
    {
        $productos = Producto::all()->random(3);


        return view('response.productosRelacionados', compact('productos'));
    }



    public function searchProducto(Request $request)
    {
        $idcategoria = $request->idcategoria;

        $categoria = Categoria::find($idcategoria);
        if (!$categoria) {
            return redirect('/');
        }
        $productos = Producto::where('categoria_id', $idcategoria)
                    ->where('nombre', 'LIKE', '%'.$request->criterio.'%')
                    ->orderBy('precio_final', 'asc')->paginate(16);

        $pagina = 'productos';
        $categorias = Categoria::orderBy('titulo', 'asc')->get();
        $categoria = Categoria::find($request->idcategoria);


        //return response()->json($productos);

        return view('buscarProductos', compact('productos', 'pagina', 'categorias', 'categoria'));
    }
}
