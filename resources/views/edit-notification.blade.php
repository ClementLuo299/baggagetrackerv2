<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Notification</title>
</head>
<body>
    <h1>Edit Notification</h1>
    <form action="/edit-notification/{{$notification->notification_id}}" method="POST">
        @csrf
        @method('PUT') 

        <!-- Notification ID (for reference) -->
        <p>Notification ID</p>
        <input type="text" name="notification_id" value="{{$notification->notification_id}}" readonly>

        <!-- Content -->
        <p>Notification Content</p>
        <input type="text" name="content" value="{{$notification->content}}" required>

        <!-- Notification Time -->
        <p>Notification Time</p>
        <input type="datetime-local" name="notification_time" value="{{ \Carbon\Carbon::parse($notification->notification_time)->format('Y-m-d\TH:i') }}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
