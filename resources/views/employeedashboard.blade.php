<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    @auth

    <p>You are logged in!</p>

    <form action="/logout" method ="POST">
        @csrf
        <Button>Logout</Button>
    </form>

    <form action="/check-in" method ="POST">
        @csrf
        <input type ="text" name="tracker_id" placeholder="tracker id">
        <Button>Add Baggage</Button>
    </form>

    @else

    <p>Logged out</p>

    @endauth
</body>
</html>
