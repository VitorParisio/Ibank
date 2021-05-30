<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Register extends Facade
{
	protected static function getFacadeAccessor(){
		return 'register';
	}
}