<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h1>Edit Plane</h1>
    <form action="/edit-airport/{{$airport->code}}" method="POST">
        @csrf
        @method('PUT')
        <p>Airport code</p>
        <input type = "text" name = "code" value = {{$airport->code}}>
        <p>Airport name</p>
        <input type = "text" name = "name" value = {{$airport->name}}>
        <p>Airport country</p>
        <input type = "text" name = "country" value = {{$airport->country}}>
        <p>Airport city</p>
        <input type = "text" name = "city" value = {{$airport->city}}>
        <button>Save Changes</button>
    </form>
</body>
</html>