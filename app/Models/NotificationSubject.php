<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSubject extends Model
{   protected $fillable = ['notification_id','tracker_id'];
    protected $table = 'notification_subject';
    protected $primaryKey = 'notification_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function notification(){
        return $this->hasOne(Notification::class, 'notification_id', 'notification_id');
    }

    public function baggage(){
        return $this->hasOne(Baggage::class, 'tracker_id', 'tracker_id');
    }
}
