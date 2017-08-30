<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){
	
	//set the user
	$USER = phpCAS::getUser();
?>
	
	<ul>
	<li><a href="<?php echo($ADMIN_PATH);?>budget "> Budgeting <a/> </li>
	<ul>
		<li><a href="<?php echo($ADMIN_PATH)?>add">  Add a Budget </a><li>
		<li><a href="<?php echo($ADMIN_PATH)?>spend"> Spend Money!</a><li>
		<li><a href="<?php echo($ADMIN_PATH) ?>user"> Users </a><li>
		<li><a href="<?php echo($ADMIN_PATH) ?>sort"> Sort Transactions </a><li>
		<li><a href="<?php echo($ADMIN_PATH) ?>excel_export"> Export Excel Spreadsheet</a><li>
		<li><a href="<?php echo($ADMIN_PATH) ?>past"> Archive Budget</a><li>
	</ul>
	<li><a href="<?php echo($ADMIN_PATH);?>eboard_notes "> Eboard Notes <a/> </li>
	</ul>

<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
?>