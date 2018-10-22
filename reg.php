<?php
	
include('server.php');
//im=nitializing variable
$userid = "";
$username = "";
$pass = "";
$email = "";
$phone = "";
$member_type = "";
$id = 0;


$member_type =$_POST['member_type'];


if ($member_type =='student') {

	$userid =$_POST['userid'];
	$username =$_POST['username'];
	$pass =$_POST['pass_two'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];


	$userid_search = "SELECT * FROM students WHERE userid='$userid'";
	$userid_exist = mysqli_query($db, $userid_search);
	$username_search = "SELECT * FROM students WHERE username='$username'";
	$username_exist = mysqli_query($db, $username_search);

	if (mysqli_num_rows($userid_exist) > 0) {

		echo "<span style='color:red;'><small> >> Yoy are already registered. <small></span>";

	}else if(mysqli_num_rows($username_exist) > 0){

		echo "<span style='color:red;'><small> >> Username exists . <small></span>";

	}else{

	//$query = "INSERT INTO students (reg_no, username, pass, email, phone) VALUES ('$reg_no','$username', '$pass', '$email','$phone')";
	//$results = mysqli_query($db, $query);


	$student_insert = "INSERT INTO students (userid, username, pass, email, phone) VALUES ('$userid','$username', '$pass', '$email','$phone')";

	if ($db->query($student_insert) === TRUE) {

		$get_data = mysqli_query($db, "SELECT * FROM students WHERE userid=$userid");
		$record = mysqli_fetch_array($get_data);
		$username = $record['username'];

		$table_name = 'student_'.$username;


			$student_table = "CREATE TABLE $table_name (
				id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				product VARCHAR(20),
				amount VARCHAR(30),
				location VARCHAR(200),
				priority VARCHAR(50)
			)";
			if ($db->query($student_table) === TRUE) {
			    echo "<span style='color:#168781;'><small> >> Thank you , You are successfully registered... <small></span>";
			} else {
			    echo "<span style='color:red;'><small> >> Registration Failed. <small></span>" . $db->error;
			}

	} else {
	    echo "<span style='color:red;'><small> >> Registration Failed. <small></span>" . $db->error;
	}

	$db->close();


	}

}else if ($member_type =='teacher') {

	$userid =$_POST['userid'];
	$username =$_POST['username'];
	$pass =$_POST['pass_two'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];


	$userid_search = "SELECT * FROM teachers WHERE userid='$userid'";
	$userid_exist = mysqli_query($db, $userid_search);
	$username_search = "SELECT * FROM teachers WHERE username='$username'";
	$username_exist = mysqli_query($db, $username_search);

	if (mysqli_num_rows($userid_exist) > 0) {

		echo "<span style='color:red;'><small> >> Yoy are already registered. <small></span>";

	}else if(mysqli_num_rows($username_exist) > 0){

		echo "<span style='color:red;'><small> >> Username exists . <small></span>";

	}else{

		$teacher_insert = "INSERT INTO teachers (userid, username, pass, email, phone) VALUES ('$userid','$username', '$pass', '$email','$phone')";

		if ($db->query($teacher_insert) === TRUE) {

			 echo "<span style='color:#168781;'><small> >> Thank you , You are successfully registered... <small></span>";

		} else {
		    echo "<span style='color:red;'><small> >> Registration Failed. <small></span>" . $db->error;
		}


	$db->close();

	}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

