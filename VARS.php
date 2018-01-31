<?php
/* * VARS.php must be located in base directory of website!!*/

// Database login info 
define("HOST", "db.union.rpi.edu");     // The host you want to connect to.
define("USER", "ballroom_test2");    // The database username. 
define("PASSWORD", "thisisatest");    // The database password. 
define("DATABASE", "ballroom_ballroom");    // The database name.
 

//Begin Path Variables
$BASE_PATH = '/index.php';
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
$EMAILS = array( 1 => 'ballroom@union.lists.rpi.edu',
				2 => 'ballroom@union.lists.rpi.edu',
				3 => 'ballroom-webmaster@union.lists.rpi.edu',
				4 => 'ballroom-competition@union.lists.rpi.edu',
				5 => 'contact-lindy@union.lists.rpi.edu',
				6 => 'ballroom-captains@union.lists.rpi.edu',
				7 => 'contact-tango@union.lists.rpi.edu',
				8=>'contact-latin@union.lists.rpi.edu'
			);

// subjects for emails sent via contact form to allow sorting
$EMAIL_SUBJECT = array(1 => '[General Ballroom]',
				2 => '[Showcase Request]',		
				3 => '[Website Feedback]',
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
$swing_2_lesson = "7:00-8:00pm";

//team
$team_mon_practice = "8:00-10:00pm";
$team_wed_practice = "4:00-6:00pm";
$team_fri_practice = "5:00-7:00pm";
$team_sat_practice = "3:00-5:00pm";
$team_tues_lesson = "7:00-9:00pm";
$team_thurs_lesson = "9:00-10:00pm";
$team_sun_lesson = "3:00-6:00pm";

$start_of_lesson_message = "<p>The <b>Spring 2018 Lessons</b> 
	are right around the corner! As the Intro Dance
	 is Friday, January 19th, the first week of lessons will 
	 begin on January 22nd! The first Beginner Ballroom/ Latin 
	 Club lesson will be on January 25th at 6pm. If you are 
	 interested in Team, lessons start Tuesday, January 23rd!
	  As always, the first lesson of each style is free!</p>

	  <p>Practices will begin the first week of classes.</p>
	  <p>We restart our lesson tracks every semester, Fall and 
	  Spring, so make sure to keep us in mind for the future!</p>";
// End Lesson times

// Begin eboard members
$president = "Claire Hensley, '18";
//$tango_vp = "Vacant, Vacant";
$lindy_vp = "Steven Beninati, '20";
$latin_vp = "Susannah Kane, '20";
$captain1 = "Samm Katcher, '19";
$captain2 = "Sarah McRae, '20";
//$tango_tres = "Vacant, Vacant";
$lindy_tres = "Rachel Oehlkers, '21";
$latin_tres = "Allison Daboval, '22";
$team_tres = "Maria Ruiz Cardenas, '21";
$marketing = "Troy Mundschenk, '21";
$comp_coord = "Kuwabo Mubyana, Grad";
$comp_coordinator = "Kuwabo";
$social_chair = "Daniel Lubitz, '19; Samm Katcher, '19, Susannah Kane '20";
$fundraising = "Vacant";
// End eboard members

// Begin team mentors
$mentor_rumba = "Tyler & Kuwabo";
$mentor_chacha = "Tyler & Kuwabo";
$mentor_swing = "Tyler & Kuwabo";
$mentor_latin = "Tyler & Kuwabo";
$mentor_foxtrot = "Brendan & Samantha";
$mentor_waltz = "Brendan & Samantha";
$mentor_tango = "Brendan & Samantha";
$mentor_standard = "Kris & Jess";
$mentor_smooth = "Brendan & Samantha";
$mentor_rhythm = "Kuwabo & Tyler"
// End team mentors

// Begin team mentor emails
$mentor_email_rumba = "mubyak@rpi.edu";
$mentor_email_chacha = "nicolepiche89@gmail.com";
$mentor_email_swing = "wrighb3@rpi.edu";
$mentor_email_latin = "kochea@rpi.edu";
$mentor_email_foxtrot = "nicolepiche89@gmail.com";
$mentor_email_waltz = "lame3@rpi.edu";
$mentor_email_tango = "anderd8@rpi.edu";
$mentor_email_standard = "kckempf@gmail.com,nukechic007@gmail.com";
// End team mentor emails

// Begin team mentor dates
$mentor_date_rumba = "Friday 6PM";
$mentor_date_chacha = "TBA";
$mentor_date_swing = "Sunday 4PM";
$mentor_date_latin = "By apt.";
$mentor_date_foxtrot = "Tuesday/Thursday 9PM";
$mentor_date_waltz = "Tuesday/Thursday 9PM";
$mentor_date_tango = "Tuesday/Thursday 9PM";
$mentor_date_standard = "Saturday 1PM";
$mentor_date_rhythm = "Saturday at 3pm";
$mentor_date_smooth = "Saturday at 3pm";
// End team mentor dates

// Begin prices
$price_single_student = "$60";
$price_single_non = "$85";
$price_full_student = "$100";
$price_full_non = "$150";
$price_team_student = "$45";
$price_team_non = $price_team_student;

// End prices


//begin admin area

//RCS usernames of people allowed in the admin area
// Unused currently (as of 2015)
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
