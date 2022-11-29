<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\CartillaController;

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

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cartillas', [CartillaController::class, 'index'])->name('cartilla.index');;

Route::get('/partidos',[PartidoController::class, 'index'])->name('partido.index');

Route::group(['middleware'=>'auth'],function(){
	Route::get('/usuarios', [UserController::class, 'index'])->name('usuario.index');

	Route::get('/registration', [LoginController::class, 'registration'])->name('registration');

	Route::get('/grupos', [GrupoController::class, 'index']);
	Route::get('/grupo/nuevo', [GrupoController::class, 'nuevo']);
	Route::post('/grupo/guardar', [GrupoController::class, 'guardar']);
	Route::get('/grupo/mostrar/{id}', [GrupoController::class, 'mostrar']);
	Route::post('/grupo/editar', [GrupoController::class, 'editar']);
	Route::get('/grupo/eliminar/{id}', [GrupoController::class, 'eliminar']);
	
	Route::get('/paises', [PaisController::class, 'index'])->name('pais.index');
	Route::get('/paises/nuevo',[PaisController::class, 'nuevo'])->name('pais.nuevo');
	Route::post('/paises/guardar',[PaisController::class, 'guardar'])->name('pais.guardar');
	Route::get('/paises/detalle/{id}',[PaisController::class, 'mostrar'])->name('pais.mostrar');
	Route::post('/paises/editar',[PaisController::class, 'editar'])->name('pais.editar');
	Route::get('/paises/eliminar/{id}',[PaisController::class, 'eliminar'])->name('pais.eliminar');
	Route::get('/paises/exportar/excel',[PaisController::class, 'exportarExcel'])->name('pais.excel');
	
	Route::get('/partidos/nuevo',[PartidoController::class, 'nuevo'])->name('partido.nuevo');
	Route::post('/partidos/guardar',[PartidoController::class, 'guardar'])->name('partido.guardar');
	Route::get('/partidos/detalle/{id}',[PartidoController::class, 'mostrar'])->name('partido.mostrar');
	Route::post('/partidos/editar',[PartidoController::class, 'editar'])->name('partido.editar');
	
	
	Route::get('/cartillas/nuevo', [CartillaController::class, 'nuevo'])->name('cartilla.nuevo');;
	Route::post('/cartillas/guardar', [CartillaController::class, 'guardar'])->name('cartilla.guardar');;
	Route::get('/cartillas/detalle/{id}',[CartillaController::class, 'mostrar'])->name('cartilla.mostrar');
	Route::post('/cartillas/editar',[CartillaController::class, 'editar'])->name('cartilla.editar');
	Route::get('/cartillas/exportar/pdf/{id}',[CartillaController::class, 'exportarCartillaPDF'])->name('cartilla.pdf');
	
});
