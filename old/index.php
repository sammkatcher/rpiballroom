<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
 require_once('VARS.php'); //contains definitions of various parameters for the site

$INCLUDED = true; // variable so we can test if the other files were included, and deny access if they were accessed directly
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
  <head profile="http://www.w3.org/2005/10/profile">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="The home of RPI's ballroom dancing community." />
    <meta name="keywords" content="RPI, rensselaer, polytechnic, institute, albany, ny, new, york, capital, region, district, classes, lessons, college, dancesport, ballroom, dance, club, team, argentine, tango, swing, lindy, hop" />
    <link rel="icon" type="image/x-icon" href="http://ballroom.union.rpi.edu/site_images/favicon.ico" />
    <title>RPI Ballroom Dance | ballroom.union.rpi.edu | The home of RPI's ballroom dancing community.</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
      <link type="text/css" rel="stylesheet" media="all" href="css/style1.css" />
      <link type="text/css" rel="stylesheet" media="all" href="css/style2.css" />
      <link type="text/css" rel="stylesheet" media="all" href="css/slideshow_css.css" />
    </head>
    <body>
      <div id="wrapper">
	<div id="header">
	  <ul id="navbar">
	    <li id="home" class="navitem">
	      <a href="<?php echo($BASE_PATH);?>">home</a>
	    </li>
	    <li id="calendar" class="navitem">
	      <a href="<?php echo($PAGE_PATH);?>calendar">calendar</a>
	    </li>
	    <li id="connect" class="navitem">
	      <a href="<?php echo($PAGE_PATH);?>connect">connect</a>
	    </li>
	    <li id="contact" class="navitem">
	      <a href="<?php echo($PAGE_PATH);?>contact">contact</a>
	    </li>
	    <li id="comp" class="navitem">
	      <a href="<?php echo($PAGE_PATH);?>competition">competition</a>
	    </li>
	  </ul>
	</div>

	<!-- /header -->
	<div id="panels" class="clearfix">
	  <div id="panel-main">
	    <div id="panel-main-content">
	      <?php
/* Logic to control what is displayed on this page. This page is essentially just a template containing all the style				*	for the pages, and the actual content comes from other php files which are included into this content section.*/
        /* if there is a page variable defined, they want to go to a page*/
	if(isset($_GET["page"])){
                /* filter the input to safe characters */
		$page= filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
                /* if the desired page exists, include it */
		if(file_exists($page.'.php')){
			include($page.'.php');
		}
                /* otherwise include the 404 page */
		else{
			$wrong_page = $page;

			include('404.php');
		}
	}

        /* if there is a news variable defined, they want to go to a news story	*/
	elseif(isset($_GET["news"])){
                /* filter the input to safe characters */
		$news= filter_input(INPUT_GET, 'news', FILTER_SANITIZE_SPECIAL_CHARS);

                /* if the desired news story exists, include it */
		if(file_exists($NEWS_FILEPATH.$news.'.php')){
			include($NEWS_FILEPATH.$news.'.php');
		}

                /* otherwise include the news page */
		else{
			include('news.php');
		}
	}
        /* if there is a news variable defined, they want to go to a news story	*/
	elseif(isset($_GET["admin"])){
                        /* filter the input to safe characters */
			$admin= filter_input(INPUT_GET, 'admin', FILTER_SANITIZE_SPECIAL_CHARS);
                        /* if the desired admin page exists, include it */
			if(file_exists($ADMIN_FILEPATH.$admin.'.php')){
				include($ADMIN_FILEPATH.$admin.'.php');
			}
                        /* otherwise include the news page */
			else{
				include('home.php');
			}
	}

        /* if no news or page variable, display the home page */
	else{
		include('home.php');
	}
?>
	    </div> <!-- /panel-main-content -->
	  </div> <!-- /panel_main -->
	  <div id="panel-aux">

	    <div id="block-block-4" class="block block-block">
	      <h2>#RPIBallroom on Instagram!</h2>
	      <div class="content">
		<p><iframe src="http://snapwidget.com/sl/?h=cnBpYmFsbHJvb218aW58MzAwfDF8Nnx8eWVzfDV8bm9uZXxvblN0YXJ0fHllcw==&amp;v=26813" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:315px; height: 315px" ></iframe>
		</p>
	      </div>
	    </div>

	    <div id="block-menu-menu-learn" class="block block-menu">
	      <h2>Learn</h2>
	      <div class="content">
		<ul class="menu">
		  <li class="leaf first">
		    <a href="<?php echo($PAGE_PATH);?>schedule" title="Class Schedule">Class Schedule</a>
		  </li>
		  <li class="expanded">
		    <a href="<?php echo($PAGE_PATH);?>overview" title="Lesson Tracks">Lesson Tracks</a>
		    <ul class="menu">
		      <li class="leaf first">
			<a href="<?php echo($PAGE_PATH);?>ballroom-latin" title="Ballroom/Latin">Ballroom &amp; Latin</a>
		      </li>
		      <li class="collapsed"><a href="<?php echo($PAGE_PATH);?>tango" title="Argentine Tango">Argentine Tango</a>
		      </li>
		      <li class="leaf">
			<a href="<?php echo($PAGE_PATH);?>swing" title="Lindy Hop Swing">Lindy Hop</a>
		      </li>
		      <li class="expanded last">
			<a href="<?php echo($PAGE_PATH);?>team" title="Ballroom Team">Ballroom Team</a>
			<ul class="menu">
			  <li class="leaf first">
			    <a href="<?php echo($PAGE_PATH);?>competing" title="Competing 101">Competing 101</a>
			  </li>
			  <li class="leaf">
			    <a href="<?php echo($PAGE_PATH);?>checklist" title="Competition Checklist">Competition Checklist</a>
			  </li>
			  <li class="leaf">
			    <a href="<?php echo($PAGE_PATH);?>results" title="Past Competitions">Past Competitions and Results</a>
			  </li>
			  <li class="leaf">
			    <a href="<?php echo($PAGE_PATH);?>syllabus_steps" title="Syllabus Steps">Team Syllabus Steps</a>
			  </li>
			  <li class="leaf last">
			    <a href="<?php echo($PAGE_PATH);?>mentors" title="Syllabus Steps">Team Mentors</a>
			  </li>
			</ul>
		      </li>
		    </li>
		  </ul>
		</li>
		<li class="leaf last">
		  <a href="<?php echo($PAGE_PATH);?>faq" title="FAQs">FAQs</a>
		</li>
	      </ul>
	    </div>
	  </div>

	  <div id="block-menu-primary-links" class="block block-menu">
	    <h2>Get Involved</h2>
	    <div class="content">
	      <ul class="menu">
		<li class="leaf first">
		  <a href="<?php echo($PAGE_PATH);?>news" title="">News</a>
		</li>
		<li class="leaf">
		  <a href="<?php echo($PAGE_PATH);?>events" title="Events">Special Events</a>
		</li>
		<li class="leaf last">
		  <a href="<?php echo($PAGE_PATH);?>officers" title="<?php echo($semester[date("n")].' '.date("Y")); ?> Officers">Executive Committee</a>
		</li>
	      </ul>
	    </div>
	  </div>

	  <div id="block-menu-menu-competition" class="block block-menu">
	    <h2>Competition</h2>
	    <div class="content">
	      <ul class="menu">
		<li class="expanded last">
		  <a href="<?php echo($PAGE_PATH);?>competition" title="Competition">2015 RPI Dancesport Competition</a>
		  <ul class="menu">
		    <li class="leaf first">
		      <a href="<?php echo($PAGE_PATH);?>comp_registration" title="Registration">Registration</a>
		    </li>
		    <li class="leaf"><a href="<?php echo($PAGE_PATH);?>comp_sponsors" title="Sponsors">Sponsors</a>
		    </li>
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_schedule" title="Schedule">Schedule</a>
		    </li>
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_events" title="Events">Events</a>
		    </li>
<!--
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_other_events" title="Other Events">Lessons and Workshops</a>
		    </li>
-->
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_judges" title="Officials">Officials</a>
		    </li>
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_rules" title="Rules">Rules</a></li>
		    <li class="leaf">
		      <a href="<?php echo($PAGE_PATH);?>comp_venue" title="Venue">Venue</a>
		    </li>
		    <li class="leaf last">
		      <a href="<?php echo($PAGE_PATH);?>comp_housing" title="Housing">Housing</a>
		    </li>
		  </ul>
		</li>
	      </ul>
	  </div>
	  </div>

	  <div id="block-menu-menu-connect" class="block block-menu">
	    <h2>Connect</h2>
	    <div class="content">
	      <ul class="menu">
		<li class="leaf first">
		  <a href="http://www.facebook.com/RPIBallroom" title="">Find us on Facebook!</a>
		</li>
		<li class="leaf">
		  <a href="http://instagram.com/rpiballroom/" title="">Follow us on Instagram</a>
		</li>
		<li class="leaf">
		  <a href="http://flickr.com/rpiballroom" title="">See our Flickr</a>
		</li>
		<li class="leaf last">
		  <a href="<?php echo($PAGE_PATH);?>donate" title="Donate">Donate</a>
		</li>
	      </ul>
	    </div>
	  </div>

	  <div id="block-menu-menu-resources" class="block block-menu">
	    <h2>Resources</h2>
	    <div class="content">
	      <ul class="menu">
		<li class="leaf first">
		  <a href="<?php echo($PAGE_PATH);?>dances" title="Types of Dances">Types of Dances</a>
		</li>
		<li class="leaf">
		  <a href="<?php echo($PAGE_PATH);?>music" title="Music">Music</a>
		</li>
		<li class="leaf">
		  <a href="<?php echo($PAGE_PATH);?>etiquette" title="Social Dancing Etiquette">Social Dancing Etiquette</a>
		</li>
		<li class="leaf last">
		  <a href="<?php echo($PAGE_PATH);?>links" title="Links">Links</a>
		</li>
	      </ul>
	    </div>
	</div>
	</div> <!-- /panel-aux -->
      </div> <!-- /content -->
    </div> <!-- /wrapper -->

    <div id="footer">
      <div id="footer-content" class="clearfix">
	<p id="copyright">Copyright &#169; 2014-2015 RPI Ballroom. All rights reserved. <br/>
	  <a href="http://www.rpi.edu">Rensselaer Polytechnic Institute.</a>
	</p>
	<ul id="footer-logos">
	  <li id="union">
	    <a href="http://www.union.rpi.edu"></a>
	  </li>
	  <li id="rpi"><a href="http://www.rpi.edu"></a></li>
	</ul>
      </div> <!-- /footer-content -->
    </div> <!-- /footer -->

</body></html>