<?php

use App\Models\User;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Baggage;
use App\Models\Airplane;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Incident;
use App\Models\Location;
use App\Models\FlightLeg;
use App\Models\Itinerary;
use App\Models\Notification;

use App\Models\LocationUpdate;
use App\Models\BaggageIncidents;
use App\Models\ItineraryFlights;
use App\Models\NotificationSent;
use App\Models\IncidentEmployees;
use Illuminate\Support\Facades\DB;
use App\Models\NotificationSubject;
use Illuminate\Support\Facades\Auth;
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
Route::post('/login/submit', [UserController::class, 'customerLogin']);


Route::get('/employees', function () {
    $airplanes = Airplane::all();
    $airports = Airport::all();
    $users = User::all();
    $itineraries = Itinerary::all();
    $employees = Employee::all();
    $airlines = Airline::all();
    $locations = Location::all();
    $locationUpdates = LocationUpdate::all();
    $incidentEmployees = IncidentEmployees::all();
    $flights = FlightLeg::all();
    $itineraryFlights = ItineraryFlights::all();
    $baggages = Baggage::all();
    $incidents = Incident::all();
    $baggageIncidents = BaggageIncidents::all();
    $id = Auth::id();
    $customerBaggages = Baggage::all();
    if(User::find($id)->hasRole('Customer')){
        $user = User::find($id);
        $customerBaggages = Baggage::where('passport_no',$user->customer->passport_no)->get();
    }
    $customerNotifications = Notification::all();
    if(User::find($id)->hasRole('Customer')){
        $user = User::find($id);
        $customerNotificationsSent = NotificationSent::where('recipient',$user->id)->get();
        $not_id = $customerNotificationsSent->pluck('notification_id');
        $customerNotifications = Notification::where('notification_id', $not_id)->get();
    }
    $notifications = Notification::all();
    $notificationSubjects = NotificationSubject::all();
    $notificationSents = NotificationSent::all();
    return view('employeedashboard', ['users'=>$users,  'customerbaggages' => $customerBaggages, 'airplanes' => $airplanes, 'airports'=>$airports 
    , 'itineraries'=>$itineraries, 'airlines'=>$airlines, 'locations'=>$locations
    , 'flights'=>$flights, 'itineraryFlights'=>$itineraryFlights, 'baggages'=>$baggages, 'incidents'=>$incidents
    , 'baggageIncidents'=>$baggageIncidents, 'notifications'=>$notifications, 'locationUpdates'=>$locationUpdates
    , 'incidentEmployees'=>$incidentEmployees, 'notificationSubjects'=>$notificationSubjects
    , 'notificationSents'=>$notificationSents, 'customernotifications' => $customerNotifications]);
});

//Customer related routes
Route::post('/register-customer', [CustomerController::class, 'createCustomer']);
Route::post('/edit-customer/{user}', [CustomerController::class, 'showEditScreen']);
Route::put('/edit-customer/{user}', [CustomerController::class, 'updateCustomer']);
Route::delete('/delete-customer/{customer}', [CustomerController::class, 'deleteCustomer']);

//Itinerary related routes
Route::post('/register-itinerary', [ItineraryController::class, 'createItinerary']);
//Route::post('/edit-itinerary/{booking_id}', [ItineraryController::class, 'showEditScreen']);
//Route::put('/edit-itinerary/{booking_id}', [ItineraryController::class, 'updateItinerary']);
Route::delete('/delete-itinerary/{booking_id}/{passport_no}', [ItineraryController::class, 'deleteItinerary'])->name('itineraries.destroy');

//Employee related routes
Route::post('/register-employee', [EmployeeController::class, 'createEmployee']);
Route::post('/edit-employee/{user}', [EmployeeController::class, 'showEditScreen']);
Route::put('/edit-employee/{user}', [EmployeeController::class, 'updateEmployee']);
Route::delete('/delete-employee/{user}', [EmployeeController::class, 'deleteEmployee']);

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
//Route::post('/edit-itinerary-flight/{itineraryFlight}', [ItineraryFlightsController::class, 'showEditScreen']);
//Route::put('/edit-itinerary-flight/{itineraryFlight}', [ItineraryFlightsController::class, 'updateItineraryFlight']);
Route::delete('/delete-itinerary-flight/{booking_id}/{flight_id}', [ItineraryFlightsController::class, 'deleteItineraryFlight'])->name('itineraryflight.destroy');

//Baggage related routes
Route::post('/baggage-check-in', [BaggageController::class, 'createBaggage']);
Route::post('/edit-baggage/{baggage}', [BaggageController::class, 'showEditScreen']);
Route::put('/edit-baggage/{baggage}', [BaggageController::class, 'updateBaggage']);
Route::delete('/delete-baggage/{baggage}', [BaggageController::class, 'deleteBaggage']);

// Location Update related Routes
Route::post('/register-location-update', [LocationUpdateController::class, 'createLocationUpdate']);
Route::get('/edit-location-update/{locationUpdate}', [LocationUpdateController::class, 'showEditScreen']);
Route::put('/edit-location-update/{locationUpdate}', [LocationUpdateController::class, 'updateLocationUpdate']);
Route::delete('/delete-location-update/{locationUpdate}', [LocationUpdateController::class, 'deleteLocationUpdate']);

//Incident related routes
Route::post('/register-incident', [IncidentController::class, 'createIncident']);
Route::post('/edit-incident/{incident}', [IncidentController::class, 'showEditScreen']);
Route::put('/edit-incident/{incident}', [IncidentController::class, 'updateIncident']);
Route::delete('/delete-incident/{incident}', [IncidentController::class, 'deleteIncident']);

//Incident Employees routes
Route::post('/register-incident-employee', [IncidentEmployeesController::class, 'createIncidentEmployees']);
Route::get('/edit-incident-employee/{incidentEmployee}', [IncidentEmployeesController::class, 'showEditScreen']);
Route::put('/edit-incident-employee/{incidentEmployee}', [IncidentEmployeesController::class, 'updateIncidentEmployees']);
Route::delete('/delete-incident-employee/{incidentEmployee}', [IncidentEmployeesController::class, 'deleteIncidentEmployees']);

//Baggage Incidents related routes
Route::post('/register-baggage-incidents', [BaggageIncidentsController::class, 'createBaggageIncidents']);
Route::post('/edit-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'showEditScreen']);
Route::put('/edit-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'updateBaggageIncidents']);
Route::delete('/delete-baggage-incidents/{baggageIncidents}', [BaggageIncidentsController::class, 'deleteBaggageIncidents']);

// Notification Subject related routes
Route::post('/register-notification-subject', [NotificationSubjectController::class, 'createNotificationSubject']);
Route::get('/edit-notification-subject/{notificationSubject}', [NotificationSubjectController::class, 'showEditScreen']);
Route::put('/edit-notification-subject/{notificationSubject}', [NotificationSubjectController::class, 'updateNotificationSubject']);
Route::delete('/delete-notification-subject/{notificationSubject}', [NotificationSubjectController::class, 'deleteNotificationSubject']);

//Notifications related routes
Route::post('/register-notification', [NotificationController::class, 'createNotification']);
Route::post('/edit-notification/{notification}', [NotificationController::class, 'showEditScreen']);
Route::put('/edit-notification/{notification}', [NotificationController::class, 'updateNotification']);
Route::delete('/delete-notification/{notification}', [NotificationController::class, 'deleteNotification']);


// Notification Sent related routes
Route::post('/register-notification-sent/{notification_id}', [NotificationSentController::class, 'createNotificationSent']);
Route::get('/edit-notification-sent/{notificationSent}', [NotificationSentController::class, 'showEditScreen']);
Route::put('/edit-notification-sent/{notificationSent}', [NotificationSentController::class, 'updateNotificationSent']);
Route::delete('/delete-notification-sent/{notificationSent}', [NotificationSentController::class, 'deleteNotificationSent']);

Route::post('/logout', [UserController::class, 'logout']);

