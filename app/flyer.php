<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flyer extends Model
{
    protected $fillable = [

		'fname',
		'lname',
		'country',
		'user_id'
	];

	public function photo()
	{
		return $this->hasMany('App\photo');
	}
}
