<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    protected $fillable = ['tracker_id','passport_no','tracker_type','booking_id','is_time_sensitive','is_hazardous',
                            'baggage_weight'];
    protected $table = 'baggage';
    protected $primaryKey = 'tracker_id';
    protected $keyType = 'string';
    public $timestamps = false;  

    public function locationupdate(){
        return $this->hasMany(LocationUpdate::class, 'tracker_id', 'tracker_id');
    }

    public function baggageincidents(){
        return $this->hasMany(BaggageIncidents::class, 'tracker_id', 'tracker_id');
    }

    public function itinerary(){
        return $this->hasOne(Itinerary::class, 'booking_id', 'booking_id');
    }

    public function itinerary2(){
        return $this->hasOne(Itinerary::class, 'passport_no', 'passport_no');
    }
}
