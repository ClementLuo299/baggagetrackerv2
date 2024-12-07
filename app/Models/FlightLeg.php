<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightLeg extends Model
{    protected $fillable = ['flight_id','airplane','origin','destination','departure_time','arrival_time'];
    protected $table = 'flight_leg';
    public $timestamps = false;
}