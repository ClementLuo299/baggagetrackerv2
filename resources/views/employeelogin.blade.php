<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h2>Employee Login</h2>
    <form action="/" method="POST">
        @csrf
        <input name = "userID" type="text" placeholder="name">
        <input name = "password" type="password" placeholder="password">
        <Button>Register</Button>
    </form>
</body>
</html>