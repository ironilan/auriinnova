<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Imports\ProductoImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function cargar()
    {
        if (!Auth::guest()) {
            if (Auth::user()->role == 'admin') {
                return view('dashboard.cargar');
            }
        }
        abort(404);
    }


    public function import_productos(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        $file = $request->file('file');

        Excel::import(new ProductoImport, $file);


        return back()->with('message', 'se ha importado con exito');
    }
}
