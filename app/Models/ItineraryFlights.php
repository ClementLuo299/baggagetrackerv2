<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItineraryFlights extends Model
{
    protected $fillable = ['booking_id','flight_id'];
    protected $table = 'itinerary_flights';
    public $timestamps = false;   
    // 
}
