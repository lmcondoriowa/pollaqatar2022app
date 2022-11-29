<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Pais;
use App\Models\CartillaPartido;

class PartidoController extends Controller
{
	function index(){
        //$pais_local = Pais::all();
        //$pais_visitante = Pais::all();
        $partidos = Partido::all();
        //return view('partido.index', compact('pais_local','pais_visitante'));
        return view('partido.index', compact('partidos'));
    }

    function nuevo(){
    	$pais_locales = Pais::all();
        $pais_visitantes = Pais::all();
    	return view('partido.nuevo', compact('pais_locales','pais_visitantes'));
    }

    function guardar(Request $request){
    	$partido = new Partido;
    	$partido->pais_local_id = $request->pais_local;
        $partido->pais_visitante_id = $request->pais_visitante;
    	$partido->local_goal = $request->local_goal;
    	$partido->visitante_goal = $request->visitante_goal;
    	$partido->fecha_partido = $request->fecha_partido;
    	$partido->save();
    	return redirect('/partidos');
    }

    function mostrar($id){
    	$partido = Partido::find($id);
    	$pais_locales = Pais::all();
        $pais_visitantes = Pais::all();
    	return view('partido.detalle', compact('partido','pais_locales','pais_visitantes'));
    }

    function editar(Request $request){
    	$id = $request->id;
    	$partido = Partido::find($id);
    	$partido->pais_local_id = $request->pais_local;
        $partido->pais_visitante_id = $request->pais_visitante;
    	$partido->local_goal = $request->local_goal;
    	$partido->visitante_goal = $request->visitante_goal;
    	$partido->fecha_partido = $request->fecha_partido;
        $partido->estado = $request->estado;

		if ( !is_null($partido->local_goal) && !is_null($partido->local_goal) ){
			if ($request->local_goal > $request->visitante_goal ) {
				$partido->valoracion	= 'L';
			} else {
				if ($request->visitante_goal > $request->local_goal ) {
					$partido->valoracion	= 'V';
				} else {
					$partido->valoracion	= 'E';
				}
			}
			$partido->estado = "C";
		}

    	$partido->save();

		if (!is_null($partido->valoracion)) {
			$this->valorarCartillaPartido($request->id);
		}
		
    	return redirect('/partidos');
    }

	function valorarCartillaPartido($partido_id){
		$partido = Partido::find($partido_id);
		$cartillaPartidos = CartillaPartido::where('partido_id', $partido_id)->get();

		foreach ($cartillaPartidos as $item) {
			$item->puntaje = 0;
			if ($partido->valoracion == $item->valoracion) {
				$item->puntaje = $item->puntaje + 2;
			}

			if ($partido->local_goal == $item->local_goal && $partido->visitante_goal == $item->visitante_goal) {
				$item->puntaje = $item->puntaje + 2;
			}
			
			$item->save();
		}

	}


}
