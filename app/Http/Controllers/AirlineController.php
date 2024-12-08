<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function createAirline(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'country_of_origin' => 'required',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['country_of_origin'] = strip_tags($incomingFields['country_of_origin']);

        Airline::create($incomingFields);
        return redirect('/employees');
    //
    }

    // Show the edit screen for a specific Airline
    public function showEditScreen(Airline $airline) {
        return view('edit-airline', ['airline' => $airline]);
    }

    // Update an existing Airline
    public function updateAirline(Airline $airline, Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'country_of_origin' => 'required',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['country_of_origin'] = strip_tags($incomingFields['country_of_origin']);

        $airline->update($incomingFields);
        return redirect('/employees');
    }

    // Delete an existing Airline
    public function deleteAirline(Airline $airline) {
        $airline->delete();
        return redirect('/employees');
    }
}