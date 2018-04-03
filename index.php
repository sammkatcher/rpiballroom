<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<?php
  require_once('VARS.php'); //contains definitions of various parameters for the site

  $INCLUDED = true; // variable so we can test if the other files were included, and deny access if they were accessed directly
?>

<!DOCTYPE html>
<html lang="en">
  <head profile="http://www.w3.org/2005/10/profile">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="The home of RPI's ballroom dancing community." />
    <meta name="keywords" content="RPI, rensselaer, polytechnic, institute, albany, ny, new, york, capital, region, district, classes, lessons, college, dancesport, ballroom, dance, club, team, argentine, tango, swing, lindy, hop" />
    <link rel="icon" type="image/x-icon" href="/site_images/favicon.ico" />
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RPI Ballroom Dance | ballroom.union.rpi.edu | The home of RPI's ballroom dancing community.</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>

  </head>

  <body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/">RPI Ballroom Dance</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
	  <ul class="nav navbar-nav navbar-right">

	    <!-- ABOUT -->
            <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
		<li><a href="/ballroom-latin">Ballroom & Latin</a></li>
		<li><a href="/tango">Argentine Tango</a></li>
		<li><a href="/swing">Lindy Hop Swing</a></li>
    <li><a href="/salsa">Salsa</a></li>
		<li class="divider"></li>
		<li><a href="/officers">Officers</a></li>
		<!-- <li><a href="#">History</a></li> -->
		<li class="divider"></li>
		<li><a href="/donate">Donate</a></li>
		<li><a href="/pricing">Pricing</a></li>
		<li><a href="/schedule">Schedule</a></li>
		<li><a href="/calendar">Calendar</a></li>
	      </ul>
	    </li>

	    <!-- TEAM -->
            <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Team <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
		<li><a href="/team">Ballroom Team</a></li>
		<li class="divider"></li>
		<li><a href="/results">Past Competitions and Results</a></li>
		<li><a href="/syllabus_steps">Team Syllabus Steps</a></li>
		<li><a href="/mentors">Team Mentors</a></li>
		<li><a href="/team_policies">Team Policies</a></li>
	      </ul>
	    </li>

	    <!-- COMPETITION -->
	    <li><a href="/competition">Competition</a></li>

	    <!-- RESOURCES -->
	    <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Resources <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
		<li><a href="/dances">Types of Dance</a></li>
		<li><a href="/etiquette">Social Dance Etiquette</a></li>
		<li><a href="/music">Music</a></li>
		<li class="divider"></li>
		<li><a href="/competing">Competition 101</a></li>
		<li><a href="/checklist">Competition Checklist</a></li>
		<li><a href="/calculator">YCN Point Calculator</a></li>
		<li class="divider"></li>
		<li><a href="https://www.facebook.com/RPIBallroom">Facebook</a></li>
		<li><a href="https://flickr.com/rpiballroom">Flickr</a></li>
		<li><a href="https://instagram.com/rpiballroom">Instagram</a></li>
	      </ul>
	    </li>

	    <!-- FAQ -->
            <li><a href="/faq">FAQ</a></li>

	  </ul>
	</div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->

    <div class="container">

      <!-- CONTENT -->
      <?php
        if ( isset($_GET["page"]) ) {
          /* filter the input to safe characters */
          $page= filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
          /* if the desired page exists, include it */
          if(file_exists($page.'.php')){
	    $page_path = $page.'.php';
          }
          /* otherwise include the 404 page */
          else{
            echo "<script>console.log('Could not find " . $page . "');</script>";
            $wrong_page = $page;
	    $page_path = '404.php';
          }
        }
        else {
          $page_path = 'home.php';
        }
	include($page_path);
      ?>
      <!-- END CONTENT -->
 
    </div>

    <!-- FOOTER -->

    <div class="container" id="footer">
      <hr>
      <div class="text-center">
	<a class="btn" href="https://www.facebook.com/RPIBallroom">Facebook</a> | <a class="btn" href="https://flickr.com/rpiballroom">Flickr</a> | <a class="btn" href="https://instagram.com/rpiballroom">Instagram</a> | <a class="btn" href="/contact">Contact Us</a> | <a class="btn" href="http://union.rpi.edu">RPI Union</a> | <a class="btn" href="https://rpi.edu">RPI</a>
      </div>
      <div class="text-center">
        <?php
	  echo "Last modified: " . date ("F d Y", filemtime($page_path));
        ?><br />Copyright &#169; 2016-2017 RPI Ballroom. All rights reserved.
      </div>
    </div>

    <!-- END FOOTER -->

  </body>

</html>
