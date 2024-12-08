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
    // Show the edit screen for a specific Baggage Incident
    public function showEditScreen(BaggageIncidents $baggageIncidents) {
        return view('edit-baggage-incident', ['incident' => $baggageIncidents]);
    }

    // Update an existing Baggage Incident
    public function updateBaggageIncidents(BaggageIncidents $baggageIncidents, Request $request) {
        $incomingFields = $request->validate([
            'tracker_id' => 'required',
            'incident' => 'required',
        ]);

        $incomingFields['tracker_id'] = strip_tags($incomingFields['tracker_id']);
        $incomingFields['incident'] = strip_tags($incomingFields['incident']);

        $baggageIncidents->update($incomingFields);
        return redirect('/employees');
    }

    // Delete an existing Baggage Incident
    public function deleteBaggageIncidents(BaggageIncidents $baggageIncidents) {
        $baggageIncidents->delete();
        return redirect('/employees');
    }

}
