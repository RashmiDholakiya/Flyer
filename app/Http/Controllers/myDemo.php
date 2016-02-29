<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\demo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class myDemo extends Controller
{
	public function index(){

		$demo=new demo();
		$data=$demo->all();
		$demo->name='rasmi';
		$demo->save();
		$mydemo= demo::find(1);
		$mydemo->delete();
		return $mydemo;


	}


}
