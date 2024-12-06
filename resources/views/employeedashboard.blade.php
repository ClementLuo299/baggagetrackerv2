<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    @auth

    <div>
        <h2>Manage Baggage</h2>
    </div>


    <form action="/logout" method ="POST">
        @csrf
        <Button>Logout</Button>
    </form>

    <form action="/check-in" method ="POST">
        @csrf
        <input type ="text" name="tracker_id" placeholder="tracker id">
        <Button>Add Baggage</Button>
    </form>

    <div>
        <h2>Manage Flights</h2>
    </div>

    <div>
        <h2>Manage Airplanes</h2>
    </div>

    <div>
        <form action="/register-plane" method = "POST">
            @csrf
            <input type = "text" name = "registration_no" placeholder="aircraft registration">
            <input type = "type" name = "type" placeholder="aircraft type">
            <input type = "capacity" name = "capacity" placeholder="max capacity">
            <button>Add Airplane</button>
        </form>
    </div>

    <div>
        <h2>Manage Airports</h2>
    </div>

    <div>
        <h2>Manage Airlines</h2>
    </div>

    <div>
        <h2>Manage Employees</h2>
    </div>

    <div>
        <h2>Manage Executives</h2>
    </div>

    @else

    <p>Logged out</p>

    @endauth
</body>
</html>
