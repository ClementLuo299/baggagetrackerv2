<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExecutiveController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('customerlogin');
});

Route::get('/emplogin', function () {
    return view('employeelogin');
});

Route::post('/emplogin/submit', [UserController::class, 'login']);


Route::get('/employees', function () {
    return view('employeedashboard');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/register-plane', [AirplaneController::class, 'createAirplane']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/check-in', [PostController::class, 'checkIn']);
