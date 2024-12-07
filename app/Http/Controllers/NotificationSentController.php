<?php

namespace App\Http\Controllers;

use App\Models\NotificationSent;
use Illuminate\Http\Request;

class NotificationSentController extends Controller
{
    public function createNotificationSent(Request $request) {
        $incomingFields = $request->validate([
            'notification_id' => 'required',
            'recipient' => 'required',
            'sender' => 'required',
        ]);

        $incomingFields['notification_id'] = strip_tags($incomingFields['notification_id']);
        $incomingFields['recipient'] = strip_tags($incomingFields['recipient']);
        $incomingFields['sender'] = strip_tags($incomingFields['sender']);
        
        NotificationSent::create($incomingFields);
        return redirect('/employees');
    //
    }
}
