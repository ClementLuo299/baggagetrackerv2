<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Flight</title>
</head>
<body>
    <h1>Edit Flight</h1>
    <form action="/edit-flight/{{$flight->flight_id}}" method="POST">
        @csrf
        @method('PUT')

        <p>Flight ID</p>
        <input type="text" name="flight_id" value="{{$flight->flight_id}}" required>

        <p>Airplane ID</p>
        <input type="text" name="airplane" value="{{$flight->airplane}}" required>

        <p>Origin Airport ID</p>
        <input type="text" name="origin" value="{{$flight->origin}}" required>

        <p>Destination Airport ID</p>
        <input type="text" name="destination" value="{{$flight->destination}}" required>

        <p>Departure Time</p>
        <input type="datetime-local" name="departure_time" value="{{ \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') }}" required>

        <p>Arrival Time</p>
        <input type="datetime-local" name="arrival_time" value="{{ \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i') }}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
