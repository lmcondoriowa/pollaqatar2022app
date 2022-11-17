<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PaisController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
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

Route::group(['middleware'=>'auth'],function(){
	Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::get('/usuarios', [UserController::class, 'index'])->name('usuario.index');
});
