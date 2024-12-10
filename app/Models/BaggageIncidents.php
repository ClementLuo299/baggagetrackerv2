<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaggageIncidents extends Model
{   protected $fillable = ['tracker_id','incident'];
    protected $incremementing = false;
    protected $primaryKey = 'tracker_id';
    protected $keyType = 'string';
    protected $table = 'baggage_incidents';
    public $timestamps = false;

    public function baggage(){
        return $this->hasOne(Baggage::class, 'tracker_id', 'tracker_id');
    }

    public function incident(){
        return $this->hasMany(Incident::class, 'incident', 'incident');
    }
}

