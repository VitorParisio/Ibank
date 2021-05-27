<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Historic extends Facade
{
	protected static function getFacadeAccessor(){
		return 'historic';
	}
}