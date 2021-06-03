<?php
namespace App\Classes\Historic;

class HistoricDTO
{
	private $account_id;
	private $type;
	private $amount;
	private $total_before;
	private $total_after;
	private $id_account_transaction;
	private $date;

	public function getAccountId(){
		return $this->account_id;
	}

	public function setAccountId($account_id){
		$this->account_id = $account_id;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}
	public function getAmount(){
		return $this->amount;
	}

	public function setAmount($amount){
		$this->amount = $amount;
	}
	public function getTotalBefore(){
		return $this->total_before;
	}

	public function setTotalBefore($total_before){
		$this->total_before = $total_before;
	}
	public function getTotalAfter(){
		return $this->total_after;
	}

	public function setTotalAfter($total_after){
		$this->total_after = $total_after;
	}
	public function getIdAccountTransaction(){
		return $this->id_account_transaction;
	}

	public function setIdAccountTrasanction($id_account_transaction){
		$this->id_account_transaction = $id_account_transaction;
	}
	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date = $date;
	}
}