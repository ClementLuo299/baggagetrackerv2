<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Location</title>
</head>
<body>
    <h1>Edit Location</h1>
    <form action="/edit-location/{{$location->id}}" method="POST">
        @csrf
        @method('PUT') 

        <!-- Location Name -->
        <p>Location Name</p>
        <input type="text" name="name" value="{{$location->name}}" required>

        <!-- Coordinates -->
        <p>Coordinates</p>
        <input type="text" name="coordinates" value="{{$location->coordinates}}" required>

        <!-- Airport Code -->
        <p>Airport Code (if in airport)</p>
        <input type="text" name="airport" value="{{$location->airport}}">

        <!-- Airplane Registration No -->
        <p>Airplane Registration (if in airplane)</p>
        <input type="text" name="airplane" value="{{$location->airplane}}">

        <!-- Location Type -->
        <p>Location Type (e.g., baggage carousel)</p>
        <input type="text" name="type" value="{{$location->type}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
