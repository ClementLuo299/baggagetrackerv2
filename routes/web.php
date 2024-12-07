<?php

use App\Models\Airport;
use App\Models\Airplane;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;

use App\Http\Controllers\BaggageController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\FlightLegController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhoneNumbersController;
use App\Http\Controllers\LocationUpdateController;
use App\Http\Controllers\BaggageIncidentsController;
use App\Http\Controllers\ItineraryFlightsController;
use App\Http\Controllers\NotificationSentController;
use App\Http\Controllers\IncidentEmployeesController;
use App\Http\Controllers\NotificationSubjectController;


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
    $airplanes = Airplane::all();
    $airports = Airport::all();
    return view('employeedashboard', ['airplanes' => $airplanes, 'airports'=>$airports]);
});

Route::post('/register-baggage-incidents', [BaggageIncidentsController::class, 'createBaggageIncidents']);
Route::post('/register-itinerary-flight', [ItineraryFlightsController::class, 'createItineraryFlight']);
Route::post('/register-itinerary', [ItineraryController::class, 'createItinerary']);
Route::post('/baggage-check-in', [BaggageController::class, 'createBaggage']);
Route::post('/register-incident', [IncidentController::class, 'createIncident']);
Route::post('/notification-incident', [NotificationController::class, 'createNotification']);

Route::post('/register-location', [LocationController::class, 'createLocation']);
Route::post('/register-employee', [EmployeeController::class, 'createEmployee']);
Route::post('/register-airline', [AirlineController::class, 'createAirline']);
Route::post('/register-flight', [FlightLegController::class, 'createFlightLeg']);
Route::post('/register-notification', [NotificationController::class, 'createNotification']);

//Customer related routes
Route::post('/register-customer', [CustomerController::class, 'createCustomer']);

//Airport related routes
Route::post('/register-airport', [AirportController::class, 'createAirport']);
Route::post('/edit-airport/{airport}', [AirportController::class, 'showEditScreen']);
Route::put('/edit-airport/{airport}', [AirportController::class, 'updateAirport']);
Route::delete('/delete-airport/{airport}', [AirportController::class, 'deleteAirport']);

//Airplane related routes
Route::post('/register-plane', [AirplaneController::class, 'createAirplane']);
Route::post('/edit-plane/{airplane}', [AirplaneController::class, 'showEditScreen']);
Route::put('/edit-plane/{airplane}', [AirplaneController::class, 'updatePlane']);
Route::delete('/delete-plane/{airplane}', [AirplaneController::class, 'deletePlane']);

Route::post('/logout', [UserController::class, 'logout']);
