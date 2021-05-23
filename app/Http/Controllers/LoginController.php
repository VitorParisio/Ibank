<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function index()
	{
		return view('bank.login.index');
	}

	public function checkLogin(Request $request){
		$this->validate($request,[
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:3'
		]);

		$user_data = array(
			'email' => $request->get('email'),
			'password' => $request->get('password')
		);

		if(Auth::attempt($user_data)){
			return redirect('/home');
		}else{
			return back()->with('error', 'Erro de login e/ou senha!');
		}
	}
	
}
