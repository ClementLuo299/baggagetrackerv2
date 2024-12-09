<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Notification Sent</title>
</head>
<body>
    <h1>Edit Notification Sent</h1>
    <form action="/edit-notification-sent/{{$notificationSent->id}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Notification ID -->
        <p>Notification ID</p>
        <input type="text" name="notification_id" value="{{$notificationSent->notification_id}}" required>

        <!-- Recipient -->
        <p>Recipient (Customer Passport No)</p>
        <input type="text" name="recipient" value="{{$notificationSent->recipient}}" required>

        <!-- Sender -->
        <p>Sender (Employee User ID)</p>
        <input type="text" name="sender" value="{{$notificationSent->sender}}" required>

        <button>Save Changes</button>
    </form>
</body>
</html>
