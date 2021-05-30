<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Account;
use App\User;

class AccountController extends Controller
{

    public function index(){

    	return Account::index();
    }

    public function add(Request $request){

    	return Account::add($request->get('name'), $request->get('agency'), 
                        $request->get('account_number'), 
                        $request->get('type'), $request->get('amount'));
    }

    public function list_account(){

        return Account::list_account();
    }

    public function list_edit($id){

        return Account::list_edit($id);
    }

    public function list_update($id, Request $request){

        return Account::list_update($id, $request->get('name'), $request->get('agency'), 
                        $request->get('account_number'), 
                        $request->get('type'), $request->get('amount'));
    }

    public function deposit_edit($id){

    	return Account::deposit_edit($id);
    }

    public function deposit_update($id, Request $request){

    	return Account::deposit_update($id, $request->get('deposit'));
    }

    public function retire_edit($id){

        return Account::retire_edit($id);
    }

    public function retire_update($id, Request $request){

        return Account::retire_update($id, $request->get('retire'));
    }

    public function transfer($id){

        return Account::transfer($id);
    }

    public function confirm($id, Request $request){

        return Account::confirm($id, $request->get('sender'));
    }

    public function transfer_store($id, Request $request){

    return Account::transfer_store($id,  $request->get('sender_id'), $request->get('bank'), $request->get('balance')); 
    }

    public function delete($id){

        return Account::delete($id);
    }
}
