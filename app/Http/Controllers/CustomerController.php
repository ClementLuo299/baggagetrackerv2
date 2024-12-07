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
}
