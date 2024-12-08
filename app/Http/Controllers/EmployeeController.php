<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{public function createEmployee(Request $request) {
    $incomingFields = $request->validate([
        'role' => 'required',
        'name'=>'required',
        'password'=>'required',
        'fname'=>'required',
        'lname'=>'required'
    ]);

    // Sanitize inputs
    $incomingFields['role'] = strip_tags($incomingFields['role']);
    $incomingFields['name'] = strip_tags($incomingFields['name']);

    // Create User and get its ID
    $user = User::create([
        'name' => $incomingFields['name'],
        'password' => Hash::make($incomingFields['password']),
        'fname' => $incomingFields['fname'],
        'lname' => $incomingFields['lname'],
    ]);
    
    $id = DB::getPdo()->lastInsertId();

    // Create Employee linked to the created User
    Employee::create([
        'user' => $id, // Use the ID from the User model instance
        'role' => $incomingFields['role'],
    ]);

    return redirect('/employees');
    }

    // Show the edit screen for a specific Employee
    public function showEditScreen(Employee $employee) {
        return view('edit-employee', ['employee' => $employee]);
    }

    // Update an existing Employee
    public function updateEmployee(Employee $employee, Request $request) {
        $incomingFields = $request->validate([
            'role' => 'required',
            'name' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'lname' => 'required'
        ]);

        // Sanitize inputs
        $incomingFields['role'] = strip_tags($incomingFields['role']);
        $incomingFields['name'] = strip_tags($incomingFields['name']);

        // Update the associated User record
        $user = User::find($employee->user);
        $user->update([
            'name' => $incomingFields['name'],
            'password' => Hash::make($incomingFields['password']),
            'fname' => $incomingFields['fname'],
            'lname' => $incomingFields['lname'],
        ]);

        // Update the Employee record
        $employee->update([
            'role' => $incomingFields['role'],
        ]);

        return redirect('/employees');
    }

    // Delete an existing Employee
    public function deleteEmployee(Employee $employee) {
        // Delete the associated User record first
        $user = User::find($employee->user);
        $user->delete();

        // Delete the Employee record
        $employee->delete();

        return redirect('/employees');
    }

}