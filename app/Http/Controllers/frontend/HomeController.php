<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\SuscribrirMail;
use App\Models\Banner;
use App\Models\Bannercategoria;
use App\Models\Bannergroup;
use App\Models\Bannerinferior;
use App\Models\Bannerproductos;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Valor;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $pagina = 'inicio';
        $banners = Banner::orderBy('id', 'desc')->get();
        $bannerinferior = Bannerinferior::orderBy('id', 'desc')->get();
        $bannergroup = Bannergroup::orderBy('id', 'desc')->get();
        $clientes = Cliente::orderBY('titulo', 'asc')->get();
        $productos = Producto::all();
        if (count($productos) > 0) {
            $productos = Producto::all()->random(15);
        }else{
            $productos = [];
        }
        return view('welcome', compact('pagina', 'banners', 'clientes', 'bannergroup', 'bannerinferior', 'productos'));
    }

    public function nosotros()
    {
        $pagina = 'nosotros';
        $nosotros = Empresa::get()->last();
        $valores = Valor::orderBy('id', 'desc')->get();
        return view('nosotros', compact('pagina', 'nosotros', 'valores'));
    }


    public function terminos()
    {
        $pagina = 'terminos';
        return view('terminos', compact('pagina'));
    }


    public function politicas()
    {
        $pagina = 'politicas';
        return view('politicas', compact('pagina'));
    }

    
    public function contacto()
    {
        $pagina = 'contacto';
        
        return view('contacto', compact('pagina'));
    }


    public function getCategorias()
    {
        $categorias = Categoria::where('bannergroup', 'si')->orderBy('id', 'desc')->get();
        //dd('ssss');
        return view('response.categorias', compact('categorias'));
    }

    public function getNovedades()
    {
        $novedades = Producto::where('nuevo', 'si')->orderBy('id', 'desc')->get();

        return view('response.novedades', compact('novedades'));
    }


    public function getBannerProductos()
    {
        $banners = Bannerproductos::orderBy('id', 'desc')->get();
        //dd($banners);
        return view('response.bannerProductos', compact('banners'));
    }

    public function getBannerCategorias(Request $request)
    {
        $banners = Bannercategoria::where('categoria_id', $request->categoria_id)->orderBy('id', 'desc')->get();

        return view('response.bannerProductos', compact('banners'));
    }


    public function suscribir(Request $request)
    {
        //return $request->all();
        $message = $this->validate($request, [
            'email' => 'required'
        ]);

        $email = 'suscripcion@auri.com.pe';

        Mail::to($email)->send(new SuscribrirMail($message));

        return response()->json(['msj' => 'enviado'],200);
    }
}
