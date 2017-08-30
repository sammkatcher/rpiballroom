<?php
require_once('includes/db_login.php');
include_once('header.php');
include_once('includes/login_functions.php');

//debugging flag
$DEBUG = false;


//check if session started
if (session_status() == PHP_SESSION_NONE) {
    sec_session_start();
}

if(login_check($mysqli) == true) {

//set user for recording who adds data
$USER = $_SESSION['username'];



?>
<head>
<title>Spend</title>
</head>

<div id="container">
<h2>Pages </h2>
<ul>
<li>Add</li>
<ul>
<li> Allows you to add a new budget. </li>
</ul>
<li>Spend</li>
<ul>
<li> Allows you to add transactions to the current budget. </li>
</ul>
<li>Users</li>
<ul>
<li> Allows you see registered users and delete them. Clicking on their name will allow you to see all of their transactions </li>
</ul>
<li>Sort</li>
<ul>
<li> Allows you to see all transactions in the database, sort them by various properties, and search their descriptions.  </li>
</ul>
<li>Excel Export</li>
<ul>
<li> Allows you to create an excel spreadsheet with all the data currently in the database. You may also download the sheet from the archives page.  </li>
</ul>
<li>Archive</li>
<ul>
<li> Allows you to archive (save) the database to a file which can re-loaded later. You can also delete excel exports currently on the server.  </li>
</ul>
</ul>
<h2> Notes </h2>
<ul>
<li> All times are are in Eastern Standard Time</li>
<li> After you submit something the site will do its best to bring you back to the place you were on the page, but is not perfect.</li>
<li> Quantities must be integers, they will be rounded otherwise. They must also be positive, or else they will be made positive.</li>
<li> Unit prices must be valid dollar amounts. </li>
<li> Adding a new budget will wipe ALL the data in the database. If you don't wish to loose that data, make sure the current budget is archived before uploading a new one.</li>
</ul>


	<?php
} else { 
    msg('error','You are not authorized to access this page, please <a href=\"login.php?page='.urlencode($_SERVER['PHP_SELF']) .'\">login</a>.');
}
	?>