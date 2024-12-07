<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentEmployees extends Model
{   protected $fillable = ['incident_id','employee'];
    protected $table = 'incident_employees';
    public $timestamps = false;
}
