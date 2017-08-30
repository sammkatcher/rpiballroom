<?php
require_once(dirname(__FILE__).'/../db_login.php');
include_once 'login_functions.php';
 
//check if session started
if (session_status() == PHP_SESSION_NONE) {
    sec_session_start();// Our custom secure way of starting a PHP session.
}
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
		if (isset($_GET['page'])){
			echo($_GET['page']);
			header('Location: '.$_GET['page']);
		}
		else{
			header('Location: ../index.php');
		}
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

?>