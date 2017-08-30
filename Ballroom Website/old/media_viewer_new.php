<?php 
	if(isset($_GET["album"])){
		$path = 'media/'.$_GET["album"];
		if(file_exists($path)){
			// if folder exists, display the content
			$dir = 'media/';
			$pattern = "/([0-9]{4})-([0-9]{2})-([0-9]{2})(.*)/";
			preg_match($pattern, $_GET["album"], $matches);					//separate parts of name into date and name
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			$event_name = trim(preg_replace('/_/',' ',$matches[4]));
		}
		else{
			include('404.php');
		}
	}
	else{
		include($PAGE_PATH.'media');
	}
	
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.infinitecarousel3.js"></script>
<script type="text/javascript">
$(function(){
	$('#carousel').infiniteCarousel({
		imagePath: 'site_images/',
		transitionSpeed:450,
		displayTime: 6000,
		internalThumbnails: false,
		thumbnailType: 'images',
		customClass: 'myCarousel',
		progressRingColorOpacity: '0,0,0,.9',
		progressRingBackgroundOn: false,
		inView: 1,
		advance: 1,
		autoPilot: true,
		prevNextInternal: false,
		autoHideCaptions: false,
            margin: 40
	});

});
</script>
<?php echo('<h1>'.$event_name.'</h1>'); ?>
<div style="margin:auto" id="carousel">
<ul>
<?php
$filesnames = scandir($dir.$_GET["album"]);
			foreach ($filesnames as $file){
				if ($file != "." && $file != ".."){
					//echo('<a href="'.$path.'/'.$file.'"><img style="width: 200px;" src="'.$path.'/'.$file.'"></a>');
					echo('<li><img alt="" src="'.$path.'/'.$file.'" width="400" height="600" /></li>'); // add captions: <p>Dancing!</p>
				}
			}
?>
</ul>
</div>