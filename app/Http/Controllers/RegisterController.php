<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Register;

class RegisterController extends Controller
{
    public function index(){
    	return Register::index(); 
    }

    public function register(Request $request){
    	return Register::register($request->get('name'), $request->get('lastname'),
    							 $request->get('email'), 
    							 $request->get('password'));
    }
}
