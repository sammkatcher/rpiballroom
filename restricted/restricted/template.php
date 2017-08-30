<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require('VARS.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="The home of RPI's ballroom dancing community." />
<meta name="keywords" content="RPI, rensselaer, polytechnic, institute, albany, ny, new, york, capital, region, district, classes, lessons, college, dancesport, ballroom, dance, club, team, argentine, tango, swing, lindy, hop" />
<link rel="icon" type="image/x-icon" href="http://ballroom.union.rpi.edu/sites/all/themes/ballroom/images/favicon.ico" />
<title>RPI Ballroom Dance | ballroom.union.rpi.edu | The home of RPI's ballroom dancing community.</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
<link type="text/css" rel="stylesheet" media="all" href="style1.css" />
<link type="text/css" rel="stylesheet" media="all" href="style2.css" />
<link type="text/css" rel="stylesheet" media="all" href="slideshow_css.css" />


</head>

<body>
<div id="wrapper">
	<div id="header">
		<ul id="navbar">
			<li id="home" class="navitem"><a href="<?php echo($BASE_PATH);?>">home</a></li>
			<li id="calendar" class="navitem"><a href="<?php echo($PAGE_PATH);?>calendar">calendar</a></li>
			<li id="media" class="navitem"><a href="<?php echo($PAGE_PATH);?>media">media</a></li>
			<li id="contact" class="navitem"><a href="<?php echo($PAGE_PATH);?>contact">contact</a></li>
		</ul>
	</div> <!-- /header -->

    <div id="panels" class="clearfix">
    	<div id="panel-main">
			<div id="panel-main-content">
				<?php 
				if(isset($_GET["page"])){
					if(file_exists($_GET["page"].'.php')){
						include($_GET["page"].'.php');
					}
					else{
						include('404.php');
					}
				}
				elseif(isset($_GET["news"])){
					if(file_exists($NEWS_FILEPATH.$_GET["news"].'.php')){
						include($NEWS_FILEPATH.$_GET["news"].'.php');
					}
					else{
						include('news.php');
					}
				}
				else{
					include('index.php');
				}
				 ?>

			</div><!-- /panel-main-content -->

        </div> <!-- /panel_main -->
      
		<div id="panel-aux">
			<div id="block-block-4" class="block block-block">
  <h2>#RPIBallroom on Instagram!</h2>

  <div class="content">
    <p><iframe src="http://snapwidget.com/sl/?h=cnBpYmFsbHJvb218aW58MzAwfDF8Nnx8eWVzfDV8bm9uZXxvblN0YXJ0fHllcw==&amp;v=26813" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:315px; height: 315px" ></iframe></p>
<!--    <p><iframe align="center" src="http://www.flickr.com/slideShow/index.gne?group_id=&user_id=&set_id=72157647765942035&text=" frameBorder="0" width="500" height="500" scrolling="no"></iframe><br/><small>Created with <a href="http://www.admarket.se" title="Admarket.se">Admarket's</a> <a href="http://flickrslidr.com" title="flickrSLiDR">flickrSLiDR</a>.</small></p>-->
  </div>
</div>
<div id="block-menu-menu-learn" class="block block-menu">
  <h2>Learn</h2>

  <div class="content">
    <ul class="menu"><li class="leaf first"><a href="<?php echo($PAGE_PATH);?>schedule" title="Class Schedule">Class Schedule</a></li>
<li class="expanded"><a href="<?php echo($PAGE_PATH);?>overview" title="Lesson Tracks">Lesson Tracks</a><ul class="menu">
<li class="leaf first"><a href="<?php echo($PAGE_PATH);?>ballroom-latin" title="Ballroom/Latin">Ballroom &amp; Latin</a></li>
<li class="collapsed"><a href="<?php echo($PAGE_PATH);?>tango" title="Argentine Tango">Argentine Tango</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>swing" title="Lindy Hop Swing">Lindy Hop</a></li>
<li class="expanded last"><a href="<?php echo($PAGE_PATH);?>team" title="Ballroom Team">Ballroom Team</a>
	<ul class="menu"><li class="leaf first"><a href="<?php echo($PAGE_PATH);?>competing" title="Competing 101">Competing 101</a></li>
	<li class="leaf"><a href="<?php echo($PAGE_PATH);?>checklist" title="Competition Checklist">Competition Checklist</a></li>
	<li class="leaf"><a href="<?php echo($PAGE_PATH);?>results" title="Past Competitions">Past Competitions</a></li>
	<li class="leaf"><a href="<?php echo($PAGE_PATH);?>syllabus-steps" title="Syllabus Steps">Team Syllabus Steps</a></li>
	<li class="leaf last"><a href="<?php echo($PAGE_PATH);?>mentors" title="Team Mentors">Team Mentors</a></li>
	</ul></li>
</li>
</ul></li>
<li class="leaf last"><a href="template.php?page=faq" title="FAQs">FAQs</a></li>
</ul>  </div>
</div>
<div id="block-menu-primary-links" class="block block-menu">
  <h2>Get Involved</h2>

  <div class="content">
    <ul class="menu"><li class="leaf first"><a href="<?php echo($PAGE_PATH);?>news" title="">News</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>events" title="Events">Special Events</a></li>
<li class="collapsed last"><a href="<?php echo($PAGE_PATH);?>officers" title="<?php echo($semester[date("n")].' '.date("Y")); ?> Officers">Executive Committee</a></li>
</ul>  </div>
</div>
<div id="block-menu-menu-competition" class="block block-menu">
  <h2>Competition</h2>

  <div class="content">
    <ul class="menu"><li class="expanded last"><a href="<?php echo($PAGE_PATH);?>competition" title="Competition">2014 RPI Dancesport Competition</a>
	<ul class="menu">
	<li class="leaf first"><a href="<?php echo($PAGE_PATH);?>comp_registration" title="Registration">Registration</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_sponsors" title="Sponsors">Sponsors</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_schedule" title="Schedule">Schedule</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_events" title="Events">Events</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_other_events" title="Other Events">Lessons and Workshops</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_judges" title="Officials">Officials</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_rules" title="Rules">Rules</a></li>
<li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_venue" title="Venue">Venue</a></li>
<li class="leaf last"><a href="<?php echo($PAGE_PATH);?>comp_housing" title="Housing">Housing</a></li>
</ul></li>
</ul>  </div>
</div>
<div id="block-menu-menu-connect" class="block block-menu">
  <h2>Connect</h2>

  <div class="content">
    <ul class="menu"><li class="leaf first"><a href="http://www.facebook.com/pages/RPI-Ballroom-Dance/227890471441" title="">Find Us on Facebook!</a></li>
<li class="leaf last"><a href="template.php?page=donate" title="Donate">Donate</a></li>
</ul>  </div>
</div>
<div id="block-menu-menu-resources" class="block block-menu">
  <h2>Resources</h2>

  <div class="content">
    <ul class="menu"><li class="leaf first"><a href="template.php?page=dances" title="Types of Dances">Types of Dances</a></li>
<li class="leaf"><a href="template.php?page=music" title="Music">Music</a></li>
<li class="leaf"><a href="template.php?page=etiquette" title="Social Dancing Etiquette">Social Dancing Etiquette</a></li>
<li class="leaf last"><a href="template.php?page=links" title="Links">Links</a></li>
</ul>  </div>
</div>
		</div><!-- /panel-aux -->
	</div> <!-- /content -->
</div> <!-- /wrapper -->

<div id="footer">
	<div id="footer-content" class="clearfix">
		<p id="copyright">
			Copyright &#169; 2009-2010 RPI Ballroom. All rights reserved. <br/>
			<a href="http://www.rpi.edu">Rensselaer Polytechnic Institute.</a>
		</p>
		<ul id="footer-logos">
			<li id="union"><a href="http://www.union.rpi.edu"></a></li>
			<li id="rpi"><a href="http://www.rpi.edu"></a></li>
		</ul>
	</div> <!-- /footer-content -->
</div> <!-- /footer -->

</body>
</html>
