<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumbers;
use Illuminate\Http\Request;

class PhoneNumbersController extends Controller
{   public function createPhoneNumbers(Request $request) {
    $incomingFields = $request->validate([
        'user_ID' => 'required',
        'phone_no' => 'required',
    ]);

    $incomingFields['user_ID'] = strip_tags($incomingFields['user_ID']);
    $incomingFields['phone_no'] = strip_tags($incomingFields['phone_no']);

    PhoneNumbers::create($incomingFields);
    return redirect('/employees');
//
    }
    //

    public function showEditScreen(PhoneNumbers $phoneNumbers) {
        return view('edit-phone-number', ['phoneNumbers' => $phoneNumbers]);
    }
    
    public function updatePhoneNumbers(PhoneNumbers $phoneNumbers, Request $request) {
        $incomingFields = $request->validate([
            'user_ID' => 'required',
            'phone_no' => 'required',
        ]);
    
        $incomingFields['user_ID'] = strip_tags($incomingFields['user_ID']);
        $incomingFields['phone_no'] = strip_tags($incomingFields['phone_no']);
    
        $phoneNumbers->update($incomingFields);
    
        return redirect('/employees');
    }
    
    public function deletePhoneNumbers(PhoneNumbers $phoneNumbers) {
        $phoneNumbers->delete();
        return redirect('/employees');
    }
    
}
