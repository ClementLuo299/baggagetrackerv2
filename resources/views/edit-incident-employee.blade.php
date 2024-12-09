<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Incident Employee</title>
</head>
<body>
    <h1>Edit Incident Employee</h1>
    <form action="/edit-incident-employee/{{$incidentEmployee->id}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Incident ID -->
        <p>Incident ID</p>
        <input type="text" name="incident_id" value="{{$incidentEmployee->incident_id}}" required>

        <!-- Employee -->
        <p>Employee</p>
        <input type="text" name="employee" value="{{$incidentEmployee->employee}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
