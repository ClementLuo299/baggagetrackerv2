<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentEmployees extends Model
{   protected $fillable = ['incident_id','employee'];
    public $incrementing = false;
    protected $primaryKey = 'incident_id';
    protected $keyType = 'string';
    protected $table = 'incident_employees';
    public $timestamps = false;

    public function incident(){
        return $this->hasOne(Incident::class,'incident_id','incident_id');
    }

    public function employees(){
        return $this->hasOne(Employee::class,'employee','user');
    }
}
