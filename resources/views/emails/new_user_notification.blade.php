<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to KLEOS family!</h1>
    <p>
        Hi {{ $user->name }},
        <br>
        Your account has been created successfully. Here are your login details:
        <br>
        Email: {{ $user->email }}
        <br>
        Password: {{ $password }}
    </p>
</body>
</html>
