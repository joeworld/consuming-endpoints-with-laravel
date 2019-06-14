<!DOCTYPE html>
<html>
<head>
	<title>Post from Json Typicode</title>

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
    <div class="col-md-4 jumbotron">
    	<p><b>Title:</b> {{ $post->title }}</p>
    	<br>
    	<p><b>Body:</b> {{ $post->body }}</p>
    	<br>
    	<p><b>Author:</b> {{ $object->getUser($post->userId)->name }}</p>
        <p><a href='{{ URL("posts/$post->id/comments") }}'>Click to see comments</a></p>
    	
    </div>
</div>

</div>
</body>
</html>