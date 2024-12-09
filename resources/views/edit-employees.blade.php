<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baggage Tracker</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="/edit-employee/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')

        <p>First Name</p>
        <input type="text" name="fname" value={{$user->fname}}>

        <p>Middle Name</p>
        <input type="text" name="mname" value={{$user->mname}}>

        <p>Last Name</p>
        <input type="text" name="lname" value={{$user->lname}}>

        <p>Street</p>
        <input type="text" name="street" value={{$user->street}}>

        <p>Country</p>
        <input type="text" name="country" value={{$user->country}}>

        <p>Postal Code</p>
        <input type="text" name="postal_code" value={{$user->postal_code}}>

        <p>Email</p>
        <input type="text" name="email" value={{$user->email}}>

        <p>Password</p>
        <input type="text" name="password" value=''>

        <p>Role</p>
        <input type="text" name="role" value={{$user->employee->role}}>

        <p>Airline</p>
        <input type="text" name="airline" value={{$user->employee->airline}}>
        <button>Save Changes</button>
    </form>
</body>
</html>