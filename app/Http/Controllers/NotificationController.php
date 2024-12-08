<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function createNotification(Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'content' => 'required',
            'notification_time' => 'required',
        ]);

        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['notification_time'] = strip_tags($incomingFields['notification_time']);

        Notification::create($incomingFields);
        return redirect('/employees');
    //
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
