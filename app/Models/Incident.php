<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{   protected $fillable = ['incident_id','is_damaged','is_lost','is_delayed','incident_time','is_resolved','description','location'];
    protected $table = 'incidents';
    public $timestamps = false;
}
