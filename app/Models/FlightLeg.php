<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightLeg extends Model
{   protected $fillable = ['flight_id','airplane','origin','destination','departure_time','arrival_time'];
    protected $table = 'flight_leg';
    public $incrementing = false;
    protected $primaryKey = 'flight_id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function airplane(){
        return $this->hasOne(Airplane::class,'airplane','registration_no');
    }
    public function airport(){
        return $this->hasOne(Airport::class,'code','origin');
    }

    public function airport2(){
        return $this->hasOne(Airport::class,'code','destination');
    }

    public function itinerary(){
        return $this->hasMany(ItineraryFlights::class,'flight_id','flight_id');
    }

}