<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Location;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    public function createAirplane(Request $request) {
        $incomingFields = $request->validate([
            'registration_no' => 'required',
            'type' => 'required',
            'capacity' => 'required',
            'coordinates' => 'nullable',
            'airport' => 'nullable',
            'coordinates' => 'nullable'
        ]);

        $incomingFields['registration_no'] = strip_tags($incomingFields['registration_no']);
        $incomingFields['type'] = strip_tags($incomingFields['type']);
        $incomingFields['capacity'] = strip_tags($incomingFields['capacity']);
        //Temp set capacity
        $incomingFields['payload'] = 0;

        $airplane = Airplane::create([
            'registration_no' => $incomingFields['registration_no'],
            'type' => $incomingFields['type'],
            'capacity' => $incomingFields['capacity'],
            'payload' =>$incomingFields['payload'],
            'coordinates' => $incomingFields['coordinates'],
            'airport' => $incomingFields['airport'] ?? ''
        ]);
        Location::create([
            'name' => $incomingFields['registration_no'],
            'coordinates' => $incomingFields['coordinates'],
            'airplane' => $incomingFields['registration_no']
        ]);
        
        return redirect('/employees');
    }

    public function showEditScreen(Airplane $airplane) {
        return view('edit-plane', ['airplane' => $airplane]);
    }

    public function updatePlane(Airplane $airplane, Request $request){
        //Authenticate
        $incomingFields = $request->validate([
            'registration_no' => 'required',
            'type' => 'required',
            'capacity' => 'required'
        ]);

        $incomingFields['registration_no'] = strip_tags($incomingFields['registration_no']);
        $incomingFields['type'] = strip_tags($incomingFields['type']);
        $incomingFields['capacity'] = strip_tags($incomingFields['capacity']);

        $airplane->update($incomingFields);
        return redirect('/employees');
    }

    public function deletePlane(Airplane $airplane) {
        //Authenticate
        $airplane->delete();
        return redirect('/employees');
    }
}
