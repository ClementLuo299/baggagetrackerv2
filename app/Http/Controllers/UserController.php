<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])){
            $request->session()->regenerate();
        }

        return redirect('/employees');
    }

    public function customerLogin(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);

        if(Auth::attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['name']])){
            $request->session()->regenerate();
        }

        return redirect('/employees');
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

    public function createUser(Request $request) {
        $incomingFields = $request->validate([
            'userID' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'street' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'email' => 'required',
        ]);

        $incomingFields['userID'] = strip_tags($incomingFields['userID']);
        $incomingFields['password'] = strip_tags($incomingFields['password']);
        $incomingFields['fname'] = strip_tags($incomingFields['fname']);
        $incomingFields['mname'] = strip_tags($incomingFields['mname']);
        $incomingFields['lname'] = strip_tags($incomingFields['lname']);
        $incomingFields['street'] = strip_tags($incomingFields['street']);
        $incomingFields['country'] = strip_tags($incomingFields['country']);
        $incomingFields['postal_code'] = strip_tags($incomingFields['postal_code']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);

        User::create($incomingFields);
        return redirect('/employees');
    //
    }
}
