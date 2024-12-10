<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{   protected $fillable = ['name','coordinates','airport','airplane','type'];
    protected $table = 'location';
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;   
    //

    public function locationupdate(){
        return $this->hasMany(LocationUpdate::class,'location_name','name');
    }

    public function airplane(){
        return $this->hasOne(Airplane::class,'airplane','airplane');
    }

    public function airport(){
        return $this->hasOne(Airport::class,'airport','airport');
    }
}
