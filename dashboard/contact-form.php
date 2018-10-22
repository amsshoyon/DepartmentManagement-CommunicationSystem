<?php 
	include ('server.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject= $_POST['subject'];
	$msg = $_POST['message'];
	
	$query = "INSERT INTO sent_msg (name, email, subject, msg) VALUES ('$name', '$email', '$subject', '$msg')";
	mysqli_query($db, $query);
	
	$to = 'amsshoyon@gmail.com';

	$message ="
	Message From : $name .
	$name said : $msg";
	
	$mailsent = mail($to, $subject, $message);

	if($mailsent) {
		echo "<span style='color:green;'>Your Message has sent successfully.. Thank you for contacting me ...</span>";
	}else{
		echo "<span style='color:red;'>Sorry !! Message not sent . Time out...</span>";
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
