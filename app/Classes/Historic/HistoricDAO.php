<?php

namespace App\Classes\Historic;

use App\Models\Account;
use App\Models\Historic;
use Auth;

class HistoricDAO
{
	public function index(){
		$title = "IBank - Relatório";
		$user_id 	    = Auth::user()->id;
		$title          = "IBank - Relatório";
		$historic_model = Historic::join('accounts', 'accounts.id', '=', 'historics.account_id')
						->select('accounts.name', 'historics.id', 'historics.type', 'historics.amount', 
							'historics.total_before', 'historics.total_after', 'historics.date')
						->where('accounts.user_id', $user_id)
						->get();
		$historic_chart = Historic::select('amount', 'date')->get();
		$amount         = "";
       	$date           = "";

        foreach ($historic_chart as $value) {
             $amount = $value['amount'];
             $date   = $value['date'];
        }

       return view('bank.pages.historic.index', compact('historic_model', 'title'))
       		    ->with('amount',json_encode($amount))
       		    ->with('date',json_encode($date));		
	}

	public function del($id){
		$historic_model = Historic::find($id);

		$historic_model->delete();

		return back()->with('accept', 'Registro deletado com sucesso!');
	}
}
