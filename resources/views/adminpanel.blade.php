<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <div>
        <h2>Add Executives</h2>
    </div>
    <form action="/">
        @csrf
        <input name = "name" type="text" placeholder="name">
        <input name = "password" type="password" placeholder="password">
        <Button>Login</Button>
    </form>
</body>
</html>