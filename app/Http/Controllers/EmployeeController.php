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
}