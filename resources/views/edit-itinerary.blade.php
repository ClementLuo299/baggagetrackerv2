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

        <!-- Customer Passport No -->
        <p>Passport No</p>
        <input type="text" name="passport_no" value="{{$itinerary->passport_no}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
