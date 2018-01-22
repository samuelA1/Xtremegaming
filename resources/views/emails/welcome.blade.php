<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to Xtreme Gaming Blog {{$user['name']}}</h2>
<br/>
Your registered email is <strong>{{$user['email']}}</strong> and password is <strong>{{($user['password']}}</strong>
<br>
Thanks.
</body>

</html>