<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{   protected $fillable = ['code','name','country','city'];
    protected $table = 'airport';
    public $timestamps = false;
    //
    protected $primaryKey = 'code';
    public $incrementing = false;
}
    