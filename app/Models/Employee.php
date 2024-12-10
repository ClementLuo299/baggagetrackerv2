<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user','role','airline'];
    protected $table = 'employee_info';
    public $timestamps = false;   
    protected $primaryKey = 'user';
    //
    public function user(){
        return $this->belongsTo(User::class, 'user');
    }

    public function airline(){
        return $this->hasOne(Airline::class, 'airline', 'code');
    }
}
