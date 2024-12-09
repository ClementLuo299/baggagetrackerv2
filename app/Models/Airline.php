<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{   protected $fillable = ['name','country_of_origin'];
    protected $table = 'airline';
    protected $primaryKey = 'name';
    public $incrementing = false; 
    public $timestamps = false;
    //
}
