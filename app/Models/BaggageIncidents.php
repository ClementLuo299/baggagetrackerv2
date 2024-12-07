<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaggageIncidents extends Model
{   protected $fillable = ['tracker_id','incident'];
    protected $table = 'baggage_incidents';
    public $timestamps = false;
}

