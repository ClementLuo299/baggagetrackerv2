<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    protected $fillable = ['tracker_id','passport_no','tracker_type','booking_id','is_time_sensitive','is_hazardous',
                            'baggage_weight'];
    protected $table = 'baggage';
    public $timestamps = false;  
}
