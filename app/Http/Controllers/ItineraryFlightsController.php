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

    // public function showEditScreen($booking_id) {
    //     $itineraryflight = ItineraryFlights::where('booking_id', $booking_id)->first();
    //     return view('edit-itinerary-flight', compact('itineraryflight'));
    // }
    
    // public function updateItineraryFlight(Request $request, $booking_id) {
    //     $incomingFields = $request->validate([
    //         'booking_id' => 'required',
    //         'flight_id' => 'required',
    //     ]);
        
    //     $itineraryflight = ItineraryFlights::where('booking_id', $booking_id)->first();

    //     if (!$itineraryflight) {
    //         return redirect('/')->withErrors(['error' => 'Itinerary Flight not found.']);
    //     }
    
    //     $itineraryflight->update($incomingFields);

    //     return redirect('/employees');
    // }

    public function deleteItineraryFlight($booking_id) {
        $itineraryflight = ItineraryFlights::where('booking_id', $booking_id)->first();
        $itineraryflight->delete();

        if(!$itineraryflight){
            return redirect('/');
        }
        return redirect('/employees');
    }
    
}
