<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Balance;

class Account extends Model
{
 
	protected $fillable = ['user_id','name', 'agency', 'account_number', 'type', 'amount'];

	public $timestamps = false;

	public function balande(){
		return $this->hasOne(Balance::class);
	}
}
