<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightLeg extends Model
{   protected $fillable = ['flight_id','airplane','origin','destination','departure_time','arrival_time'];
    protected $table = 'flight_leg';
    public $timestamps = false;

    public function airplane(){
        return $this->hasOne(Airplane::class,'airplane','registration_no');
    }
    public function airport(){
        return [$this->hasOne(Airplane::class,'origin','code'), $this->hasOne(Airplane::class,'destination','code')];
    }

}