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
        //$categoria = Categoria::first();
        return view('productos', compact('pagina', 'categorias')); 
    }


    public function getProductosAll()
    {
        // if (count(Producto::all()) > 20) {
        //     $productos = Producto::all()->random(20);
        // }else{
        //     $productos = Producto::get()->take(20);
        // }

        $productos = Producto::paginate(20);
        
        //return response()->json($productos);
        return view('response.productos', compact('productos'));
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

        //dd($producto);


        return view('producto', compact('producto', 'pagina', 'colores'));
    }


    //ajax
    public function getProductosCategoria(Request $request)
    {
        $idcategoria = $request->idcategoria;

        $productos = Producto::where('categoria_id', $idcategoria)->orderBy('precio_final', 'asc')->paginate(20);

        //
        return view('response.productos', compact('productos', 'idcategoria'));
    }


    public function getProductosSubcategoria(Request $request)
    {
        $idsubcategoria = $request->idsubcategoria;

        $productos = Producto::where('subcategoria_id', $idsubcategoria)->orderBy('precio_final', 'asc')->paginate(20);

        //return response()->json($productos);
        //
        return view('response.productosSubcategoria', compact('productos', 'idsubcategoria'));
    }


    public function getProductosMedida(Request $request)
    {
        $idsubcategoria = $request->idsubcategoria;
        $idmedida = $request->idmedida;

        $productos = Producto::whereHas('medidas', function($query) use ($idmedida){
            $query->where('medidas.id', $idmedida);
        })
        ->where('subcategoria_id', $idsubcategoria)
        ->orderBy('precio_final', 'asc')->paginate(100);


        // $doctors = Doctor::with('categories')->whereHas('categories', function ($query) {
        //     $query->where('categories.id', 1);
        // })->get();

        //return response()->json($productos->appends());
        //
        return view('response.productos', compact('productos', 'idsubcategoria'));
    }



    public function getProductosRelacionados(Request $request)
    {
        $productos = Producto::all();

        if (count($productos) > 19) {
            $productos = Producto::all()->random(20);
        }else{
            $productos = [];
        }
        


        return view('response.productosRelacionados', compact('productos'));
    }



    public function searchProducto(Request $request)
    {
        if (!$request->criterio and isset($request->idcategoria)) {
            return redirect('/');
        }

        $idcategoria = $request->idcategoria;

        $categoria = Categoria::find($idcategoria);
        if (!$categoria) {
            $productos = Producto::where('nombre', 'LIKE', '%'.$request->criterio.'%')
                    ->orderBy('precio_final', 'asc')->paginate(20);
        }else{
            $productos = Producto::where('categoria_id', $idcategoria)
                    ->where('nombre', 'LIKE', '%'.$request->criterio.'%')
                    ->orderBy('precio_final', 'asc')->paginate(20);
        }
        

        $pagina = 'productos';
        $categorias = Categoria::orderBy('titulo', 'asc')->get();
        $categoria = Categoria::find($request->idcategoria);


        //return response()->json($productos);

        return view('buscarProductos', compact('productos', 'pagina', 'categorias', 'categoria'));
    }
}
