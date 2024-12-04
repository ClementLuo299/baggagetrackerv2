<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('home');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/emplogin', function () {
    return view('employeeregister');
});

Route::get('/employees/{userID}', function ($userID) {
    return view('home');
});

Route::get('/employees/checkin/{userID}', function ($userID) {
    return view('home');
});

Route::get('/employees/incidents/{userID}', function ($userID) {
    return view('home');
});
