<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
	function index(){
        //$grupos = Grupo::all(); // Lista todos los registros
        // Lista todos los registor segun el nombre alfabeticamente
        $grupos = Grupo::orderBy('nombre')->get();
        return view('grupo.index', compact('grupos'));
    }


	function nuevo(){
        // Obtengo la lista ordenada por nombre
        // de todos los generos cuyo estado es activo

        return view('grupo.nuevo');
    }

    function guardar(Request $request){
        $grupo = new Grupo;
        //$grupo->genero_id = $request->genero;
        $grupo->nombre = $request->nombre;
        $grupo->save();
        return redirect('/grupos');
    }


    function mostrar($id){
    	// SELECT * FROM grupo WHERE id=$id
    	$grupo = Grupo::find($id);
    	return view('grupo.mostrar', compact('grupo'));
    }

    function editar(Request $request){
        $id = $request->id;
        $grupo = Grupo::find($id);
        $grupo->nombre = $request->nombre;
        $grupo->estado = $request->estado;
        $grupo->save();
        return redirect('/grupos');
    }

    function eliminar($id){
    	$grupo = Grupo::find($id);
    	$grupo->delete();
    	return redirect('/grupos');
    }

}
