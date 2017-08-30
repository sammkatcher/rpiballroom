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
$EMAILS = array( 1 => 'ballroom@union.rpi.edu',
				2 => 'ballroom@union.rpi.edu',
				3 => 'ballroom-webmaster@union.rpi.edu',	
				4 => 'ballroom-competition@union.rpi.edu',
				5 => 'contact-lindy@union.rpi.edu',		
				6 => 'ballroom-captains@union.rpi.edu',	
				7 => 'contact-tango@union.rpi.edu', 	
				8=>'contact-latin@union.rpi.edu'	
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

$start_of_lesson_message = "<p>The <b>Fall 2017 Lessons</b> are right around the corner! As the <!--<a href='https://www.facebook.com/events/158763137944039/'>-->Intro Dance<!--</a>--> is Friday, September 1st, the first week of lessons will begin on September 11th, with Argentine Tango on Monday (if you are interested in Team, lessons start Sunday, September 10th)! As always, the first lesson of each style is free!</p><p>Practices will begin the first week of classes.</p><p>We restart our lesson tracks every semester, Fall and Spring, so make sure to keep us in mind for the future!</p>";
// End Lesson times

// Begin eboard members
$president = "Jeffrey Galczynski, '18";
$tango_vp = "Sruja Machani, '20";
$lindy_vp = "Sarah McRae, '20";
$latin_vp = "Isabella Siu, '18";
$captain1 = "Karen Baltazar, '17";
$captain2 = "Samm Katcher, '19";
$tango_tres = "Alexis Ziemba, Grad";
$lindy_tres = "Steven Beninati, '20";
$latin_tres = "Susannah Kane, '20";
$team_tres = "Samantha Lee, '18";
$marketing = "Angela Ding, '18";
$comp_coord = "Kuwabo Mubyana, Grad";
$comp_coordinator = "Kuwabo";
$social_chair = "Samm Katcher, '19; Dan Lubitz, '19";
$fundraising = "Brittany Wendzel, '18";
// End eboard members

// Begin team mentors
$mentor_rumba = "Kuwabo";
$mentor_chacha = "TBA";
$mentor_swing = "Nicole";
$mentor_latin = "Alex K.";
$mentor_foxtrot = "Sam & Kevin";
$mentor_waltz = "Eric";
$mentor_tango = "Eric";
$mentor_standard = "Kevin & Stephanie";
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
// End team mentor dates

// Begin prices
$price_single_student = "$60";
$price_single_non = "$85";
$price_full_student = "$100";
$price_full_non = "$150";
$price_team_student = "$30";
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
