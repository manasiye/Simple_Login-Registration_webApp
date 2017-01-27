<?php
include_once('confi.php');
error_reporting(E_ALL);
echo "hi there this is a test";
//Get the variables here
$username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) :  "";
$firstname = isset($_POST['firstname']) ? mysql_real_escape_string($_POST['firstname']) :  "";
$lastname = isset($_POST['lastname']) ? mysql_real_escape_string($_POST['lastname']) :  "";
$preferred_communication = isset($_POST['preferred_communication']) ? mysql_real_escape_string($_POST['preferred_communication']) :  "";
$photo = isset($_POST['photo']) ? mysql_real_escape_string($_POST['photo']) :  "";
//Get the variables here end

//Registration code here (insert statements)
$insertstatement = 'INSERT INTO `profile` (`username`,`first_name`,`last_name`,`preferred_communication`,`photo`) VAlUES ("'.$username.'","'.$firstname.'","'.$lastname.'","'.$preferred_communication.'","'.$photo.'")';

$query123 = mysql_query($insertstatement) or trigger_error(mysql_error()." ".$insertstatement);

echo "$query123";

//Registration code here (insert statements) ends

?>