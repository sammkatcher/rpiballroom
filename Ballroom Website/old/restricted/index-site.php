<div id="node-50" class="node clear-block">


  <h2><a href="/welcome" title="Welcome!">Welcome!</a></h2>

  <div class="meta">
  
    </div>

  <div class="content">
    <p>Welcome to the home of RPI's ballroom dancing community! RPI Ballroom Dance is composed of four groups: <a href="<?php echo($PAGE_PATH);?>ballroom-latin">Ballroom/Latin</a>, <a href="<?php echo($PAGE_PATH);?>swing">Lindy Hop Swing</a>, <a href="<?php echo($PAGE_PATH);?>tango">Argentine Tango</a>, and the competitive <a href="<?php echo($PAGE_PATH);?>team">Ballroom Team</a>. We are the among the largest student-run organizations at Rensselaer Polytechnic Institute, offering dancers of all skill levels a variety of options to have fun and improve their abilities. We hold various lessons and practices for all types of dance, including lessons specialized in Argentine Tango and Lindy Hop. We welcome all from RPI and the Albany Capital District. We hope you can join us!</p>
<p class="center"><b><br />
<h3>Check out our <a href="template.php?page=schedule">Class Schedule</a> for lesson and practice times!<br />
<h3></h3></h3></b></p>
  </div>

  </div><div id="block-block-1" class="block block-block">

  <div class="content">
    <p><iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=nai7a2kkpn4e2a9i9bqv3g0ddk%40group.calendar.google.com&amp;color=%23B1365F&amp;src=rpiballroomteam%40gmail.com&amp;color=%23AB8B00&amp;src=v15009oab1sj4skj7cjnbcj7n8%40group.calendar.google.com&amp;color=%232F6309&amp;src=ru4fs64du8f894t7e6tftpf9no%40group.calendar.google.com&amp;color=%231B887A&amp;src=6nln2ffpk3m0t9vai7ih250hlk%40group.calendar.google.com&amp;color=%2323164E&amp;src=eb3rd4bd3n7vpt070cagj49h3o%40group.calendar.google.com&amp;color=%23182C57&amp;ctz=America%2FNew_York" style=" border-width:0 " width="275" height="300" frameborder="0" scrolling="no"></iframe></p>
  </div>
</div>
<div id="block-ddblock-1" class="block block-ddblock">

  <div class="content">
    

<!-- block content. -->
<div id="ddblock-1" class="ddblock-contents clear-block">
 <div class="ddblock-content clear-block">
    

  
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script>
	$(function(){
		$('.slideshow img:gt(0)').hide();
		setInterval(function(){$('.slideshow :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slideshow');}, 3000);
	});
	</script>
     <div class="slideshow">
	<?php
		$dir = 'slideshow/';
		$filesnames = scandir($dir);
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
    
  
   </div>
</div>
  </div>
</div>

<div id="block-views-News-block_1" class="block block-views">
  <h2>Recent Updates</h2>

  <div class="content">
    <div class="view view-News view-id-News view-display-id-block_1 view-dom-id-1">
    
  
  
      <div class="view-content">
      <div class="item-list">
	<?php	
	$filesnames = scandir($NEWS_FILEPATH);							//get names of each folder
	echo('<ul>');
	$filesnames = array_reverse($filesnames);
	$it = 0;
	foreach ($filesnames as $file){									//iterate through each folder
		if ($it > 2){
			break;
		}
		if ($file != "." && $file != ".."){
		echo(' <li class="views-row views-row-1 views-row-odd views-row-first"> ');
		include($NEWS_FILEPATH.$file);
		echo('</li>');
		$it++;
		}
	}
	echo('</ul>');
	?>
	
	<a href="<?php echo($PAGE_PATH);?>news" title="">More News</a>
</div>    </div>
  
  
  
  
  
  
</div>   </div>
</div>