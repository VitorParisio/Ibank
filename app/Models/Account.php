<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
 
	protected $fillable = ['name', 'agency', 'account_number', 'type' ];

	public $timestamps = false;
}
