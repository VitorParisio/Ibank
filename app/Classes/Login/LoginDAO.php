<?php

namespace App\Classes\Login;
use Auth;

class LoginDAO
{
	public function index()
	{
		return view('bank.pages.login.index');
	}

	public function checkLogin($email, $senha){
		$login_dto = new LoginDTO();

		$login_dto->setEmail($email);
		$login_dto->setPassword($senha);

		$email    = $login_dto->getEmail();
		$password = $login_dto->getPassword();

		$user_data = array(
			'email'    => $email,
			'password' => $password
		);

		if(Auth::attempt($user_data)){
			return redirect('/home');
		}else{
			return back()->with('error', 'Erro de login e/ou senha!');
		}
	}
}
