<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\NotificationSubject;

class NotificationController extends Controller
{
    public function createNotification(Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'content' => 'required',
            'notification_time' => 'required',
            'tracker_id' => 'required'
        ]);

        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['notification_time'] = strip_tags($incomingFields['notification_time']);

        Notification::create([
            'notification_id' => $incomingFields['notification_id'],
            'content' => $incomingFields['content'],
            'notification_time' => $incomingFields['notification_time'],
        ]);

        NotificationSubject::create([
            'notification_id' => $incomingFields['notification_id'],
            'tracker_id' => $incomingFields['tracker_id']
        ]);

        
        return redirect('/employees');
    }

    public function showEditScreen(Notification $notification) {
        return view('edit-notification', ['notification' => $notification]);
    }
    
    public function updateNotification(Notification $notification, Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'content' => 'required',
            'notification_time' => 'required',
        ]);
    
        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['notification_time'] = strip_tags($incomingFields['notification_time']);
    
        $notification->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteNotification(Notification $notification) {
        $notification->delete();
        return redirect('/employees');
    }
    
}
