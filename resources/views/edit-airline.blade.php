<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker - Edit Airline</title>
</head>
<body>
    <h1>Edit Airline</h1>
    <form action="/edit-airline/{{$airline->name}}" method="POST">
        @csrf
        @method('PUT')
        
        <p>Airline Name</p>
        <input type="text" name="name" value="{{$airline->name}}" required>

        <p>Airline Country of Origin</p>
        <input type="text" name="country_of_origin" value="{{$airline->country_of_origin}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
