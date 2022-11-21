<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartilla;

class CartillaController extends Controller
{
	function index(){
        $cartillas = Cartilla::all(); // Lista todos los registros
        //$cartillas = Cartilla::orderBy('nombre')->get();
        return view('genero.index', compact('generos'));
    }

}
