<?php

namespace App\Http\Controllers;

use App\Models\Baggage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function checkIn(Request $request) {
        $incomingFields = $request->validate([
            'tracker_id' => 'required'
        ]);

        //Sanitize input
        $incomingFields = $request->input('tracker_id');
        $incomingFields['tracker_id']  = strip_tags($incomingFields['tracker_id']);
        $incomingFields['user_id'] = Auth::attempt();

        Baggage::create($incomingFields);
        return redirect('/');
    }
}
