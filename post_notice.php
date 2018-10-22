<?php

include('server.php'); 
include('session.php'); 

date_default_timezone_set('Asia/Dhaka');
$heading =$_POST['heading'];
$notice =$_POST['notice'];
$person = $_SESSION["apee_userid"];
$date = date("Y/m/d");
$time = date('h:i:s A');;

$result = mysqli_query($db, "SELECT * FROM teachers WHERE userid='$person'");
$user = mysqli_fetch_array($result);
$shortname = $user['shortname'];

$query = "INSERT INTO noticeboard ( heading, notice, person, shortname, date, time) VALUES ('$heading','$notice', '$person','$shortname', '$date', '$time')";

if ($db->query($query) === TRUE) {
	echo " -- Notice Posted..";
}else{
	echo " Something wrong.. Please try again" . $db->error;
}




?>