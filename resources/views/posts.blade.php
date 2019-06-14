
<!DOCTYPE html>
<html>
<head>
	<title>Posts from Json Typicode</title>

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
    @foreach($posts as $post)
    <div class="col-md-4 jumbotron">
    	<p><b>Title:</b> {{ $post->title }}</p>
    	<br>
    	<p><b>Body:</b> {{ $post->body }}</p>
    	<br>
    	<p><b>Author:</b> <a href="users/{{ $post->userId }}">{{ $object->getUser($post->userId)->name }}</a></p>
    	<p><a href="posts/{{ $post->id }}/comments">Read more to see comments</a></p>
    </div>
	@endforeach
</div>

</div>
</body>
</html>