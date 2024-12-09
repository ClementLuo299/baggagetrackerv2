<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Notification Subject</title>
</head>
<body>
    <h1>Edit Notification Subject</h1>
    <form action="/edit-notification-subject/{{$notificationSubject->id}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Notification ID -->
        <p>Notification ID</p>
        <input type="text" name="notification_id" value="{{$notificationSubject->notification_id}}" required>

        <!-- Tracker ID -->
        <p>Baggage Tracker ID</p>
        <input type="text" name="tracker_id" value="{{$notificationSubject->tracker_id}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
