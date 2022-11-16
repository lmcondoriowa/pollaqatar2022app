<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
	function index(){
    	$usuarios = User::all();
    	return view('usuario.index', compact('usuarios'));
	}
}
