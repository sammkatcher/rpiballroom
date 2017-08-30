<?php

//contains function definitions and header html code
require_once('header.php');

$DEBUG = false;

//check if user is logged in
if (phpCAS::isAuthenticated() && in_array(phpCAS::getUser(),$ADMIN_ALLOWED) ){
	
	//set the user
	$USER = phpCAS::getUser();
?>
	<iframe width='650' height='700' frameborder='0' src='<?php echo($NOTES_LINK);?>'></iframe>

<?php
}
else{
	msg('error',$LOGIN_FAIL_MSG);
}
?>