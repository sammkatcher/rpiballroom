<?php;require_once('VARS.php');if(!checkinclude($INCLUDED)) {    header("location:".$PAGE_PATH."404");     die();}?><style>
table tr:hover{background-color:#ddd }
table a{display:block;text-decoration:none;}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="media_headers">
<h2><a href="http://flickr.com/rpiballroom" title="">Flickr</a></h2><br />
<h2><a href="http://instagram.com/rpiballroom/" title="">Instagram</a></h2><br />
<h2><a href="http://www.facebook.com/RPIBallroom" title="">Facebook</a></h2><br />
<div class="fb-like-box" data-href="https://www.facebook.com/RPIBallroom" data-width="600" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div><br />
</div>
<br /><br />
<div class="media_headers">
<h2>Photos</h2>
</div>
<br />
<?php	
	$dir = 'media/';
	$filesnames = scandir($dir);									//get names of each folder
	echo('<table>');
	$filesnames = array_reverse($filesnames);
	foreach ($filesnames as $file){									//iterate through each folder
		if ($file[0] != "."){
			$pattern = "/([0-9]{4})-([0-9]{2})-([0-9]{2})(.*)/";
			preg_match($pattern, $file, $matches);					//separate parts of name into date and name
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			$event_name = trim(preg_replace('/_/',' ',$matches[4]));
			//echo a link to the media viewer for that folder
			echo('<tr><td> <a href="'.$PAGE_PATH.'media_viewer&album='.$file.'">'.$event_name.'</a></td><td><a href="template.php?page=media_viewer&album='.$file.'">'.$month.'/'.$day.'/'.$year.'</a></td></tr>');
		}
	}
	echo('</table>');
?>