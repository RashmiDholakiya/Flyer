<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
	protected $table = 'photos';
	protected $fillable = ['path'];
	public function flyer()
	{
		return $this->belongsTo('App\flyer');
	}
}
