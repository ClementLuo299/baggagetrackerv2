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

    public function showEditScreen(ItineraryFlights $itineraryFlight) {
        return view('edit-itinerary-flight', ['itineraryFlight' => $itineraryFlight]);
    }
    
    public function updateItineraryFlight(ItineraryFlights $itineraryFlight, Request $request) {
        $incomingFields = $request->validate([
            'booking_id' => 'required',
            'flight_id' => 'required',
        ]);
    
        $incomingFields['booking_id'] = strip_tags($incomingFields['booking_id']);
        $incomingFields['flight_id'] = strip_tags($incomingFields['flight_id']);
    
        $itineraryFlight->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteItineraryFlight(ItineraryFlights $itineraryFlight) {
        $itineraryFlight->delete();
        return redirect('/employees');
    }
    
}
