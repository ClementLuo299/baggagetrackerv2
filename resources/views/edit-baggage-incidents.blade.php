<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker - Edit Baggage Incident</title>
</head>
<body>
    <h1>Edit Baggage Incident</h1>
    <form action="/edit-baggage-incident/{{$baggageIncident->id}}" method="POST">
        @csrf
        @method('PUT')
        
        <p>Baggage Tracker ID</p>
        <input type="text" name="tracker_id" value="{{$baggageIncident->tracker_id}}" required>

        <p>Incident ID</p>
        <input type="text" name="incident" value="{{$baggageIncident->incident}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
