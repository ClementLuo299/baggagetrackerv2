<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSent extends Model
{   protected $fillable = ['notification_id','recipient', 'sender'];
    protected $table = 'notification_sent';
    protected $primaryKey = 'notification_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function notification(){
        return $this->belongsTo(Notification::class, 'notification_id', 'notification_id');
    }

    public function recipient(){
        return $this->hasOne(User::class, 'recipient', 'id');
    }

    public function sender(){
        return $this->hasOne(User::class, 'sender', 'id');
    }
}