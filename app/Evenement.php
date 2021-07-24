<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'tb_evenement';
	protected $primaryKey = 'evenement_id';
	public $timestamps = false;
}
