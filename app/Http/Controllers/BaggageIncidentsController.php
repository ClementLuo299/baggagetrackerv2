<?php

namespace App\Http\Controllers;

use App\Models\BaggageIncidents;
use Illuminate\Http\Request;

class BaggageIncidentsController extends Controller
{
    public function createBaggageIncidents(Request $request) {
        $incomingFields = $request->validate([
            'tracker_id' => 'required',
            'incident' => 'required',
        ]);

        $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
        $incomingFields['incident'] = strip_tags($incomingFields['incident']);

        BaggageIncidents::create($incomingFields);
        return redirect('/employees');
    //
    }
}
