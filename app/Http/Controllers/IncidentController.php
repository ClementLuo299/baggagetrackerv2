<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function createIncident(Request $request) {
        $incomingFields = $request->validate([
            'incident_id' => 'required',
            'is_damaged' => 'required',
            'is_lost' => 'required',
            'is_delayed' => 'required',
            'incident_time' => 'required',
            'is_resolved' => 'required',
            'location' => 'required',
        ]);

        $incomingFields['incident_id'] = strip_tags($incomingFields['incident_id']);
        $incomingFields['is_damaged'] = strip_tags($incomingFields['is_damaged']);
        $incomingFields['is_lost'] = strip_tags($incomingFields['is_lost']);
        $incomingFields['is_delayed'] = strip_tags($incomingFields['is_delayed']);
        $incomingFields['incident_time'] = strip_tags($incomingFields['incident_time']);
        $incomingFields['is_resolved'] = strip_tags($incomingFields['is_resolved']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);

        Incident::create($incomingFields);
        return redirect('/employees');
    //
    }

    public function showEditScreen(Incident $incident) {
        return view('edit-incident', ['incident' => $incident]);
    }
    
    public function updateIncident(Incident $incident, Request $request) {
        $incomingFields = $request->validate([
            'incident_id' => 'required',
            'is_damaged' => 'required',
            'is_lost' => 'required',
            'is_delayed' => 'required',
            'incident_time' => 'required',
            'is_resolved' => 'required',
            'description' => 'nullable',
            'location' => 'required',
        ]);
    
        $incomingFields['incident_id'] = strip_tags($incomingFields['incident_id']);
        $incomingFields['is_damaged'] = strip_tags($incomingFields['is_damaged']);
        $incomingFields['is_lost'] = strip_tags($incomingFields['is_lost']);
        $incomingFields['is_delayed'] = strip_tags($incomingFields['is_delayed']);
        $incomingFields['incident_time'] = strip_tags($incomingFields['incident_time']);
        $incomingFields['is_resolved'] = strip_tags($incomingFields['is_resolved']);
        $incomingFields['location'] = strip_tags($incomingFields['location']);
    
        $incident->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteIncident(Incident $incident) {
        $incident->delete();
        return redirect('/employees');
    }
    
}
