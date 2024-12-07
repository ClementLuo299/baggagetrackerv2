<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function createAirport(Request $request) {
        $incomingFields = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'country' => 'required',
            'city' => 'required'
        ]);

        $incomingFields['code'] = strip_tags($incomingFields['code']);
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['country'] = strip_tags($incomingFields['country']);
        $incomingFields['city'] = strip_tags($incomingFields['city']);

        Airport::create($incomingFields);
        return redirect('/employees');
    }

    public function showEditScreen(Airport $airport) {
        return view('edit-airport', ['airport' => $airport]);
    }

    public function updateAirport(Airport $airport, Request $request){
        //Authenticate
        $incomingFields = $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $incomingFields['code'] = strip_tags($incomingFields['code']);
        $incomingFields['name'] = strip_tags($incomingFields['name']);

        $airport->update($incomingFields);
        return redirect('/employees');
    }

    public function deleteAirport(Airport $airport) {
        //Authenticate
        $airport->delete();
        return redirect('/employees');
    }
}