<?php



use App\Http\Controllers\frontend\CategoriaController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\MailController;
use App\Http\Controllers\frontend\MedidaController;
use App\Http\Controllers\frontend\ProductoController;
use App\Http\Controllers\frontend\SubcategoriaController;
use App\Http\Controllers\frontend\UnidadController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros'); 


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/unidades/{unidad}', [UnidadController::class, 'show'])->name('unidades.show');

Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::get('/terminos-y-condiciones', [HomeController::class, 'terminos'])->name('terminos');
Route::get('/politicas-de-privacidad', [HomeController::class, 'politicas'])->name('politicas');


Route::post('/contacto', [MailController::class, 'contacto'])->name('contacto.send');


Route::get('categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('subcategorias/{subcategoria}', [SubcategoriaController::class, 'show'])->name('subcategorias.show');

Route::get('buscar', [ProductoController::class, 'searchProducto'])->name('searchProducto');

//ajax
Route::get('getCategorias', [HomeController::class, 'getCategorias'])->name('getCategorias');
Route::get('getNovedades', [HomeController::class, 'getNovedades'])->name('getNovedades');

Route::get('getProductosCategoria', [ProductoController::class, 'getProductosCategoria'])->name('getProductosCategoria');

Route::get('getProductosSubcategoria', [ProductoController::class, 'getProductosSubcategoria'])->name('getProductosSubcategoria');

Route::get('getSubcategoriaMedidas', [MedidaController::class, 'getSubcategoriaMedidas'])->name('getSubcategoriaMedidas');

Route::get('getProductosMedida', [ProductoController::class, 'getProductosMedida'])->name('getProductosMedida');
Route::get('getProductosRelacionados', [ProductoController::class, 'getProductosRelacionados'])->name('getProductosRelacionados');


Route::get('producto_ajax', [ProductoController::class, 'producto_ajax'])->name('producto_ajax');