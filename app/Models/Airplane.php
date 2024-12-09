<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ['registration_no','type','capacity','payload'];
    protected $table = 'airplane';
    protected $primaryKey = 'registration_no';
    public $incrementing = false;
    public $timestamps = false;

    public function flightleg(){
        return $this->hasMany(FlightLeg::class, 'registration_no', 'airplane');
    }
}
