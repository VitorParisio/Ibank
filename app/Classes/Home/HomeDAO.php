<?php

namespace App\Classes\Home;
use Auth;
Use App\Models\Account;

class HomeDAO
{
	public function index()
	{
		$home_dto = new HomeDTO();
		$user     = Auth::user()->id;
		$title    = "IBank - Home";
		$home_dto->setUser($user);

		$user_id = $home_dto->getUser($user);

	   	$balance_account = Account::join('users', 'users.id', '=', 'accounts.user_id')
	   						->select('accounts.id', 'accounts.name', 'accounts.amount')
	   						->where('users.id', $user_id)
	   						->paginate(8);

		return view('bank.pages.home.index', compact('balance_account', 'title'));
	}

	public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
