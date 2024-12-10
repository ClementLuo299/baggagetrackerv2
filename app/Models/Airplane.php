<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['registration_no','type','capacity','payload','airline','coordinates'];
    protected $table = 'airplane';
    protected $primaryKey = 'registration_no';
    public $incrementing = false;
    public $timestamps = false;

    public function flightleg(){
        return $this->hasMany(FlightLeg::class, 'registration_no', 'airplane');
    }

    public function airline(){
        return $this->hasOne(Airline::class,'airline','name');
    }

    public function location(){
        return $this->hasOne(Location::class,'coordinates','coordinates');
    }

    public function destination(){
        return $this->hasOne(Airport::class,'code','coordinates');
    }
}