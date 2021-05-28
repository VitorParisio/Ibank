<?php

namespace App\Classes\Account;

use App\Models\Account;
use Auth;

class AccountDAO
{
	public function index()
	{
		$title = "IBank - Adiconar conta";
		return view('bank.pages.account.index', compact('title'));
	}

	public function add($name, $agency, $account_number, $type, $amount)
	{
		$account_dto = new AccountDTO();
		$user_id     = Auth::user()->id;

		$account_dto->setName($name);
		$account_dto->setAgency($agency);
		$account_dto->setAccountNumber($account_number);
		$account_dto->setType($type);
		$account_dto->setAmount($amount);

		$name           = $account_dto->getName();
		$agency         = $account_dto->getAgency();
		$account_number = $account_dto->getAccountNumber();
		$type           = $account_dto->getType();
		$amount         = $account_dto->getAmount();

		$amount = str_replace(",", ".", $amount);

		if($agency < 0 || $account_number < 0 || $amount < 0){
			return back()->with('error', 'Preencha os campos corretamente!');
		}

		$account_model = Account::create([
			'user_id'        => $user_id,
			'name'           => $name,
			'agency'         => $agency,
			'account_number' => $account_number,
			'type'           => $type,
			'amount'         => $amount
		]);

		$account_model->save();

		return back()->with('accept', 'Conta cadastrada com sucesso!');
	}

	public function list_account(){
		$title        = "IBank - Lista";
		$user_id	  = Auth::user()->id;
	   	$account_list = Account::join('users', 'users.id', '=', 'accounts.user_id')
	   						->select('accounts.id','accounts.name', 'accounts.agency', 'accounts.account_number',	  'accounts.type','accounts.amount')
	   						->where('users.id', $user_id)
	   						->paginate(8);

	   	return view('bank.pages.account.list', compact('account_list', 'title'));
	}

	public function list_edit($id){
		$account_dto   = new AccountDTO();
	   	$account_model = Account::find($id);
	   	$title         = "IBank - Editar";

	   	$account_dto->setName($account_model->name);
	   	$account_dto->setAgency($account_model->agency);
	   	$account_dto->setAccountNumber($account_model->account_number);
	   	$account_dto->setType($account_model->type);
		$account_dto->setAmount($account_model->amount);

		$name   		= $account_dto->getName();
		$agency 		= $account_dto->getAgency();
		$account_number = $account_dto->getAccountNumber();
		$type           = $account_dto->getType();
		$amount 		= $account_dto->getAmount();

		$name = ucfirst($name);
		$amount = number_format($amount, 2, ',', '.');

		return view('bank.pages.account.update', compact('id', 'name', 'agency', 'account_number', 'type', 'amount', 'title'));
	}

	public function list_update($id, $name, $agency, $account_number, $type, $amount){
		$account_model =  Account::find($id);
		$amount        = str_replace(",", ".", $amount);
		$data 		   = ['name' => $name, 'agency' => $agency, 'account_number' => $account_number, 
						'type' => $type, 'amount' => $amount];

		if($agency < 0 || $account_number < 0 || $amount < 0 ){
			return back()->with('error', 'Preencha os campos corretamente!');
		}
		
		$account_model->update($data);

		return back()->with('accept', 'Conta atualizada com sucesso!');
	}

	public function deposit_edit($id){
		$account_dto   = new AccountDTO();
		$account_model = Account::find($id);
		$title         = "IBank - Recarga";

		$account_dto->setName($account_model->name);
		$account_dto->setAmount($account_model->amount);

		$name   = $account_dto->getName();
		$amount = $account_dto->getAmount();

		return view('bank.pages.account.deposit', compact('id', 'name', 'amount', 'title'));
	}

	public function deposit_update($id, $value){
		$account_model = Account::find($id);
		$value         = str_replace(",", ".", $value);

		if($value < 0){
			return back()->with('error', 'Preencha o campo corretamente!');
		}

		$account_model->amount += $value;

		$account_model->save();

		return back()->with('accept', 'Deposito realizado com sucesso!');
	}

	public function retire_edit($id){
		$account_dto   = new AccountDTO();
		$account_model = Account::find($id);
		$title         = "IBank - Retirada";

		$account_dto->setName($account_model->name);
		$account_dto->setAmount($account_model->amount);

		$name   = $account_dto->getName();
		$amount = $account_dto->getAmount();

		return view('bank.pages.account.retire', compact('id', 'name', 'amount', 'title'));
	}

	public function retire_update($id, $value){
		$account_model = Account::find($id);
		$amount        = $account_model->amount;
		$value         = str_replace(",", ".", $value);

		if($value < 0){
			return back()->with('error', 'Preencha o campo corretamente!');
		}

		if($value > $amount){
			return back()->with('error', 'Saldo insufiente para retirada!');
		}

		$account_model->amount -= $value;

		$account_model->save();

		return back()->with('accept', 'Retirada realizada com sucesso!');
	}

	public function delete($id){
		$account_model = Account::find($id);

		$account_model->delete();

		return back()->with('accept', 'Conta deletada com sucesso!');
	}
}
