<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $table = 'tb_societe';
	protected $primaryKey = 'societe_id';
	public $timestamps = false;

    public function societe()
	{
		return $this->belongsToMany('App\Reunion');
	}
}
