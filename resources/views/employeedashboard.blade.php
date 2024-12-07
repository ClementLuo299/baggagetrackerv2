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
        <h3>Airplanes</h3>
        @foreach($airplanes as $airplane)
        <div style="border:3px solid black; padding:10px; margin: 10px">
            <h4>{{$airplane['registration_no']}}</h4>
            Aircraft type: {{$airplane['type']}},
            Max capacity: {{$airplane['capacity']}},
            Current payload: {{$airplane['payload']}}
            <form action="/edit-plane/{{$airplane->registration_no}}">
                <button>Edit</button>
            </form>
            <form action="/delete-plane/{{$airplane->registration_no}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
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
