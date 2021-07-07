<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table ='event';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ['event_id', 'event_title', 'event_date_start', 'event_date_end','event_color'];
    
}
