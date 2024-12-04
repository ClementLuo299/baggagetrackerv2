<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'userID' => ['required'],
            //Passwords must be 4-100 characters
            'password' => ['required', 'min:4', 'max:100']
        ]);
        return 'Hello world';
    }
}
