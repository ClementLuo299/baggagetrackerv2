<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSent extends Model
{   protected $fillable = ['notification_id','recipient', 'sender'];
    protected $table = 'notification_sent';
    public $timestamps = false;

    public function notification(){
        return $this->belongsTo(Notification::class, 'notification_id', 'notification_id');
    }
}