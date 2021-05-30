<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historic extends Model
{
    protected $fillable = ['account_id', 'type', 'amount', 'total_before', 'total_after', 'date'];

    public function getDateAttribute($value){
    	return Carbon::parse($value)->format('d/m/Y');
    }
}
