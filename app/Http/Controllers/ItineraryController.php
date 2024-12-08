<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function createItinerary(Request $request) {
        $incomingFields = $request->validate([
            'booking_id' => 'required',
            'passport_no' => 'required',
        ]);

        $incomingFields['booking_id'] = strip_tags($incomingFields['booking_id']);
        $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);

        Itinerary::create($incomingFields);
        return redirect('/employees');
    //
    }

    public function showEditScreen(Itinerary $itinerary) {
        return view('edit-itinerary', ['itinerary' => $itinerary]);
    }
    
    public function updateItinerary(Itinerary $itinerary, Request $request) {
        $incomingFields = $request->validate([
            'booking_id' => 'required',
            'passport_no' => 'required',
        ]);
    
        $incomingFields['booking_id'] = strip_tags($incomingFields['booking_id']);
        $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);
    
        $itinerary->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteItinerary(Itinerary $itinerary) {
        $itinerary->delete();
        return redirect('/employees');
    }
    
}