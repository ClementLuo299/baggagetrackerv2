<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationSent;
use Illuminate\Support\Facades\Auth;

class NotificationSentController extends Controller
{
    public function createNotificationSent(Request $request, $notification_id) {
        $incomingFields = $request->validate([
            'recipient' => 'required',
            'notification_id' => 'required'
        ]);

        $incomingFields['recipient'] = strip_tags($incomingFields['recipient']);
        $sender = Auth::id();
        
        NotificationSent::create([
            'notification_id' => $notification_id,
            'recipient' => $incomingFields['recipient'],
            'sender' => $sender
        ]);
        return redirect('/employees');
    //
    }

    public function showEditScreen(NotificationSent $notificationSent) {
        return view('edit-notification-sent', ['notificationSent' => $notificationSent]);
    }
    
    public function updateNotificationSent(NotificationSent $notificationSent, Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'recipient' => 'required',
            'sender' => 'required',
        ]);
    
        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['recipient'] = strip_tags($incomingFields['recipient']);
        $incomingFields['sender'] = strip_tags($incomingFields['sender']);
    
        $notificationSent->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteNotificationSent(NotificationSent $notificationSent) {
        $notificationSent->delete();
        return redirect('/employees');
    }
    
}
