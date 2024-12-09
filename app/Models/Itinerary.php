<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = ['booking_id','passport_no'];
    protected $table = 'itinerary';
    protected $foreignKey = ['passport_no'];
    protected $primaryKey = 'booking_id';
    public $incrementing = false;
    public $timestamps = false;   
    protected $keyType = 'string';
    // 
    public function customer(){
        return $this->belongsTo(Customer::class, 'passport_no', 'passport_no');
    }
}