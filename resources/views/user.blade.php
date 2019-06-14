
<!DOCTYPE html>
<html>
<head>
	<title>User from Json Typicode</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<div class="row">
<div class="container">
<div class="row">
    <div class="col-md-4 jumbotron">
        <p><b>Name:</b> {{ $user->name }}</p>
        <p><b>User Name:</b> {{ $user->username }}</p>
        <p><b>User Email:</b> {{ $user->email }}</p>
        <p><b>User Street:</b> {{ $user->address->street }}</p>
        <p><b>User Suite:</b> {{ $user->address->suite }}</p>
        <p><b>User City:</b> {{ $user->address->city }}</p>
        <p><b>User Location Latitude:</b> {{ $user->address->geo->lat }}</p>
        <p><b>User Location Lng:</b> {{ $user->address->geo->lng }}</p>
        <p><a href='{{ URL("users") }}'>Click to see other users</a></p>
    </div>
</div>
</div>

</div>
</body>
</html>