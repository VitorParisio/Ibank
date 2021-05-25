<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = ['account_id','amount'];

    public $timestamps = false;
}
