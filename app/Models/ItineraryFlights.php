<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItineraryFlights extends Model
{
    protected $fillable = ['booking_id','flight_id'];
    protected $table = 'itinerary_flights';
    protected $foreignKey = ['flight_id'];
    protected $primaryKey = 'booking_id';
    public $incrementing = false;
    public $timestamps = false;   
    protected $keyType = 'string';
    // 
    public function FlightLeg(){
        return $this->belongsTo(FlightLeg::class, 'flight_id', 'flight_id');
    }// 
}
