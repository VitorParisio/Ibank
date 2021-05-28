<?php

namespace App\Classes\Home;

class HomeDTO
{
	private $user;

	public function setUser($user){
		$this->user = $user;
	}

	public function getUser(){
		return $this->user;
	}

}