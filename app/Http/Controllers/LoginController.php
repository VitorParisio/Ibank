<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Login;

class LoginController extends Controller
{
    public function index()
	{
		return Login::index();
	}

	public function checkLogin(Request $request){
		return Login::checkLogin($request->get('email'), $request->get('password'));
	}
	
}
