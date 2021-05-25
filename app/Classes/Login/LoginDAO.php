<?php

namespace App\Classes\Login;
use Auth;

class LoginDAO
{
	public function index()
	{
		return view('bank.login.index');
	}

	public function checkLogin($email, $senha){
		$login = new LoginDTO();

		$login->setEmail($email);
		$login->setPassword($senha);

		$email = $login->getEmail();
		$password = $login->getPassword();

		$user_data = array(
			'email' => $email,
			'password' => $password
		);

		if(Auth::attempt($user_data)){
			return redirect('/home');
		}else{
			return back()->with('error', 'Erro de login e/ou senha!');
		}
	}
}
