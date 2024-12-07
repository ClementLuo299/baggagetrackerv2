<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSubject extends Model
{   protected $fillable = ['notification_id','tracker_id'];
    protected $table = 'notification_subject';
    public $timestamps = false;
}
