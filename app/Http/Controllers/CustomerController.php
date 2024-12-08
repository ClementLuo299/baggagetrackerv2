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
        'passport_no' => 'required',
        'country_citizenship' => 'required',
    ]);

    $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);
    $incomingFields['country_citizenship'] = strip_tags($incomingFields['country_citizenship']);

    User::create([
        'name'=>$incomingFields['fname'],
        'password'=>Hash::make($incomingFields['passport_no']),
        'fname'=>$incomingFields['fname'],
        'lname'=>$incomingFields['lname']
    ]);

    $id = DB::getPdo()->lastInsertId();

    Customer::create([
        'user'=>$id,
        'passport_no'=>$incomingFields['passport_no'],
        'country_citizenship' => $incomingFields['country_citizenship']
    ]);
    return redirect('/employees');
    }

    // Show the edit screen for a specific Customer
    public function showEditScreen(Customer $customer) {
        return view('edit-customer', ['customer' => $customer]);
    }

    // Update an existing Customer
    public function updateCustomer(Customer $customer, Request $request) {
        $incomingFields = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'passport_no' => 'required',
            'country_citizenship' => 'required',
        ]);

        $incomingFields['passport_no'] = strip_tags($incomingFields['passport_no']);
        $incomingFields['country_citizenship'] = strip_tags($incomingFields['country_citizenship']);

        // Update related User record
        $user = User::find($customer->user);
        $user->update([
            'name' => $incomingFields['fname'],
            'password' => Hash::make($incomingFields['passport_no']),
            'fname' => $incomingFields['fname'],
            'lname' => $incomingFields['lname']
        ]);

        // Update Customer record
        $customer->update([
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
