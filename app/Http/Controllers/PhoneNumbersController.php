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
}
