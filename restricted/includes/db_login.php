<?php
include_once('VARS.php');   // since functions.php is not included
global $mysqli;
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    //exit();
}
$mysqli->set_charset('utf8');
?>