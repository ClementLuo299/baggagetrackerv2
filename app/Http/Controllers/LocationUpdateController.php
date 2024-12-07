<?php

namespace App\Http\Controllers;

use App\Models\LocationUpdate;
use Illuminate\Http\Request;

class LocationUpdateController extends Controller
{   public function createLocationUpdate(Request $request) {
    $incomingFields = $request->validate([
        'time' => 'required',
        'tracker_id' => 'required',
        'location_name' => 'required',
    ]);

    $incomingFields['time'] = strip_tags($incomingFields['time']);
    $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
    $incomingFields['location_name'] = strip_tags($incomingFields['location_name']);

    LocationUpdate::create($incomingFields);
    return redirect('/employees');
    //
    }
//
}
