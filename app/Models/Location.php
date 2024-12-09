<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{   protected $fillable = ['name','coordinates','airport','airplane','type'];
    protected $table = 'location';
    protected $primaryKey = 'name';
    public $incrementing = false;
    public $timestamps = false;   
    //
}
