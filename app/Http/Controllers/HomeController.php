<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
    	$balance = auth()->user()->amount;
    	$amount = $balance ? $balance->amount : 0;

		return view('bank.home.index', compact('amount'));
	}

    public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
