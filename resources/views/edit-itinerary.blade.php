<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Itinerary</title>
</head>
<body>
    <h1>Edit Itinerary</h1>
    <form action="/edit-itinerary/{{$itinerary->booking_id}}" method="POST">
        @csrf
        @method('PUT') 
        
        <!-- Customer Booking ID -->
        <p>Booking ID</p>
        <input type="text" name="booking_id" value="{{$itinerary->booking_id}}" required>

        Passport No:
        <select name="passport_no" id="passport_no">
            @foreach($users as $user)
                    @if ($user->customer)
                        <option value="{{ $user->passport_no }}">
                            {{ $user->customer->passport_no }} {{ $user->fname }} {{ $user->lname }}
                        </option>
                    @endif
            @endforeach
        </select>

        <button>Save Changes</button>
    </form>
</body>
</html>
