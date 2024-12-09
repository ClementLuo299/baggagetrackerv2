<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Itinerary Flight</title>
</head>
<body>
    <h1>Edit Itinerary Flight</h1>
    <form action="/edit-itinerary-flight/{{$itineraryFlight->id}}" method="POST">
        @csrf
        @method('PUT') 
        
        <!-- Booking ID -->
        <p>Customer Booking ID</p>
        <input type="text" name="booking_id" value="{{$itineraryFlight->booking_id}}" required>

        <!-- Flight ID -->
        <p>Flight ID</p>
        <input type="text" name="flight_id" value="{{$itineraryFlight->flight_id}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
