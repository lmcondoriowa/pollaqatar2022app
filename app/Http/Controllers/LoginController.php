<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');

            //return redirect()->intended('dashboard')->withSuccess('Signed in');

        }else{
            return redirect()->intended('auth.login');
        }

        //return redirect("login")->withSuccess('Login details are not valid');

    }

    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'role' => $data['role'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout(Request $request){
    	Auth::logout();
    	return redirect('/');
    }

}
