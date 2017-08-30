<?php

require_once('includes/db_login.php');

include_once('includes/budget_defs.inc.php');


//set character enocding
$locale='en_US.UTF-8';
setlocale(LC_ALL,$locale);
putenv('LC_ALL='.$locale);

//include CAS
include_once("restricted/CAS-1.3.2/CAS.php");
phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
// SSL!
phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
	
$DEBUG = false;
$LOGIN_FAIL_MSG = 'You are not authorized to access this page, please <a href="'.$ADMIN_PATH.'login">login</a>. <br />'. PHP_EOL .'If you have logged in with your RCS credentials and still cannot access the page, please contact the ballroom Eboard to be given permission to access these pages.';


//check if session started
//if (session_status() == PHP_SESSION_NONE) {
//    sec_session_start();
//}

function msg($type, $msg_str){
	$msg_str = $msg_str . "\n";
	echo("<script content='text/javascript' > document.getElementById('".$type."').innerHTML+='".clean_str($msg_str)."   '; "); 
	echo("document.getElementById('".$type."').style.display = 'block';</script> \n");
	return true;
}


function EST_time() {
    date_default_timezone_set("US/Eastern");
	$storedate=date("Y-m-d H:i:s");
    return $storedate;
}

//clean a string
function clean_str($string){
	global $mysqli;
	
	return $mysqli->real_escape_string($string);
}

//clean a number
function clean_num($string){

	//remove anything that isnt  unicode letters and digits
	//$string = preg_replace('~\P{Xan}++~u', ' ', $string);
	
	//remove anything that isnt a number
	$string = preg_replace("/[^0-9 ]/", '', $string);
	return $string;
}

//cheack a number of multiple decimal points
function check_dec($strings){
	$warnings = array();
	$return_strs = array();
	$it = 0;
	for($it = 0; $it < count($strings); $it++){
		if (substr_count($strings[$it] ,'.') > 1){
			while( substr_count($strings[$it] ,'.') > 1){
				$strings[$it] = preg_replace('/[\.]/', '', $strings[$it],'1');
				$warnings[$it]++;
			}
		}
		else{
			$warnings[$it]=0;
		}
		
	}
	
	return array($strings, $warnings);
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<script>
function toggle_vis(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

</script>

<div id="admin_nav">
<div id="error"> <a class="msg_close" onclick=" toggle_vis('error');"> <b> X </b></a> </div>
<div id="success"> <a class="msg_close" onclick=" toggle_vis('success');"> <b> X </b></a> </div>
<div id="info"> <a class="msg_close" onclick=" toggle_vis('info');"> <b> X </b></a> </div>
<div id="warning"> <a class="msg_close" onclick=" toggle_vis('warning');"> <b> X </b></a> </div>
<ul class="navlist" style="float: left;">
<li><a href="<?php echo($ADMIN_PATH) ?>admin"> Home </a><li>
<li><a href="<?php echo($ADMIN_PATH) ?>eboard_notes"> Eboard Notes </a><li>
<li><a href="<?php echo($ADMIN_PATH)?>budget"> Budget </a><li>

</ul>

<ul class="navlist" style="float: right; text-align: right;">
<?php 
if ( !phpCAS::isAuthenticated() ){
	printf("<li><a href=\"%slogin\">Login</a></li>",$ADMIN_PATH);
}
else{
	printf("<li><a href=\"%slogout\">Logout</a></li>",$ADMIN_PATH);
}
?>
</ul>

</div>
<br />
<br />
