<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/emplogin');
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'userID' => ['required'],
            //Passwords must be 4-100 characters
            'password' => ['required', 'min:4', 'max:100']
        ]);

        //Hash password
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        //Create user
        $user = User::create($incomingFields);

        //Login when registered
        Auth::login($user);
        return redirect('/');
    }
}
