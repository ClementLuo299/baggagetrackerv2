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
}