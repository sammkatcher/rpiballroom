<!doctype html>
<html lang="en">
<head>
	<title>Simplest jQuery Slideshow</title>
	<!--source:
	http://css-tricks.com/snippets/jquery/simple-auto-playing-slideshow/
	http://snook.ca/archives/javascript/simplest-jquery-slideshow
	-->
	<style>
	.slideshow img { 
		position:absolute; 
		left:0; 
		top:0; 
		height: 
		240px; 
		width: 240px;
	}
	.slideshow { 
		margin: 50px auto; 
		position: relative; 
		width: 240px; 
		height: 240px; 
		box-shadow: 0 0 20px rgba(0,0,0,0.4); 
	}
	</style>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
	$(function(){
		$('.slideshow img:gt(0)').hide();
		setInterval(function(){$('.slideshow :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slideshow');}, 3000);
	});
	</script>

</head>
<body>
	<div class="slideshow">
	<?php
		$dir = 'slideshow/';
		$filesnames = scandir($dir);
		print_r($filenames);
		foreach ($filesnames as $file){
			if ($file != "." && $file != ".."){
				//echo('<div>');
				echo('<img id="slideimg" src="');
				echo($dir.$file);
				echo('">');
				//echo('</div>');
			}
		}
		?>
	</div>
</body>
</html>