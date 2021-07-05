<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'tb_participants';
	protected $primaryKey = 'participant_id';
	public $timestamps = false;


	public function reunion()
	{
		return $this->belongsToMany('App\Reunion');
	}
}
