<?php

namespace App\Http\Controllers;

use App\Models\NotificationSubject;
use Illuminate\Http\Request;

class NotificationSubjectController extends Controller
{
    public function createNotificationSubject(Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'tracker_id' => 'required',
        ]);

        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);

        NotificationSubject::create($incomingFields);
        return redirect('/employees');
    //
    }

    public function showEditScreen(NotificationSubject $notificationSubject) {
        return view('edit-notification-subject', ['notificationSubject' => $notificationSubject]);
    }
    
    public function updateNotificationSubject(NotificationSubject $notificationSubject, Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'tracker_id' => 'required',
        ]);
    
        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
    
        $notificationSubject->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteNotificationSubject(NotificationSubject $notificationSubject) {
        $notificationSubject->delete();
        return redirect('/employees');
    }
    
}

