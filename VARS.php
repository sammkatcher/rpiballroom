<?php
/* * VARS.php must be located in base directory of website!!*/

// Database login info 
define("HOST", "db.union.rpi.edu");     // The host you want to connect to.
define("USER", "ballroom_test2");    // The database username. 
define("PASSWORD", "thisisatest");    // The database password. 
define("DATABASE", "ballroom_ballroom");    // The database name.
 

//Begin Path Variables
$BASE_PATH = './index.php';
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
// UNUPDATED SINCE AROUND 2017
$EMAILS = array(1 => 'henslc@rpi.edu', //'ballroom@union.lists.rpi.edu',
				2 => 'henslc@rpi.edu', //'ballroom@union.lists.rpi.edu',
				3 => 'henslc@rpi.edu', //'ballroom-webmaster@union.lists.rpi.edu',
				4 => 'henslc@rpi.edu', //'ballroom-competition@union.lists.rpi.edu',
				5 => 'henslc@rpi.edu', //'contact-lindy@union.lists.rpi.edu',
				6 => 'henslc@rpi.edu', //'ballroom-captains@union.lists.rpi.edu',
				7 => 'henslc@rpi.edu', //'contact-tango@union.lists.rpi.edu',
				8=>  'henslc@rpi.edu' //'contact-latin@union.lists.rpi.edu'
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
$swing_1_lesson = "8:00-9:00pm";
$swing_2_lesson = "9:00-10:00pm";

//team
$team_mon_practice = "8:00-10:00pm";
$team_wed_practice = "4:00-6:00pm";
$team_fri_practice = "5:00-7:00pm";
$team_sat_practice = "3:00-5:00pm";
$team_tues_lesson = "7:00-9:00pm";
$team_thurs_lesson = "9:00-10:00pm";
$team_sun_lesson = "3:00-6:00pm";

$start_of_lesson_message = "<p>The <b>Spring 2020 Lessons</b> 
	are right around the corner! As the Intro Dance
	 is Friday, January 17th, the first week of lessons will 
	 begin on Tuesday, January 21st! The first Beginner Ballroom/ Latin 
	 Club lesson will be on January 23rd at 6pm. If you are 
	 interested in Team, lessons start Tuesday, January 17th!
	  As always, the first lesson of each style is free!</p>

	  <p>Practices will begin the first week of classes.</p>
	  <p>We restart our lesson tracks every semester, Fall and 
	  Spring, so make sure to keep us in mind for the future!</p>";
// End Lesson times

// Begin eboard members
$president = "Sam Wiegand, '22";
$secretary = "Rachel Oehlkers, '21";
$latin_vp = "Victoria Cervantezs, '21";    // Club VP
$captain1 = "Emily Davey, '22";
$captain2 = "Chang Ju Kim, '21";

$latin_tres = "Kate Carbone, '23";  // Club Treasurer
$team_tres = "Mercedez Young, '22";

$marketing = "Skye Jacobson, '22";
$comp_coord = "Matthew Fox, '22";
$comp_coordinator = "Matthew";
$webmaster = "Chang Ju Kim, '21";
$social_chair = "Lauren Lepre, '23";

$fundraising = "Vacant";
// End eboard members

// Begin eboard emails
$president_email = "wiegas@rpi.edu";
$latin_vp_email = "cervav2@rpi.edu";
$captain1_email = "daveye@rpi.edu";

$comp_coord_email = "foxm6@rpi.edu";
$social_chair_email = "leprel@rpi.edu";

// Begin team mentors
// UNUSED SINCE FALL 2019
$mentor_rumba = "";
$mentor_chacha = "";
$mentor_swing = "";
$mentor_latin = "";
$mentor_foxtrot = "";
$mentor_waltz = "";
$mentor_tango = "";
$mentor_standard = "Kris & Jessica";
$mentor_smooth = "Samm & Dan";
$mentor_rhythm = "Samm & Dan";
// End team mentors

// Begin team mentor emails
// UNUSED SINCE 2017
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
// UNUSED SINCE FALL 2019
$mentor_date_rumba = "Friday 6PM";
$mentor_date_chacha = "TBA";
$mentor_date_swing = "Sunday 4PM";
$mentor_date_latin = "By apt.";
$mentor_date_foxtrot = "Tuesday/Thursday 9PM";
$mentor_date_waltz = "Tuesday/Thursday 9PM";
$mentor_date_tango = "Tuesday/Thursday 9PM";
$mentor_date_standard = "Saturday 1:00PM - 3:00PM";
$mentor_date_rhythm = "Wednesday 6:30PM - 7:30PM";
$mentor_date_smooth = "Wednesday 6:30PM - 7:30PM";
// End team mentor dates

// Begin team mentor location
$mentor_location_rhythm = "Studio";
$mentor_location_smooth = "Studio";
$mentor_location_standard = "Studio";

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
