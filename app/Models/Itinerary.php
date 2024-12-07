<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = ['booking_id','passport_no'];
    protected $table = 'itinerary';
    public $timestamps = false;   
    // 
}