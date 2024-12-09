<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{   public function createCustomer(Request $request) {
    $incomingFields = $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'mname' => 'nullable',
        'passport_no' => 'required',
        'country_citizenship' => 'required',
    ]);

    $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);
    $incomingFields['country_citizenship'] = strip_tags($incomingFields['country_citizenship']);

    $user = User::create([
        'name'=>$incomingFields['fname'],
        'password'=>Hash::make($incomingFields['passport_no']),
        'fname'=>$incomingFields['fname'],
        'lname'=>$incomingFields['lname']
    ]);

    $id = DB::getPdo()->lastInsertId();

    Customer::create([
        'user'=>$user['id'],
        'passport_no'=>$incomingFields['passport_no'],
        'country_citizenship' => $incomingFields['country_citizenship']
    ]);
    return redirect('/employees');
    }

    // Show the edit screen for a specific Customer
    public function showEditScreen($id) {
        $user = User::with('customer')->findOrFail($id);
        return view('edit-customers', compact('user'));
    }

    // Update an existing Customer
    public function updateCustomer(Request $request, $id) {
        $incomingFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'nullable',
            'street' => 'nullable',
            'country' => 'nullable',
            'postal_code' => 'nullable',
            'email' => 'nullable',
            'passport_no' => 'required',
            'country_citizenship' => 'required',
        ]);

        $user = User::findOrFail($id);

        // Update related User record
        $user->update([
            'name'=>$incomingFields['fname'],
            'password' => Hash::make($incomingFields['passport_no']),
            'fname' => $incomingFields['fname'],
            'lname' => $incomingFields['lname'],
            'mname' => $incomingFields['mname'],
            'street' => $incomingFields['street'],
            'country' => $incomingFields['country'],
            'postal_code' => $incomingFields['postal_code'],
            'email' => $incomingFields['email']
        ]);

        // Update Customer record
        $user->customer->update([
            'passport_no' => $incomingFields['passport_no'],
            'country_citizenship' => $incomingFields['country_citizenship']
        ]); 

        return redirect('/employees');
    }

    // Delete an existing Customer
    public function deleteCustomer(Customer $customer) {
        // Delete the related User record first
        $user = User::find($customer->user);
        $user->delete();

        // Delete the Customer record
        $customer->delete();

        return redirect('/employees');
    }

}
