<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Grupo;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaisesExport;


class PaisController extends Controller
{
    function index(){
        $paises = Pais::all();
        return view('pais.index', compact('paises'));
    }

    function nuevo(){
    	$grupos = Grupo::all();
    	return view('pais.nuevo', compact('grupos'));
    }

    function guardar(Request $request){
    	$pais = new Pais;
    	$pais->grupo_id = $request->grupo;
    	$pais->nombre = $request->nombre;
    	$bandera = $request->file('bandera');
    	if($bandera){
        	// Obtenemos el nombre original del archivo
            $pais->bandera = $bandera->getClientOriginalName();
            // Guardamos el archivo en el disco public
            $bandera->storeAs('public', $pais->bandera);
        }
    	$pais->save();
    	return redirect('/paises');
    }

    function mostrar($id){
    	$pais = Pais::find($id);
    	$grupos = Grupo::all();
    	return view('pais.detalle', compact('pais','grupos'));
    }

    function editar(Request $request){
    	$id = $request->id;
    	$pais = Pais::find($id);
    	$pais->grupo_id = $request->grupo;
    	$pais->nombre = $request->nombre;
    	$pais->bandera = $request->bandera;
    	$pais->estado = $request->estado;

    	$bandera = $request->file('bandera');
    	if($bandera){
        	// Elimina si la imagen actual no es default.jpg
        	if($request->banderaActual!='default.jpg'){
            	// Eliminamos la imagen actual del libro
            	\Storage::delete('public/'.$request->banderaActual);
        	}
        	$fecha = date('Y-m-y_His');
        	// Obtenemos la extensión del archivo
        	$ext = $bandera->extension();
        	// Asignamos el nombre del archivo
        	$pais->bandera = "pais_" . $request->nombre . "_$fecha.$ext";
        	// Subimos la nueva imagen
        	$bandera->storeAs('public', $pais->bandera);
    	}



    	$pais->save();
    	return redirect('/paises');
    }
    function eliminar($id){
    	$pais = Pais::find($id);
    	$pais->delete();
    	return redirect('/paises');
    }

	function exportarExcel(){
    	$hoy = date('dmYhis');
    	$nombreArchivo = "reporte_pais_$hoy.xlsx";
    	return Excel::download(new PaisesExport, $nombreArchivo);
	}



}
