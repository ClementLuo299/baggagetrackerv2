<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h1>Edit Plane</h1>
    <form action="/edit-airport/{{$airplane->registration_no}}" method="POST">
        @csrf
        @method('PUT')
        <p>Registration number</p>
        <input type = "text" name = "registration_no" value = {{$airplane->registration_no}}>
        <p>Aircraft type</p>
        <input type = "text" name = "type" value = {{$airplane->type}}>
        <p>Aircraft capacity</p>
        <input type = "text" name = "capacity" value = {{$airplane->capacity}}>
        <button>Save Changes</button>
    </form>
</body>
</html>