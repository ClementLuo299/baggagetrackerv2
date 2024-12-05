<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('customerlogin');
});

Route::get('/emplogin', function () {
    return view('employeelogin');
});

Route::get('/employees', function () {
    return view('employeedashboard');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/check-in', [PostController::class, 'checkIn']);

Route::get('/employees/{userID}', function ($userID) {
    return view('');
});

Route::get('/employees/checkin/{userID}', function ($userID) {
    return view('home');
});

Route::get('/employees/incidents/{userID}', function ($userID) {
    return view('home');
});
