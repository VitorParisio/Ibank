<?php

namespace App\Classes\Register;

use App\Models\Register;
use App\User;

class RegisterDAO
{
	public function index(){

		$title = "IBank - Novo usuário";
		return view('bank.pages.register.index', compact('title'));
	}

	public function register($name, $lastname, $email, $password){
		$register_dto = new RegisterDTO();

		$verify_email = User::select('email')->get();

		$register_dto->setName($name);
		$register_dto->setLastName($lastname);
		$register_dto->setEmail($email);
		$register_dto->setPassword($password);

		$name     = $register_dto->getName();
		$lastname = $register_dto->getLastName();
		$email    = $register_dto->getEmail();
		$password = $register_dto->getPassword();

		$password = bcrypt($password);

		$register_create = User::create([
			'name'     => $name,
			'lastname' => $lastname,
			'email'    => $email,
			'password' => $password,
		]);

		return back()->with('accept', 'Usuário cadastrado com sucesso!');
	}

}
