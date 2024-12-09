<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function createEmployee(Request $request) {
        $incomingFields = $request->validate([
            'role' => 'required',
            'name'=>'required',
            'password'=>'required',
            'fname'=>'required',
            'lname'=>'required',
            'airline'=>'nullable'
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
            'airline' => $incomingFields['airline']
        ]);

        return redirect('/employees');
    }

    // Show the edit screen for a specific Employee
    public function showEditScreen($id) {
        $user = User::with('employee')->findOrFail($id);
        return view('edit-employees', compact('user'));
    }

    // Update an existing Employee
    public function updateEmployee(Request $request, $user){
        $incomingFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
            'mname' => 'nullable',
            'street' => 'nullable',
            'country' => 'nullable',
            'role' => 'nullable',
            'airline' => 'nullable',
            'postal_code' => 'nullable',
            'email' => 'nullable'
        ]);

        $userr = User::findOrFail($user);

        $userr->update([
            'name'=>$incomingFields['fname'],
            'password' => Hash::make($incomingFields['password']),
            'fname' => $incomingFields['fname'],
            'lname' => $incomingFields['lname'],
            'mname' => $incomingFields['mname'],
            'street' => $incomingFields['street'],
            'country' => $incomingFields['country'],
            'postal_code' => $incomingFields['postal_code'],
            'email' => $incomingFields['email']
        ]);

        $userr->employee->update([
            'role' => $incomingFields['role'],
            'airline' => $incomingFields['airline']
        ]);

        return redirect('/employees');
    }

    // Delete an existing Employee
    public function deleteEmployee($id) {
        // Delete the associated User record first
        $user = User::find($id);
        $user->employee->delete();

        // Delete the Employee record
        $user->delete();

        return redirect('/employees');
    }

}