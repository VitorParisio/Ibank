<?php

namespace App\Classes\Register;

class RegisterDTO
{
	private $name;
	private $lastname;
	private $email;
	private $password;

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setLastName($lastname){
		$this->lastname = $lastname;
	}

	public function getLastName(){
		return $this->lastname;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}
}