<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartilla;
use App\Models\CartillaPartido;
use App\Models\Partido;
use App\Models\User;

class CartillaController extends Controller
{
	function index(){
        $cartillas = Cartilla::all(); // Lista todos los registros
        //$cartillas = Cartilla::orderBy('nombre')->get();
        return view('cartilla.index', compact('cartillas'));
    }
    
    function nuevo(){
    	$users = User::all();
		$partidos = Partido::all();
    	return view('cartilla.nuevo', compact('users','partidos'));
    }

    function guardar(Request $request){
    	$cartilla = new Cartilla;
    	$cartilla->user_id = $request->user;
    	$cartilla->descripcion = $request->descripcion;
    	$cartilla->save();

		$idpartido = $request->idpartido;
		$local_goal = $request->local_goal;
		$visitante_goal = $request->visitante_goal;

		$cont = 0;

		while($cont < count($idpartido))
		{
			$detallepartido = new CartillaPartido();
			$detallepartido->cartilla_id = $cartilla->id;
			$detallepartido->partido_id	=	$idpartido[$cont];
			$detallepartido->local_goal	=	$local_goal[$cont];
			$detallepartido->visitante_goal	=	$visitante_goal[$cont];
			$detallepartido->save();
			$cont=$cont+1;
		}


    	return redirect('/cartillas');
    }

    function mostrar($id){
    	$cartilla = Cartilla::find($id);
    	$users = User::all();
    	return view('cartilla.detalle', compact('cartilla','users'));
    }

    function editar(Request $request){
    	$id = $request->id;
    	$cartilla = Cartilla::find($id);
    	$cartilla->user_id = $request->user;
    	$cartilla->descripcion = $request->descripcion;
    	$cartilla->estado = $request->estado;
    	$cartilla->save();
    	return redirect('/cartillas');
    }

    function eliminar($id){
        $cartilla = Cartilla::find($id);
        $cartilla->delete();
        return redirect('/cartillas');
    }

	function agregarPartidos(){

	}

}
