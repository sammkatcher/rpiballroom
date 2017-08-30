<?php
/* * VARS.php must be located in base directory of website!!*/

// Database login info 
define("HOST", "db.union.rpi.edu");     // The host you want to connect to.
define("USER", "ballroom_test2");    // The database username. 
define("PASSWORD", "thisisatest");    // The database password. 
define("DATABASE", "ballroom_ballroom");    // The database name.
 

//Begin Path Variables
$BASE_PATH = '/old/index.php';
$NEWS_IMG_FILEPATH = 'news_stories/images/';
$NEWS_FILEPATH = 'news_stories/';
$ADMIN_FILEPATH = 'restricted/';
$NEWS_PATH = $BASE_PATH.'?news=';
$PAGE_PATH = $BASE_PATH.'?page=';
$ADMIN_PATH = $BASE_PATH.'?admin=';
$SLIDESHOW_FILEPATH = 'slideshow/';
// End Path Variables
// Begin  News Stories Settings

$NUM_HOMEPAGE_NEWS_STORIES = 2;		

//doesn't work, not sure why

$NUM_NEWSPAGE_NEWS_STORIES = 20;

// End News Stories Settings

// Begin Contact for Emails// correspond to options on contact form, indicate which email address to send contact request to
$EMAILS = array( 1 => 'ballroom-webmaster@union.rpi.edu',	
				2 => 'ballroom@union.rpi.edu',			
				3 => 'ballroom@union.rpi.edu',		
				4 => 'ballroom-competition@union.rpi.edu',
				5 => 'contact-latin@union.rpi.edu',		
				6 => 'ballroom-captains@union.rpi.edu',	
				7 => 'contact-tango@union.rpi.edu', 	
				8=>'contact-latin@union.rpi.edu'	
			);

// subjects for emails sent via contact form to allow sorting
$EMAIL_SUBJECT = array(1 => '[Website Feedback]',	
				2 => '[Showcase Request]',		
				3 => '[General Ballroom]',	
				4 => '[Ballroom Competition]',
				5 => '[Lindy Contact]',			
				6 => '[Team Contact]',			
				7 => '[Tango Contact]', 	
				8=> '[Ballroom/Latin Contact]'	
			);
// End Contact for Emails

// Begin Lesson times

//ballroom/latin
$ballroom_lesson_day = "Thursday";
$ballroom_beginner_time = "6:00-7:00pm";
$ballroom_intermediate_time = "7:00-8:00pm";
$ballroom_advanced_time = "8:00-9:00pm";

//tango
$tango_lesson_day = "Monday";
$tango_beginner_time = "5:30-6:30pm";
$tango_intermediate_time = "6:30-7:30pm";
$tango_practica_day = "Thursday";
$tango_practica_time = "2:00-4:00pm";

//swing
$swing_lesson_day =  "Wednesday";
$swing_1_lesson = "6:00-7:00pm";
$swing_2_lesson = "7:00-8:00pm";//team
$team_mon_practice = "8:00-10:00pm";
$team_wed_practice = "4:00-6:00pm";
$team_fri_practice = "5:00-7:00pm";
$team_sat_practice = "3:00-5:00pm";
$team_tues_lesson = "7:00-9:00pm";
$team_thurs_lesson = "9:00-10:00pm";
$team_sun_lesson = "3:00-6:00pm";
// End Lesson times

// Begin eboard members
$president = "Laura Napierkowski, '16";
$tango_vp = "Rachel Glick, '17";
$lindy_vp = "Caitlyn Egan, '17";
$latin_vp = "Eric Lam, '17";
$captain1 = "Kuwabo Mubyana, Grad";
$captain2 = "Brendan Wright, '16";
$tango_tres = "Anton Andriyanov, '16";
$lindy_tres = "Kaitlin Dell, '17";
$latin_tres = "Angela Ding, '18";
$team_tres = "Karen Baltazar, '17";
$marketing = "Heather Covello, '17";
$comp_coord = "Dustin Anderson, '16";
$comp_coordinator = "Dustin";
$social_chair = "Kevin Ng, '16";
$fundraising = "Michael Candels, '17";
// End eboard members


//begin admin area

//RCS usernames of people allowed in the admin area
$ADMIN_ALLOWED = array('lentis',
					'bivons',
					'reddij2',
					'lame3',
					'wrighb3',
				);
				
				
$NOTES_LINK = "https://docs.google.com/spreadsheet/pub?key=0ArSmM2f6cRm_dHNxSzJpbXZDRjZfOW9GSmcyMjBvRFE&output=html&widget=true";
// end admin area

// Begin general data//list of months of the year

$months = array(1 => 'January',
 			2 => 'February', 
			3 => 'March', 
			4 => 'April', 
			5 => 'May', 
			6 => 'June', 	
			7 => 'July', 	
			8 => 'August', 
			9 => 'September', 
			10 => 'October', 
			11 => 'November', 	
			12 => 'December'
		);
		
//list of which months begin to which semester
$semester = array(1 => 'Spring',
				2 => 'Spring', 
				3 => 'Spring',	
				4 => 'Spring',
				5 => 'Spring',
				6 => 'Spring', 	
				7 => 'Fall', 	
				8 => 'Fall', 	
				9 => 'Fall', 	
				10 => 'Fall', 	
				11 => 'Fall', 	
				12 => 'Fall'
			);

// End general data

//function to check a variable exists and return its value
function checkinclude($INCLUDE) {
    if (!isset($INCLUDE)) {
        return false;
    }
    return $INCLUDE;
}
?>
