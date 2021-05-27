<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\Models\Account;

class HomeController extends Controller
{
    public function index(){
    	$user_id = Auth::user()->id;
	   	$balance_account = Account::join('users', 'users.id', '=', 'accounts.user_id')
	   						->select('accounts.id', 'accounts.name', 'accounts.amount')
	   						->where('users.id', $user_id)
	   						->get();

		return view('bank.pages.home.index', compact('balance_account'));
	}

    public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
