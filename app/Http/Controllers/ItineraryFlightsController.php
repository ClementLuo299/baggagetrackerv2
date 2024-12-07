<?php

namespace App\Http\Controllers;

use App\Models\ItineraryFlights;
use Illuminate\Http\Request;

class ItineraryFlightsController extends Controller
{
    public function createItineraryFlight(Request $request) {
        $incomingFields = $request->validate([
            'booking_id' => 'required',
            'flight_id' => 'required',
        ]);

        $incomingFields['booking_id'] = strip_tags($incomingFields['booking_id']);
        $incomingFields['flight_id'] = strip_tags($incomingFields['flight_id']);

        ItineraryFlights::create($incomingFields);
        return redirect('/employees');
    //
    }
}
