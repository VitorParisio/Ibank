<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Login extends Facade
{
	protected static function getFacadeAccessor(){
		return 'login';
	}
}