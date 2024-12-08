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

//Customer related routes
Route::post('/register-customer', [CustomerController::class, 'createCustomer']);
Route::post('/edit-customer/{customer}', [CustomerController::class, 'showEditScreen']);
Route::put('/edit-customer/{customer}', [CustomerController::class, 'updateCustomer']);
Route::delete('/delete-customer/{customer}', [CustomerController::class, 'deleteCustomer']);

//Itinerary related routes
Route::post('/register-itinerary', [ItineraryController::class, 'createItinerary']);
Route::post('/edit-itinerary/{itinerary}', [ItineraryController::class, 'showEditScreen']);
Route::put('/edit-itinerary/{itinerary}', [ItineraryController::class, 'updateItinerary']);
Route::delete('/delete-itinerary/{itinerary}', [ItineraryController::class, 'deleteItinerary']);

//Employee related routes
Route::post('/register-employee', [EmployeeController::class, 'createEmployee']);
Route::post('/edit-employee/{employee}', [EmployeeController::class, 'showEditScreen']);
Route::put('/edit-employee/{employee}', [EmployeeController::class, 'updateEmployee']);
Route::delete('/delete-employee/{employee}', [EmployeeController::class, 'deleteEmployee']);

//Airline related routes
Route::post('/register-airline', [AirlineController::class, 'createAirline']);
Route::post('/edit-airline/{airline}', [AirlineController::class, 'showEditScreen']);
Route::put('/edit-airline/{airline}', [AirlineController::class, 'updateAirline']);
Route::delete('/delete-airline/{airline}', [AirlineController::class, 'deleteAirline']);

//Airport related routes
Route::post('/register-airport', [AirportController::class, 'createAirport']);
Route::post('/edit-airport/{airport}', [AirportController::class, 'showEditScreen']);
Route::put('/edit-airport/{airport}', [AirportController::class, 'updateAirport']);
Route::delete('/delete-airport/{airport}', [AirportController::class, 'deleteAirport']);

//Location related routes
Route::post('/register-location', [LocationController::class, 'createLocation']);
Route::post('/edit-location/{location}', [LocationController::class, 'showEditScreen']);
Route::put('/edit-location/{location}', [LocationController::class, 'updateLocation']);
Route::delete('/delete-location/{location}', [LocationController::class, 'deleteLocation']);

//Airplane related routes
Route::post('/register-plane', [AirplaneController::class, 'createAirplane']);
Route::post('/edit-plane/{airplane}', [AirplaneController::class, 'showEditScreen']);
Route::put('/edit-plane/{airplane}', [AirplaneController::class, 'updatePlane']);
Route::delete('/delete-plane/{airplane}', [AirplaneController::class, 'deletePlane']);

//Flight related routes
Route::post('/register-flight', [FlightLegController::class, 'createFlightLeg']);
Route::post('/edit-flight/{flight}', [FlightLegController::class, 'showEditScreen']);
Route::put('/edit-flight/{flight}', [FlightLegController::class, 'updateFlight']);
Route::delete('/delete-flight/{flight}', [FlightLegController::class, 'deleteFlight']);

//Itinerary Flights related routes
Route::post('/register-itinerary-flight', [ItineraryFlightsController::class, 'createItineraryFlight']);
Route::post('/edit-itinerary-flight/{itineraryFlight}', [ItineraryFlightsController::class, 'showEditScreen']);
Route::put('/edit-itinerary-flight/{itineraryFlight}', [ItineraryFlightsController::class, 'updateItineraryFlight']);
Route::delete('/delete-itinerary-flight/{itineraryFlight}', [ItineraryFlightsController::class, 'deleteItineraryFlight']);

//Baggage related routes
Route::post('/baggage-check-in', [BaggageController::class, 'createBaggage']);
Route::post('/edit-baggage/{baggage}', [BaggageController::class, 'showEditScreen']);
Route::put('/edit-baggage/{baggage}', [BaggageController::class, 'updateBaggage']);
Route::delete('/delete-baggage/{baggage}', [BaggageController::class, 'deleteBaggage']);

//Incident related routes
Route::post('/register-incident', [IncidentController::class, 'createIncident']);
Route::post('/edit-incident/{incident}', [IncidentController::class, 'showEditScreen']);
Route::put('/edit-incident/{incident}', [IncidentController::class, 'updateIncident']);
Route::delete('/delete-incident/{incident}', [IncidentController::class, 'deleteIncident']);

//Baggage Incidents related routes
Route::post('/register-baggage-incidents', [BaggageIncidentsController::class, 'createBaggageIncidents']);
Route::post('/edit-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'showEditScreen']);
Route::put('/edit-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'updateBaggageIncidents']);
Route::delete('/delete-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'deleteBaggageIncidents']);

//Notifications related routes
Route::post('/register-notification', [NotificationController::class, 'createNotification']);
Route::post('/edit-notification/{notification}', [NotificationController::class, 'showEditScreen']);
Route::put('/edit-notification/{notification}', [NotificationController::class, 'updateNotification']);
Route::delete('/delete-notification/{notification}', [NotificationController::class, 'deleteNotification']);

Route::post('/logout', [UserController::class, 'logout']);

