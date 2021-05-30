<?php

namespace App\Classes\Historic;

use App\Models\Account;
use App\Models\Historic;
use Auth;

class HistoricDAO
{
	public function index(){
		$user_id 	   = Auth::user()->id;
		$title         = "IBank - Relatório";
		$historic_model = Historic::join('accounts', 'accounts.id', '=', 'historics.account_id')
						->select('accounts.name', 'historics.id', 'historics.type', 'historics.amount', 
							'historics.total_before', 'historics.total_after', 'historics.date')
						->where('accounts.user_id', $user_id)
						->get();	
		
		return view('bank.pages.historic.index', compact('historic_model', 'title'));
	}

	public function del($id){
		$historic_model = Historic::find($id);

		$historic_model->delete();

		return back()->with('accept', 'Registro deletado com sucesso!');
	}
}
