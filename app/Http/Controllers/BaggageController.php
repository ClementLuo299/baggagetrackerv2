<?php

namespace App\Http\Controllers;

use App\Models\Baggage; 
use Illuminate\Http\Request;

class BaggageController extends Controller
{   public function createBaggage(Request $request) {
    $incomingFields = $request->validate([
        'tracker_id' => 'required',
        'passport_no' => 'required',
        'booking_id' => 'required',
        'is_time_sensitive' => 'required',
        'is_hazardous' => 'required',
    ]);

    $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
    $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);
    $incomingFields['booking_id'] = strip_tags($incomingFields['booking_id']);
    $incomingFields['is_time_sensitive'] = strip_tags($incomingFields['is_time_sensitive']);
    $incomingFields['is_hazardous'] = strip_tags($incomingFields['is_hazardous']);

    Baggage::create($incomingFields);
    return redirect('/employees');
    //
    }
//
}
