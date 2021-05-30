<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Home;

class HomeController extends Controller
{
    public function index(){
    	return Home::index();
	}

    public function logout(){
		return Home::logout();
	}
}
