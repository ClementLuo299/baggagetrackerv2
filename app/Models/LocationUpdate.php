<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationUpdate extends Model
{   protected $fillable = ['time','tracker_id','location_name'];
    protected $table = 'location_update';
    public $timestamps = false;   
    //
    //
}