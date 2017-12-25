<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="unsplash-source.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script>
		$(function(){


		var photo = new UnsplashPhoto();

		var a = photo.all()
	         .fromCategory("books")
		.width(2048)
		.height(1200)

     .fetch(); // => "https://source.unsplash.com/user/erondu/2048x1200/daily"
     	$("body").css("background","url('"+a+"')");
		})

 </script>
</head>
<body>
	
</body>
</html>