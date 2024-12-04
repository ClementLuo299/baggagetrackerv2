<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baggage Tracker</title>
</head>
<body>
    <h2>Register Employee</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" placeholder="name">
        <input type="password" placeholder="password">
        <Button>Register</Button>
    </form>
</body>
</html>