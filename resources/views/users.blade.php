<!DOCTYPE html>
<html>
<head>
	<title>Users from Json Typicode</title>

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
    @foreach($users as $user)
    <div class="col-md-4 jumbotron">
    	<p><b>Name:</b> {{ $user->name }}</p>
    	<br>
    	<p><b>Email:</b> {{ $user->email }}</p>
    	<p><a href="users/{{ $user->id }}">View complete profile</a></p>
    </div>
	@endforeach
</div>

</div>
</body>
</html>