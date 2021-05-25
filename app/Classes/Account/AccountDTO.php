<?php

namespace App\Classes\Account;

class AccountDTO
{
	private $user_id;
	private $name;
	private $agency;
	private $account_number;
	private $type;
	private $amount;

	public function getUserId(){
		return $this->user_id;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
	public function getAgency(){
		return $this->agency;
	}

	public function setAgency($agency){
		$this->agency = $agency;
	}
	public function getAccountNumber(){
		return $this->account_number;
	}

	public function setAccountNumber($account_number){
		$this->account_number = $account_number;
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
}