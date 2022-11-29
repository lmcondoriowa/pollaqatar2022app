<?php

namespace App\Http\Controllers;
use App\Models\Cartilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index(){

        $puntajes = DB::table('cartillas')
        ->join('cartillapartidos', 'cartillas.id', '=', 'cartillapartidos.cartilla_id')
        ->select(DB::raw('sum(cartillapartidos.puntaje) as total_puntaje'), 'cartillas.descripcion as cartillas_descripcion')  
        ->groupBy('cartillas.id','cartillas.descripcion')
        ->orderByRaw('2 Desc')
        ->get();
        
        return view('home',compact('puntajes'));

    }
}
