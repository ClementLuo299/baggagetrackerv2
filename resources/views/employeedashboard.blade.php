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
            <form action="/register-customer" method = "POST">
                @csrf
                <input type = "text" name = "fname" placeholder= "first name">
                <input type = "text" name = "mname" placeholder="middle name">
                <input type = "text" name = "lname" placeholder="last name">
                <input type = "text" name = "street" placeholder="street">
                <input type = "text" name = "country" placeholder="country">
                <input type = "text" name = "postal_code" placeholder="postal code">
                <input type = "text" name = "email" placeholder="email">
                <input type = "text" name = "passport_no" placeholder="passport no">
                <input type = "text" name = "country_citizenship" placeholder="country of citizenship">
                <button>Add Customer</button>
            </form>
        </div>
    </div>

    <!-- Manage Itinerary -->
    <div>
        <div>
            <h2>Manage Itinerary</h2>
        </div>

        <div>
            <form action="/register-itinerary" method = "POST">
                @csrf
                <input type = "text" name = "booking_id" placeholder="customer booking id">
                <input type = "text" name = "passport_no" placeholder="customer passport no">
                <button>Add Itinerary</button>
            </form>
        </div>
    </div>

    <!-- Manage Employees -->
    <div>
        <div>
            <h2>Manage Employees</h2>
        </div>
    
        <div>
            <form action="/register-employee" method = "POST">
                @csrf
                <input type = "text" name = "name" placeholder="username">
                <input type = "text" name = "password" placeholder="password">
                <input type = "text" name = "fname" placeholder="first name">
                <input type = "text" name = "lname" placeholder="last name">
                <input type = "text" name = "role" placeholder="employee role">         
                <input type = "text" name = "airline" placeholder="employee airline">         
    
                <button>Add Employee</button>
            </form>
        </div>
    </div>

    <!-- Manage Airlines -->
    <div>
        <div>
            <h2>Manage Airlines</h2>
        </div>
    
        <div>
            <form action="/register-airline" method = "POST">
                @csrf
                <input type = "text" name = "name" placeholder="airline name">
                <input type = "text" name = "country_of_origin" placeholder="airline country of origin">         
                <button>Add Airline</button>
            </form>
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
            <form action="/register-location" method = "POST">
                @csrf
                <input type = "text" name = "name" placeholder="location name">
                <input type = "text" name = "coordinates" placeholder="location coordinates">         
                <input type = "text" name = "airport" placeholder="airport code if in airport">
                <input type = "text" name = "airplane" placeholder="airplane registration_no if in airplane">
                <input type = "text" name = "type" placeholder="location type (e.g., baggage carousell)">       

                <button>Add Location</button>
            </form>
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
    </div>

    <!--Manage Itinerary Flights-->
    <div>
        <div>
            <h2>Manage Itinerary Flights</h2>
        </div>

        <div>
            <form action="/register-itinerary-flight" method = "POST">
                @csrf
                <input type = "text" name = "booking_id" placeholder="customer booking id">
                <input type = "text" name = "flight_id" placeholder="flight_id">
                <button>Add Itinerary Flight</button>
            </form>
        </div>
    </div>    
    
    <!-- Manage Baggage -->
    <div>
        <div>
            <h2>Manage Baggage</h2>
        </div>
    
        <div>
            <form action="/baggage-check-in" method ="POST">
                @csrf
                <input type ="text" name="tracker_id" placeholder="baggage tracker id">
                <input type ="text" name="passport_no" placeholder="customer passport no">
                <input type ="text" name="tracker_type" placeholder="tracker type">
                <input type ="text" name="booking_id" placeholder="booking id">
    
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
    
                <input type ="text" name="baggage_weight" placeholder="baggage weight">
    
                <Button>Add Baggage</Button>
            </form>
        </div>
    </div>
     
    <!-- Manage Incidents -->
    <div>
        <div>
            <h2>Incidents</h2>
        </div>
    
        <div>
            <form action="/register-incident" method = "POST">
                @csrf
                <input type = "text" name = "incident_id" placeholder="incident id">
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
            
            <input type = "datetime-local" name = "incident_time" placeholder="time of incident">
            <input type = "text" name = "description" placeholder="description of incident">
            <input type = "text" name = "location" placeholder="location of incident">
                <button>Add Incident</button>
            </form>
        </div>

    </div>
    
    <!-- Manage Baggage Incidents -->
    <div>
        <div>
            <h2>Manage Baggage Incidents</h2>
        </div>
    
        <div>
            <form action="/register-baggage-incidents" method = "POST">
                @csrf
                <input type = "text" name = "tracker_id" placeholder="baggage tracker id">
                <input type = "text" name = "incident" placeholder="incident id">         
                <button>Add Baggage Incident</button>
            </form>
        </div>         
    </div>

    <!-- Manage Notifications -->
    <div>
        <div>
            <h2>Notification</h2>
        <div>
    
        <div>
            <form action="/register-notification" method = "POST">
                @csrf
                <input type = "text" name = "notification_id" placeholder="notification id">
                <input type = "text" name = "content" placeholder="notification content">
                <input type = "datetime-local" name = "notification_time" placeholder="time of notification">
                <button>Add Notification</button>
            </form>
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
