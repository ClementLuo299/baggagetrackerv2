<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h2>Customer Login</h2>
    <form action="/login/submit" method="POST">
        @csrf
        <input name = "name" type="text" placeholder="passport number">
        <Button>Login</Button>
    </form>

    <!-- Back Button -->
    <div style="margin-top: 20px;">
        <a href="/">
            <button type="button">Back</button>
        </a>
    </div>
</body>
</html>