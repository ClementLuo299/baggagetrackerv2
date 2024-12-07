<?php

namespace App\Http\Controllers;

use App\Models\FlightLeg;
use Illuminate\Http\Request;

class FlightLegController extends Controller
{
    public function createFlightLeg(Request $request) {
        $incomingFields = $request->validate([
            'flight_id' => 'required',
            'airplane' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
        ]);

        $incomingFields['flight_id'] = strip_tags($incomingFields['flight_id']);
        $incomingFields['airplane'] = strip_tags($incomingFields['airplane']);
        $incomingFields['origin'] = strip_tags($incomingFields['origin']);
        $incomingFields['destination'] = strip_tags($incomingFields['destination']);
        $incomingFields['departure_time'] = strip_tags($incomingFields['departure_time']);
        $incomingFields['arrival_time'] = strip_tags($incomingFields['arrival_time']);

        FlightLeg::create($incomingFields);
        return redirect('/employees');
    //
    }
}
