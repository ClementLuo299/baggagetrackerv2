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
}
