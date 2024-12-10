<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{   protected $fillable = ['notification_id','content','notification_time'];
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function notificationsent(){
        return $this->hasMany(NotificationSent::class,'notification_id','notification_id');
    }
}
