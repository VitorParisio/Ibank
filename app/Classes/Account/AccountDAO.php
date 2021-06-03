<?php

namespace App\Classes\Account;

use App\Classes\Historic\HistoricDTO;

use App\User;
use App\Models\Account;
use App\Models\Historic;
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

		$account_create = Account::create([
			'user_id'        => $user_id,
			'name'           => $name,
			'agency'         => $agency,
			'account_number' => $account_number,
			'type'           => $type,
			'amount'         => $amount,
		]);

		return back()->with('accept', 'Conta cadastrada com sucesso!');
	}

	public function list_account(){
		$title        = "IBank - Lista";
		$user_id	  = Auth::user()->id;
	   	$account_list = Account::join('users', 'users.id', '=', 'accounts.user_id')
	   						->select('accounts.id','accounts.name', 'accounts.agency', 
	   							     'accounts.account_number', 'accounts.type',
	   							     'accounts.amount')
	   						->where('accounts.user_id', $user_id)
	   						->get();

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

		$name   = ucfirst($name);
		$amount = number_format($amount, 2, ',', '.');

		return view('bank.pages.account.update', compact('id', 'name', 'agency', 'account_number', 'type', 'amount', 'title'));
	}

	public function list_update($id, $name, $agency, $account_number, $type, $amount){
		$account_model = Account::find($id);
		$account_dto = new AccountDTO();
		
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
		$data   = [
			'name'           => $name, 
			'agency'         => $agency, 
			'account_number' => $account_number, 
		    'type'           => $type, 
		    'amount'         => $amount,
		];

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
		$historic_dto  = new HistoricDTO();
		$value         = str_replace(",", ".", $value);

		if($value < 0){
			return back()->with('error', 'Preencha o campo corretamente!');
		}

		$historic_dto->setAccountId($id);
		$historic_dto->setType('Entrada');
		$historic_dto->setTotalBefore($account_model->amount);
		$historic_dto->setTotalAfter($account_model->amount += $value);
		$historic_dto->setAmount($value);
		$historic_dto->setDate(date('Ymd'));

		$account_id   = $historic_dto->getAccountId();
		$type         = $historic_dto->getType();
		$total_before = $historic_dto->getTotalBefore();
		$total_after  = $historic_dto->getTotalAfter();
		$amount       = $historic_dto->getAmount();
		$date         = $historic_dto->getDate();
 	 	
 	 	$historic_model = Historic::create([
 	 		'account_id'   => $account_id,
 	 		'type'         => $type,
 	 		'amount'       => $amount,
 	 		'total_before' => $total_before,
 	 		'total_after'  => $total_after,
 	 		'date'         => $date,
 	 	]);

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
		$historic_dto  = new HistoricDTO();
		$value         = str_replace(",", ".", $value);

		if($value < 0){
			return back()->with('error', 'Preencha o campo corretamente!');
		}

		if($account_model->amount < $value){
			return back()->with('error', 'Saldo insufiente!');
		}

		$historic_dto->setAccountId($id);
		$historic_dto->setType('Saída');
		$historic_dto->setTotalBefore($account_model->amount);
		$historic_dto->setTotalAfter($account_model->amount -= $value);
		$historic_dto->setAmount($value);
		$historic_dto->setDate(date('Ymd'));

		$account_id   = $historic_dto->getAccountId();
		$type         = $historic_dto->getType();
		$total_before = $historic_dto->getTotalBefore();
		$total_after  = $historic_dto->getTotalAfter();
		$amount       = $historic_dto->getAmount();
		$date         = $historic_dto->getDate();

		$historic_model = Historic::create([
 	 		'account_id'   => $account_id,
 	 		'type'         => $type,
 	 		'amount'       => $amount,
 	 		'total_before' => $total_before,
 	 		'total_after'  => $total_after,
 	 		'date'         => $date,
 	 	]);

		$account_model->save();
		$historic_model->save();

		return back()->with('accept', 'Saque realizado com sucesso!');
	}

	public function transfer($id){
		$account_dto   = new AccountDTO();
	   	$account_model = Account::find($id);
	   	$title         = "IBank - Trasnferir";

		$account_dto->setName($account_model->name);
		$account_dto->setAmount($account_model->amount);

		$name   = $account_dto->getName();
		$amount = $account_dto->getAmount();

		return view('bank.pages.account.transfer', compact('id', 'name', 'amount', 'title'));
	}

	public function confirm($id, $sender){
		$title       = "IBank - Confirmar";
		$sender      = User::where('name', "LIKE", "%$sender%")
						 ->orWhere('email', $sender)
						 ->get()
						 ->first();
		if(!$sender){
			return redirect()
					->back()
					->with('error', "Usuário não encontrado!");
		}

		if($sender->id === Auth::user()->id){
			return redirect()
				   ->back()
				   ->with('error', "Não é possível transferir para você!");
		}	

		return view('bank.pages.account.confirm', compact('id', 'sender', 'title'));					 
								 
	}

	public function transfer_store($id, $sender, $bank, $balance){
		$account_dto  = new AccountDTO();
		$historic_dto = new HistoricDTO();

		
		$user_bank    = Account::find($id);
		$sender_bank  = Account::where('name', "LIKE", "%$bank%")
								->where('user_id', $sender)
								->get()
							 	->first();

		$userId   = User::find(auth()->user()->id);

		$balance  = str_replace(",", ".", $balance);
		
		$account_dto->setAmount($user_bank->amount);

		$user_amount = $account_dto->getAmount();
		
		if($user_amount < $balance){
			return redirect()
				   ->route('transfer', [$id])
				   ->with('error', 'Saldo insufiente!');
		}

		if(!$sender_bank){
			return redirect()
					->route('transfer', [$id])
					->with('error', "Banco não encontrado!");
		}

		if($balance < 0){
			return redirect()
					->route('transfer', [$id])
					->with('error', 'Preencha o campo corretamente!');
		}

		$historic_dto->setAccountId($user_bank->id);
		$historic_dto->setType('Transferência');
		$historic_dto->setTotalBefore($user_bank->amount);
		$historic_dto->setTotalAfter($user_bank->amount -= $balance);
		$historic_dto->setAmount($balance);
		$historic_dto->setDate(date('Ymd'));

		$user_id           = $historic_dto->getAccountId();
		$user_type         = $historic_dto->getType();
		$user_total_before = $historic_dto->getTotalBefore();
		$user_total_after  = $historic_dto->getTotalAfter();
		$user_amount       = $historic_dto->getAmount();
		$user_date         = $historic_dto->getDate();

		$historic_model_user = Historic::create([
 	 		'account_id'    => $user_id,
 	 		'type'          => $user_type,
 	 		'amount'        => $user_amount,
 	 		'total_before'  => $user_total_before,
 	 		'total_after'   => $user_total_after,
 	 		'date'          => $user_date,
 	 	]);

		$historic_dto->setAccountId($sender_bank->id);
		$historic_dto->setType('Entrada');
		$historic_dto->setTotalBefore($sender_bank->amount);
		$historic_dto->setTotalAfter($sender_bank->amount += $balance);
		$historic_dto->setAmount($balance);
		$historic_dto->setDate(date('Ymd'));

		$sender_id           = $historic_dto->getAccountId();
		$sender_type         = $historic_dto->getType();
		$sender_total_before = $historic_dto->getTotalBefore();
		$sender_total_after  = $historic_dto->getTotalAfter();
		$sender_amount       = $historic_dto->getAmount();
		$sender_date         = $historic_dto->getDate();
		
		$historic_model_sender = Historic::create([
 	 		'account_id'    => $sender_id,
 	 		'type'          => $sender_type,
 	 		'amount'        => $sender_amount,
 	 		'total_before'  => $sender_total_before,
 	 		'total_after'   => $sender_total_after,
 	 		'date'          => $sender_date,
 	 	]);

		$user_bank->save();
		$sender_bank->save();

		return redirect()
				->route('home')
				->with('accept', "Transferencia realida com sucesso!"); 
	}

	public function delete($id){
		$account_model = Account::find($id);

		$account_model->delete();

		return back()->with('accept', 'Conta deletada com sucesso!');
	}
}