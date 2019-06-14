
<!DOCTYPE html>
<html>
<head>
	<title>Comments from Json Typicode</title>

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
    <h3><b>Comments for Post:</b> <a href='{{ URL("posts/$post->id") }}'>{{ $post->title }}</a></h3><br>
    <p><b>Body:</b> {{ $post->body }}</p>
<div class="row">
    @foreach($comments as $comment)
    <div class="col-md-4 jumbotron">
        <p><b>Comment Name: </b>{{ $comment->name }}</p>
        <p><b>Comment Body: </b>{{ $comment->body }}</p>
        <p><b>Comment By: </b>{{ $comment->email }}</p>
    </div>
	@endforeach
</div>

</div>
</body>
</html>