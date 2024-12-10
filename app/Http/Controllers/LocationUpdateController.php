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

    LocationUpdate::create([
        'time' => $incomingFields['time'],
        'tracker_id' => $incomingFields['tracker_id'],
        'location_name' => $incomingFields['location_name']
    ]);
    return redirect('/employees');
    }

    public function showEditScreen(LocationUpdate $locationUpdate) {
        return view('edit-location-update', ['locationUpdate' => $locationUpdate]);
    }
    
    public function updateLocationUpdate(LocationUpdate $locationUpdate, Request $request) {
        $incomingFields = $request->validate([
            'time' => 'required',
            'tracker_id' => 'required',
            'location_name' => 'required',
        ]);
    
        $incomingFields['time'] = strip_tags($incomingFields['time']);
        $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
        $incomingFields['location_name'] = strip_tags($incomingFields['location_name']);
    
        $locationUpdate->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteLocationUpdate(LocationUpdate $locationUpdate) {
        $locationUpdate->delete();
        return redirect('/employees');
    }
    
//
}
