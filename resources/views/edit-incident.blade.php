<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Incident</title>
</head>
<body>
    <h1>Edit Incident</h1>
    <form action="/edit-incident/{{$incident->incident_id}}" method="POST">
        @csrf
        @method('PUT')

        <p>Incident ID</p>
        <input type="text" name="incident_id" value="{{$incident->incident_id}}" required>

        <p>Damaged</p>
        <select name="is_damaged">
            <option value="1" {{$incident->is_damaged == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$incident->is_damaged == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Lost</p>
        <select name="is_lost">
            <option value="1" {{$incident->is_lost == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$incident->is_lost == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Delayed</p>
        <select name="is_delayed">
            <option value="1" {{$incident->is_delayed == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$incident->is_delayed == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Resolved</p>
        <select name="is_resolved">
            <option value="1" {{$incident->is_resolved == 1 ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$incident->is_resolved == 0 ? 'selected' : ''}}>No</option>
        </select>

        <p>Incident Time</p>
        <input type="datetime-local" name="incident_time" value="{{ \Carbon\Carbon::parse($incident->incident_time)->format('Y-m-d\TH:i') }}" required>

        <p>Description</p>
        <input type="text" name="description" value="{{$incident->description}}" required>

        <p>Location</p>
        <input type="text" name="location" value="{{$incident->location}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
