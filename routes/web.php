<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('home');
});

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
