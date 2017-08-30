<?php 
//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){

	//set the user
	$USER = phpCAS::getUser();
	?>
	<style>
	#navcontainer
	{
	background: #f0e7d7;
	width: 30%;
	margin: 0 auto;
	padding: 1em 0;
	font-family: georgia, serif;
	font-size: 13px;
	text-align: center;
	text-transform: lowercase;
	}

	ul#menulist
	{
	text-align: left;
	list-style: none;
	padding: 0;
	margin: 0 auto;
	width: 70%;
	}

	ul#menulist li
	{
	display: block;
	margin: 0;
	padding: 0;
	}

	ul#menulist li a
	{
	display: block;
	width: 100%;
	padding: 0.5em 0 0.5em 2em;
	border-width: 1px;
	border-color: #ffe #aaab9c #ccc #fff;
	border-style: solid;
	color: #777;
	text-decoration: none;
	background: #f7f2ea;
	}

	#navcontainer>ul#menulist li a { width: auto; }

	ul#menulist li#active a
	{
	background: #f0e7d7;
	color: #800000;
	}

	ul#menulist li a:hover, ul#menulist li#active a:hover
	{
	color: #800000;
	background: transparent;
	border-color: #aaab9c #fff #fff #ccc;
	}
	</style>
	<div id="container">
	<h2>Pages </h2>
	<ul>		
		<li><a href="<?php echo($ADMIN_PATH)?>add">  Add a Budget </a><li>
		<ul>
			<li> Allows you to add a new budget to the database. </li>
		</ul>
	<li><a href="<?php echo($ADMIN_PATH)?>spend"> Spend Money!</a><li>
		<ul>
			<li> Allows you to add transactions to the current budget. </li>
		</ul>
	<li><a href="<?php echo($ADMIN_PATH) ?>user"> Users </a><li>
		<ul>
			<li> Allows you see registered users and delete them. Clicking on their name will allow you to see all of their transactions </li>
		</ul>
	<li><a href="<?php echo($ADMIN_PATH) ?>sort"> Sort Transactions </a><li>
		<ul>
			<li> Allows you to see all transactions in the database, sort them by various properties, and search their descriptions.  </li>
		</ul>
	<li><a href="<?php echo($ADMIN_PATH) ?>excel_export"> Export Excel Spreadsheet</a><li>
		<ul>
			<li> Allows you to create and download an excel spreadsheet with all the data currently in the database for offline budgeting.  </li>
		</ul>
	<li><a href="<?php echo($ADMIN_PATH) ?>past"> Archive Budget</a><li>
		<ul>
			<li> Allows you to archive (save) the database to a file which can re-loaded later. You can also delete excel exports currently on the server.  </li>
		</ul>
	</ul>
	<h2> Notes </h2>
	<ul>
		<li> All times are are in Eastern Standard Time</li>
		<li> After you submit something the site will do its best to bring you back to the place you were on the page, but is not perfect.</li>
		<li> Transaction quantities must be integers, they will be rounded otherwise. They must also be positive, or else they will be made positive. Warnings will be issued in each case. </li>
		<li> Unit prices must be valid dollar amounts. </li>
		<li> Adding a new budget will wipe ALL the data in the database. If you don't wish to loose that data, make sure the current budget is archived before uploading a new one.</li>
	</ul>

	</div>
<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
?>

