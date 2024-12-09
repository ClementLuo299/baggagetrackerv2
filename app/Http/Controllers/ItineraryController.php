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

    // public function showEditScreen($booking_id) {
    //     $itinerary = Itinerary::where('booking_id', $booking_id)->first();
    //     return view('edit-itinerary', compact('itinerary'));
    // }
    
    // public function updateItinerary(Request $request, $booking_id) {
    //     $request->validate([
    //         'booking_id' => 'required',
    //         'passport_no' => 'required',
    //     ]);

    //     $itinerary = Itinerary::where('booking_id',$booking_id)->first();

    //     $itinerary->booking_id = $request->input('booking_id');
    //     $itinerary->passport_no = $request->input('passport_no');
    //     $itinerary->save();
    
    //     return redirect('/employees');
    // }
    
    public function deleteItinerary($booking_id) {
        $itinerary = Itinerary::where('booking_id',$booking_id)->first();
        $itinerary->delete();

        if(!$itinerary){
            return redirect('/');
        }
        return redirect('/employees');
    }
    
}