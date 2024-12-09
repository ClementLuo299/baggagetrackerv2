<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Location Update</title>
</head>
<body>
    <h1>Edit Location Update</h1>
    <form action="/edit-location-update/{{$locationUpdate->id}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Location Update Time -->
        <p>Time of Update</p>
        <input type="datetime-local" name="time" value="{{$locationUpdate->time}}" required>

        <!-- Tracker ID -->
        <p>Tracker ID</p>
        <input type="text" name="tracker_id" value="{{$locationUpdate->tracker_id}}" required>

        <!-- Location Name -->
        <p>Location Name</p>
        <input type="text" name="location_name" value="{{$locationUpdate->location_name}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
