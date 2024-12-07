<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{public function createLocation(Request $request) {
    $incomingFields = $request->validate([
        'name' => 'required',
        'coordinates' => 'required',
        'type' => 'required',
    ]);

    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['coordinates'] = strip_tags($incomingFields['coordinates']);
    $incomingFields['type'] = strip_tags($incomingFields['type']);

    Location::create($incomingFields);
    return redirect('/employees');
//
    }
    //
}