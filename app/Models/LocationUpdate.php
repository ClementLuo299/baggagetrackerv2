<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationUpdate extends Model
{   protected $fillable = ['time','tracker_id','location_name'];
    protected $table = 'location_update';
    public $timestamps = false;
    protected $primaryKey = 'location_name';
    protected $keyType = 'string';
    public $incrementing = false;   
    //
    //
    public function baggage(){
        return $this->belongsTo(Baggage::class, 'tracker_id', 'tracker_id');
    }

    public function location(){
        return $this->hasOne(Location::class, 'name', 'location_name');
    }
}