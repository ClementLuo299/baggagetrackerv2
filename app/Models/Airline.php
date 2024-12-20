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

    public function airplane(){
        return $this->hasMany(Airplane::class,'name','airline');
    }

    public function employee(){
        return $this->hasMany(Employee::class,'name','airline');
    }
}
