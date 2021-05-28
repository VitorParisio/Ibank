<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Historic;

class Account extends Model
{
 
	protected $fillable = ['user_id','name', 'agency', 'account_number', 'type', 'amount'];

	public $timestamps = false;

}
