<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Baggage</title>
</head>
<body>
    <h1>Edit Baggage</h1>
    <form action="/edit-baggage/{{$baggage->tracker_id}}" method="POST">
        @csrf
        @method('PUT')
        
        <p>Tracker ID</p>
        <input type="text" name="tracker_id" value="{{$baggage->tracker_id}}" required>

        <p>Passport No</p>
        <input type="text" name="passport_no" value="{{$baggage->passport_no}}" required>

        <p>Tracker Type</p>
        <input type="text" name="tracker_type" value="{{$baggage->tracker_type}}" required>

        <p>Booking ID</p>
        <input type="text" name="booking_id" value="{{$baggage->booking_id}}" required>

        <p>Time Sensitive</p>
        <select name="is_time_sensitive" required>
            <option value="1" {{$baggage->is_time_sensitive == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$baggage->is_time_sensitive == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Hazardous</p>
        <select name="is_hazardous" required>
            <option value="1" {{$baggage->is_hazardous == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$baggage->is_hazardous == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Baggage Weight</p>
        <input type="text" name="baggage_weight" value="{{$baggage->baggage_weight}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
