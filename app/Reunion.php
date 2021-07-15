<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $table = 'reunion';
	protected $primaryKey = 'reunion_id';
	public $timestamps = false;

	public function participants()
	{
		return $this->belongsToMany('App\Participant');
	}
	public function society()
	{
		return $this->belongsToMany('App\Society');
	}
}
