<?php

use App\Models\Categoria;
use App\Models\Config;
use App\Models\Unidad;


function setting()
{
	
	return Config::get()->last();
}



function categorias()
{
	
	return Categoria::where('menu', 'si')->orderBy('titulo', 'asc')->get();
}

function unidades()
{
	
	return Unidad::orderBy('titulo', 'asc')->get();
}