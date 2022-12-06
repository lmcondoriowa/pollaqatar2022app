<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartilla;
use App\Models\CartillaPartido;
use App\Models\Partido;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

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

			if ($local_goal[$cont] > $visitante_goal[$cont] ) {
				$detallepartido->valoracion	= 'L';
			} else {
				if ($visitante_goal[$cont] > $local_goal[$cont] ) {
					$detallepartido->valoracion	= 'V';
				} else {
					$detallepartido->valoracion	= 'E';
				}
			}
			
				

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

	function exportarCartillaPDF($id){
    	$cartilla = Cartilla::find($id);

		//$cartillaPartidos = CartillaPartido::where('cartilla_id', '=', $id)->first();
		//$cartillaPartidos = Cartilla::find($id)->cartillapartidos;

		$partidos = DB::table('cartillapartidos')
			->join('partidos', 'cartillapartidos.partido_id', '=', 'partidos.id')
			->join('paises as paises_local', 'partidos.pais_local_id', '=', 'paises_local.id')
			->join('paises as paises_visitante', 'partidos.pais_visitante_id', '=', 'paises_visitante.id')
			->join('grupos', 'paises_local.grupo_id', '=', 'grupos.id')
			->select('cartillapartidos.id as cartillapartidos_id',
				'cartillapartidos.partido_id as cartillapartidos_partido_id',
				'partidos.fecha_partido as partidos_fecha_partido',
				'grupos.nombre as grupos_nombre',
				'paises_local.nombre as paises_local_nombre',
				'paises_local.bandera as paises_local_bandera',
				'cartillapartidos.local_goal as cartillapartidos_local_goal',
				'cartillapartidos.local_goal_penal as cartillapartidos_local_goal_penal',
				'partidos.local_goal as partidos_local_goal',
				'partidos.local_goal_penal as partidos_local_goal_penal',
				'paises_visitante.nombre as paises_visitante_nombre',
				'paises_visitante.bandera as paises_visitante_bandera',
				'cartillapartidos.visitante_goal as cartillapartidos_visitante_goal',
				'cartillapartidos.visitante_goal_penal as cartillapartidos_visitante_goal_penal',
				'partidos.visitante_goal as partidos_visitante_goal',
				'partidos.visitante_goal_penal as partidos_visitante_goal_penal',
				'cartillapartidos.puntaje as cartillapartidos_puntaje')
			->where('cartillapartidos.cartilla_id', $id)
			->orderBy('partidos.fecha_partido', 'asc')
			->orderBy('grupos.nombre', 'asc')
			->get();


    	$pdf = PDF::loadView('cartilla.pdf', compact('cartilla','partidos'));
    	$nombreArchivo = "cartilla_cod$id.pdf";
    	return $pdf->stream($nombreArchivo);
	}


}
