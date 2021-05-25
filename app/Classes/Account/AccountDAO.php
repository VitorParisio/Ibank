<?php

namespace App\Classes\Account;

use App\Models\Account;
use Auth;

class AccountDAO
{
	public function index()
	{
		return view('bank.account.index');
	}

	public function add($name, $agency, $account_number, $type)
	{
		$add = new AccountDTO();
		$user_id = Auth::user()->id;

		$add->setName($name);
		$add->setAgency($agency);
		$add->setAccountNumber($account_number);
		$add->setType($type);

		$name = $add->getName();
		$agency = $add->getAgency();
		$account_number = $add->getAccountNumber();
		$type = $add->getType();

		$account = Account::create([
			'user_id' => $user_id,
    		'name' => $name,
    		'agency' => $agency,
    		'account_number' => $account_number,
    		'type' => $type
		]);

		$account->save();

		return back()->with('message', 'Conta cadastrada com sucesso!');
	}
}
