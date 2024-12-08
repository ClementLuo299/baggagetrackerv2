<?php

namespace App\Http\Controllers;

use App\Models\IncidentEmployees;
use Illuminate\Http\Request;

class IncidentEmployeesController extends Controller
{
    public function createIncidentEmployees(Request $request) {
        $incomingFields = $request->validate([
            'incident_id' => 'required',
            'employee' => 'required',
        ]);

        $incomingFields['incident_id'] = strip_tags($incomingFields['incident_id']);
        $incomingFields['employee'] = strip_tags($incomingFields['employee']);

        IncidentEmployees::create($incomingFields);
        return redirect('/employees');
    //
    }

    public function showEditScreen(IncidentEmployees $incidentEmployee) {
        return view('edit-incident-employee', ['incidentEmployee' => $incidentEmployee]);
    }
    
    public function updateIncidentEmployees(IncidentEmployees $incidentEmployee, Request $request) {
        $incomingFields = $request->validate([
            'incident_id' => 'required',
            'employee' => 'required',
        ]);
    
        $incomingFields['incident_id'] = strip_tags($incomingFields['incident_id']);
        $incomingFields['employee'] = strip_tags($incomingFields['employee']);
    
        $incidentEmployee->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deleteIncidentEmployees(IncidentEmployees $incidentEmployee) {
        $incidentEmployee->delete();
        return redirect('/employees');
    }
    
}
