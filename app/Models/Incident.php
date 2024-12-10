<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{   protected $fillable = ['incident_id','is_damaged','is_lost','is_delayed','incident_time','is_resolved','description','location'];
    protected $table = 'incidents';
    protected $primaryKey = 'incident_id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function location(){
        return $this->hasOne(Location::class,'location','name');
    }

    public function baggage(){
        return $this->hasMany(BaggageIncidents::class,'incident','incident_id');
    }

    public function employee(){
        return $this->hasMany(IncidentEmployees::class,'incident_id','incident_id');
    }
}
