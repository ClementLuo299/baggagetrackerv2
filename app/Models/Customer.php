<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{   protected $fillable = ['user','passport_no','country_citizenship'];
    protected $table = 'customer_info';
    public $timestamps = false;   
    //
}