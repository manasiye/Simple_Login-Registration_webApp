<?php
include_once('confi.php');
error_reporting(E_ALL);

//Get the variables here
echo readfile("php://input");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$username = $request->username;
@$password = $request->password;

//Get the variables here end
$selectstatement = 'SELECT count(*) co FROM `user` u , `profile` p WHERE u.username = "'.$username.'" AND u.profile_id=p.profile_id';
$selectquery = 'SELECT u.user_id FROM `user` u , `profile` p WHERE u.profile_id=p.profile_id AND  u.username ="'.$username.'" ';

$query123 = mysql_query($selectstatement) or trigger_error(mysql_error()." ".$selectstatement);

while($r = mysql_fetch_array($query123)){
			extract($r);
            
echo "count is $co";
    
}
$co = (int)$co;
$user_id = '';
if($co == 1){
    //User is availaible
   
$result = array();
$user_id=mysql_query($selectquery) or trigger_error(mysql_error()." ".$selectquery);
$result[] = array("user_id" => $user_id,"status" => 1);
}

if($co != 1){
    //User is not availaible
   
    $result = array();
$result[] = array("status" => $selectstatement);
}

/* Output header */
	header('Content-type: application/json');
	echo json_encode($result);

?>