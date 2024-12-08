<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{   protected $fillable = ['notification_id','content','notification_time'];
    protected $table = 'notification';
    public $timestamps = false;
}