<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{   protected $fillable = ['user','passport_no','country_citizenship'];
    protected $table = 'customer_info';
    protected $primaryKey = 'user'; 
    public $timestamps = false;   
    
    public function user(){
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function itinerary(){
        return $this->hasMany(Itinerary::class, 'passport_no', 'passport_no');
    }
}