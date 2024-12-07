<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user','role','airline'];
    protected $table = 'employee_info';
    public $timestamps = false;   
    //
}
