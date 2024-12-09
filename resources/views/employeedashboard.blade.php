<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    @auth

    <!-- Logout button -->
    <form action="/logout" method ="POST">
        @csrf
        <Button>Logout</Button>
    </form>

    <!-- Manage Customers -->
    <div>
        <div>
            <h2>Manage Customers</h2>
        </div>

        <div>
            <form action="/register-customer" method="POST">
                @csrf
                <input type="text" name="fname" placeholder="first name">
                <input type="text" name="mname" placeholder="middle name">
                <input type="text" name="lname" placeholder="last name">
                <input type="text" name="street" placeholder="street">
                <input type="text" name="country" placeholder="country">
                <input type="text" name="postal_code" placeholder="postal code">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="passport_no" placeholder="passport no">
                <input type="text" name="country_citizenship" placeholder="country of citizenship">
                <button>Add Customer</button>
            </form>
        </div>

        <div>
            <h3>Customers</h3>
            @foreach($users as $user)
            @if($user->customer)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <div>
                    <h4>{{$user->fname}}</h4>
                    <h4>{{$user->lname}}</h4>
                </div>
                Passport No: {{$user->customer->passport_no}},
                Country Citizenship: {{$user->customer->country_citizenship}},
                Email: {{$user->email}},
                Street: {{$user->street}},
                Country: {{$user->country}},
                Postal Code: {{$user->postal_code}}

                <form action="/edit-customer/{{$user->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-customer/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Manage Itinerary -->
    <div>
        <div>
            <h2>Manage Itinerary</h2>
        </div>

        <div>
            <form action="/register-itinerary" method="POST">
                @csrf
                <input type="text" name="booking_id" placeholder="customer booking id">
                <input type="text" name="passport_no" placeholder="customer passport no">
                <button>Add Itinerary</button>
            </form>
        </div>

        <div>
            <h3>Itineraries</h3>
            @foreach($itineraries as $itinerary)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$itinerary->booking_id}}</h4>
                Customer Passport No: {{$itinerary->passport_no}}

                <form action="{{ route('itineraries.destroy', ['booking_id'=>$itinerary->booking_id, 'passport_no'=>$itinerary->passport_no]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Employees -->
    <div>
        <div>
            <h2>Manage Employees</h2>
        </div>

        <div>
            <form action="/register-employee" method="POST">
                @csrf
                <input type="text" name="name" placeholder="username">
                <input type="text" name="password" placeholder="password">
                <input type="text" name="fname" placeholder="first name">
                <input type="text" name="lname" placeholder="last name">
                <input type="text" name="role" placeholder="employee role">
                <input type="text" name="airline" placeholder="employee airline">

                <button>Add Employee</button>
            </form>
        </div>

        <div>
            <h3>Employees</h3>
            @foreach($employees as $employee)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$employee->name}}</h4>
                First Name: {{$employee['fname']}},
                Last Name: {{$employee['lname']}},
                Role: {{$employee['role']}},
                Airline: {{$employee['airline']}}

                <form action="/edit-employee/{{$employee->name}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-employee/{{$employee->name}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>


    <!-- Manage Airlines -->
    <div>
        <div>
            <h2>Manage Airlines</h2>
        </div>

        <div>
            <form action="/register-airline" method="POST">
                @csrf
                <input type="text" name="name" placeholder="airline name">
                <input type="text" name="country_of_origin" placeholder="airline country of origin">

                <button>Add Airline</button>
            </form>
        </div>

        <div>
            <h3>Airlines</h3>
            @foreach($airlines as $airline)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$airline->name}}</h4>
                Country of Origin: {{$airline['country_of_origin']}}

                <form action="/edit-airline/{{$airline->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-airline/{{$airline->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>


    <!-- Manage Airports -->
    <div>
        <div>
            <h2>Manage Airports</h2>
        </div>

        <div>
            <form action="/register-airport" method = "POST">
                @csrf
                <input type = "text" name = "code" placeholder="airport code">
                <input type = "text" name = "name" placeholder="airport name">
                <input type = "text" name = "country" placeholder="airport country">
                <input type = "text" name = "city" placeholder="airport city">            
                <button>Add Airport</button>
            </form>
        </div>

        <div>
            <h3>Airports</h3>
            @foreach($airports as $airport)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$airport->code}}</h4>
                Name: {{$airport['name']}},
                Country: {{$airport['country']}},
                City: {{$airport['city']}}
                <form action="/edit-airport/{{$airport->code}}" method = "POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-airport/{{$airport->code}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Manage Locations -->
    <div>
        <div>
            <h2>Manage Locations</h2>
        </div>

        <div>
            <form action="/register-location" method="POST">
                @csrf
                <input type="text" name="name" placeholder="location name">
                <input type="text" name="coordinates" placeholder="location coordinates">
                <input type="text" name="airport" placeholder="airport code if in airport">
                <input type="text" name="airplane" placeholder="airplane registration_no if in airplane">
                <input type="text" name="type" placeholder="location type (e.g., baggage carousell)">

                <button>Add Location</button>
            </form>
        </div>

        <div>
            <h3>Locations</h3>
            @foreach($locations as $location)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$location->name}}</h4>
                Coordinates: {{$location['coordinates']}},
                Airport: {{$location['airport']}},
                Airplane: {{$location['airplane']}},
                Type: {{$location['type']}}

                <form action="/edit-location/{{$location->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-location/{{$location->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>
    
    <!-- Manage Airplanes -->
    <div>
        <div>
            <h2>Manage Airplanes</h2>
        </div>

        <div>
            <form action="/register-plane" method = "POST">
                @csrf
                <input type = "text" name = "registration_no" placeholder="aircraft registration">
                <input type = "text" name = "type" placeholder="aircraft type">
                <input type = "text" name = "capacity" placeholder="max capacity">
                <button>Add Airplane</button>
            </form>
        </div>

        <div>
            <h3>Airplanes</h3>
            @foreach($airplanes as $airplane)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$airplane->registration_no}}</h4>
                Aircraft type: {{$airplane['type']}},
                Max capacity: {{$airplane['capacity']}},
                Current payload: {{$airplane['payload']}}
                <form action="/edit-plane/{{$airplane->registration_no}}" method = "POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-plane/{{$airplane->registration_no}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Manage Flights -->
    <div>
        <div>
            <h2>Manage Flights</h2>
        </div>

        <div>
            <form action="/register-flight" method = "POST">
                @csrf
                <input type = "text" name = "flight_id" placeholder="flight id">
                <input type = "text" name = "airplane" placeholder="airplane id">
                <input type = "text" name = "origin" placeholder="origin airport id">
                <input type = "text" name = "destination" placeholder="destination airport id">
                <input type = "datetime-local" name = "departure_time" placeholder="departure time">
                <input type = "datetime-local" name = "arrival_time" placeholder="arrival time">
                <button>Add Flight Leg</button>
            </form>
        </div>

        <div>
            <h3>Flights</h3>
            @foreach($flights as $flight)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>{{$flight->flight_id}}</h4>
                Airplane ID: {{$flight['airplane']}},
                Origin Airport ID: {{$flight['origin']}},
                Destination Airport ID: {{$flight['destination']}}
                Departure Time: {{$flight['departure_time']}}
                Arrival Time: {{$flight['arrival_time']}}

                <form action="/edit-flight/{{$flight->flight_id}}" method = "POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-flight/{{$flight->flight_id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Itinerary Flights -->
    <div>
        <div>
            <h2>Manage Itinerary Flights</h2>
        </div>

        <div>
            <form action="/register-itinerary-flight" method="POST">
                @csrf
                <input type="text" name="booking_id" placeholder="customer booking id">
                <input type="text" name="flight_id" placeholder="flight_id">
                <button>Add Itinerary Flight</button>
            </form>
        </div>

        <div>
            <h3>Itinerary Flights</h3>
            @foreach($itineraryFlights as $itineraryFlight)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Booking ID: {{$itineraryFlight->booking_id}}</h4>
                Flight ID: {{$itineraryFlight['flight_id']}}

                <form action="/edit-itinerary-flight/{{$itineraryFlight->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-itinerary-flight/{{$itineraryFlight->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Baggage -->
    <div>
        <div>
            <h2>Manage Baggage</h2>
        </div>

        <div>
            <form action="/baggage-check-in" method="POST">
                @csrf
                <input type="text" name="tracker_id" placeholder="baggage tracker id">
                <input type="text" name="passport_no" placeholder="customer passport no">
                <input type="text" name="tracker_type" placeholder="tracker type">
                <input type="text" name="booking_id" placeholder="booking id">

                <!-- Dropdown for boolean -->
                <select name="is_time_sensitive">
                    <option value="" disabled selected>Is the baggage time sensitive?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <select name="is_hazardous">
                    <option value="" disabled selected>Is the baggage hazardous?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <input type="text" name="baggage_weight" placeholder="baggage weight">

                <button>Add Baggage</button>
            </form>
        </div>

        <div>
            <h3>Baggage</h3>
            @foreach($baggages as $baggage)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Tracker ID: {{$baggage->tracker_id}}</h4>
                Passport No: {{$baggage['passport_no']}},
                Tracker Type: {{$baggage['tracker_type']}},
                Booking ID: {{$baggage['booking_id']}},
                Time Sensitive: {{$baggage['is_time_sensitive'] == 1 ? 'Yes' : 'No'}},
                Hazardous: {{$baggage['is_hazardous'] == 1 ? 'Yes' : 'No'}},
                Baggage Weight: {{$baggage['baggage_weight']}}

                <form action="/edit-baggage/{{$baggage->tracker_id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-baggage/{{$baggage->tracker_id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Location Updates -->
    <div>
        <div>
            <h2>Manage Location Updates</h2>
        </div>

        <!-- Add Location Update Form -->
        <div>
            <form action="/register-location-update" method="POST">
                @csrf
                <input type="datetime-local" name="time" placeholder="Time of update">
                <input type="text" name="tracker_id" placeholder="Tracker ID">
                <input type="text" name="location_name" placeholder="Location Name">
                <button>Add Location Update</button>
            </form>
        </div>

        <!-- Location Update Records -->
        <div>
            <h3>Location Update Records</h3>
            @foreach($locationUpdates as $locationUpdate)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Time: {{$locationUpdate->time}}</h4>
                Tracker ID: {{$locationUpdate->tracker_id}},
                Location Name: {{$locationUpdate->location_name}}

                <!-- Edit Button -->
                <form action="/edit-location-update/{{$locationUpdate->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>

                <!-- Delete Button -->
                <form action="/delete-location-update/{{$locationUpdate->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Manage Incidents -->
    <div>
        <div>
            <h2>Incidents</h2>
        </div>

        <div>
            <form action="/register-incident" method="POST">
                @csrf
                <input type="text" name="incident_id" placeholder="incident id">

                <!-- Dropdown for boolean -->
                <select name="is_damaged">
                    <option value="" disabled selected>Is the baggage damaged?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <select name="is_lost">
                    <option value="" disabled selected>Is the baggage lost?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <select name="is_delayed">
                    <option value="" disabled selected>Is the baggage delayed?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <select name="is_resolved">
                    <option value="" disabled selected>Is the incident resolved?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <input type="datetime-local" name="incident_time" placeholder="time of incident">
                <input type="text" name="description" placeholder="description of incident">
                <input type="text" name="location" placeholder="location of incident">

                <button>Add Incident</button>
            </form>
        </div>

        <div>
            <h3>Incident Records</h3>
            @foreach($incidents as $incident)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Incident ID: {{$incident->incident_id}}</h4>
                Damaged: {{$incident['is_damaged'] == 1 ? 'Yes' : 'No'}},
                Lost: {{$incident['is_lost'] == 1 ? 'Yes' : 'No'}},
                Delayed: {{$incident['is_delayed'] == 1 ? 'Yes' : 'No'}},
                Resolved: {{$incident['is_resolved'] == 1 ? 'Yes' : 'No'}},
                Incident Time: {{$incident['incident_time']}},
                Description: {{$incident['description']}},
                Location: {{$incident['location']}}

                <form action="/edit-incident/{{$incident->incident_id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-incident/{{$incident->incident_id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Baggage Incidents -->
    <div>
        <div>
            <h2>Manage Baggage Incidents</h2>
        </div>

        <div>
            <form action="/register-baggage-incidents" method="POST">
                @csrf
                <input type="text" name="tracker_id" placeholder="baggage tracker id">
                <input type="text" name="incident" placeholder="incident id">

                <button>Add Baggage Incident</button>
            </form>
        </div>

        <div>
            <h3>Baggage Incident Records</h3>
            @foreach($baggageIncidents as $baggageIncident)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Baggage Incident ID: {{$baggageIncident->id}}</h4>
                Tracker ID: {{$baggageIncident['tracker_id']}},
                Incident ID: {{$baggageIncident['incident']}}
                
                <form action="/edit-baggage-incident/{{$baggageIncident->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-baggage-incident/{{$baggageIncident->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Manage Incident Employees -->
    <div>
        <div>
            <h2>Manage Incident Employees</h2>
        </div>

        <!-- Add Incident Employee Form -->
        <div>
            <form action="/register-incident-employee" method="POST">
                @csrf
                <input type="text" name="incident_id" placeholder="Incident ID">
                <input type="text" name="employee" placeholder="Employee">
                <button>Add Incident Employee</button>
            </form>
        </div>

        <!-- Incident Employee Records -->
        <div>
            <h3>Incident Employee Records</h3>
            @foreach($incidentEmployees as $incidentEmployee)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Incident ID: {{$incidentEmployee->incident_id}}</h4>
                Employee: {{$incidentEmployee->employee}}

                <!-- Edit Button -->
                <form action="/edit-incident-employee/{{$incidentEmployee->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>

                <!-- Delete Button -->
                <form action="/delete-incident-employee/{{$incidentEmployee->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Manage Notification Subject -->
    <div>
        <div>
            <h2>Manage Notification Subject</h2>
        </div>

        <!-- Add Notification Subject Form -->
        <div>
            <form action="/register-notification-subject" method="POST">
                @csrf
                <input type="text" name="notification_id" placeholder="Notification ID">
                <input type="text" name="tracker_id" placeholder="Baggage Tracker ID">
                <button>Add Notification Subject</button>
            </form>
        </div>

        <!-- Notification Subject Records -->
        <div>
            <h3>Notification Subject Records</h3>
            @foreach($notificationSubjects as $notificationSubject)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Notification ID: {{$notificationSubject->notification_id}}</h4>
                Tracker ID: {{$notificationSubject->tracker_id}}

                <!-- Edit Button -->
                <form action="/edit-notification-subject/{{$notificationSubject->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>

                <!-- Delete Button -->
                <form action="/delete-notification-subject/{{$notificationSubject->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Manage Notifications -->
    <div>
        <div>
            <h2>Manage Notifications</h2>
        </div>

        <div>
            <form action="/register-notification" method="POST">
                @csrf
                <input type="text" name="notification_id" placeholder="notification id">
                <input type="text" name="content" placeholder="notification content">
                <input type="datetime-local" name="notification_time" placeholder="time of notification">
                <button>Add Notification</button>
            </form>
        </div>

        <div>
            <h3>Notification Records</h3>
            @foreach($notifications as $notification)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Notification ID: {{$notification->notification_id}}</h4>
                Content: {{$notification['content']}},
                Notification Time: {{$notification['notification_time']}}
                
                <form action="/edit-notification/{{$notification->notification_id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>
                <form action="/delete-notification/{{$notification->notification_id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Manage Notification Sent -->
    <div>
        <div>
            <h2>Manage Notification Sent</h2>
        </div>

        <!-- Add Notification Sent Form -->
        <div>
            <form action="/register-notification-sent" method="POST">
                @csrf
                <input type="text" name="notification_id" placeholder="Notification ID">
                <input type="text" name="recipient" placeholder="Recipient (Customer Passport No)">
                <input type="text" name="sender" placeholder="Sender (Employee User ID)">
                <button>Add Notification Sent</button>
            </form>
        </div>

        <!-- Notification Sent Records -->
        <div>
            <h3>Notification Sent Records</h3>
            @foreach($notificationSents as $notificationSent)
            <div style="border:3px solid black; padding:10px; margin: 10px">
                <h4>Notification ID: {{$notificationSent->notification_id}}</h4>
                Recipient: {{$notificationSent->recipient}},
                Sender: {{$notificationSent->sender}}

                <!-- Edit Button -->
                <form action="/edit-notification-sent/{{$notificationSent->id}}" method="POST">
                    @csrf
                    <button>Edit</button>
                </form>

                <!-- Delete Button -->
                <form action="/delete-notification-sent/{{$notificationSent->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Manage Executives -->
    <div>
        <h2>Manage Executives</h2>
    </div>

    @else

    <p>Logged out</p>

    @endauth
</body>
</html>
