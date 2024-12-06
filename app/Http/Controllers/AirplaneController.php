<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    public function createAirplane(Request $request) {
        $incomingFields = $request->validate([
            'registration_no' => 'required',
            'type' => 'required',
            'capacity' => 'required'
        ]);

        $incomingFields['registration_no'] = strip_tags($incomingFields['registration_no']);
        $incomingFields['type'] = strip_tags($incomingFields['type']);
        $incomingFields['capacity'] = strip_tags($incomingFields['capacity']);
        //Temp set capacity
        $incomingFields['payload'] = 0;
        Airplane::create($incomingFields);
        return redirect('/employees');
    }
}
