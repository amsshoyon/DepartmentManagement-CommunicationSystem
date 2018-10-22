<?php 

include ('server.php');
include ('session.php');

$userid =$_SESSION["apee_userid"];
$roll_no = $_POST['roll_no'];
$message = $_POST['message'];

$date = date("Y/m/d");
$time = date('h:i:s A');;

$sender_tbl = 'msg_'.$userid;
$receiver_tbl = 'msg_'.$roll_no;

$query = "INSERT INTO $sender_tbl (msg_to, message, msg_time, msg_date) VALUES ('$roll_no', '$message', '$time', '$date')";

if ($db->query($query) === TRUE) {

	$query_r = "INSERT INTO $receiver_tbl ( msg_from, message, msg_time, msg_date) VALUES ('$userid', '$message', '$time', '$date')";
	if ($db->query($query_r) === TRUE) {
		echo "Message sent";
	}else{
		echo " Something wrong.. Please try again" . $db->error;
	}
}else{
	echo " Something wrong.. Please try again" . $db->error;
}



?>
