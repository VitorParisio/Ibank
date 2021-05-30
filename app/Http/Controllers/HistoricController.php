<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Historic;

class HistoricController extends Controller
{
    public function index(){
    	return Historic::index();
    }

     public function chart(){
    	return Historic::chart();
    }

	public function del($id){
        return Historic::del($id);
	}
}
