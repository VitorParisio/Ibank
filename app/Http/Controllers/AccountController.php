<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Account;

class AccountController extends Controller
{

    public function index(){

    	return Account::index();
    }

    public function add(Request $request){
    	return Account::add($request->get('name'), $request->get('agency'), $request->get('account_number'), $request->get('type'));
    }
}
