<?php
	
include('server.php');
//im=nitializing variable
$reg_id = '';
$roll_no = '';
$name = '';
$session = '';
$year = '';
$semester = '';
$hall = '';
$pass = '';
$email = '';
$id = 0;


$member_type =$_POST['member_type'];


if ($member_type =='student') {

	$reg_id =$_POST['reg_id'];
	$roll_no =$_POST['roll_no'];
	$name =$_POST['name'];
	$session =$_POST['session'];
	$year =$_POST['year'];
	$semester =$_POST['semester'];
	$hall =$_POST['hall'];
	$pass =$_POST['pass_two'];
	$email =$_POST['email'];


	$regid_search = "SELECT * FROM students WHERE reg_id='$reg_id'";
	$regid_exist = mysqli_query($db, $regid_search);
	$roll_search = "SELECT * FROM students WHERE roll_no='$roll_no'";
	$roll_exist = mysqli_query($db, $roll_search);

	if (mysqli_num_rows($regid_exist) > 0) {

		echo "<span style='color:red;'><small> >> This Student is already registered. <small></span>";

	}else if(mysqli_num_rows($roll_exist) > 0){

		echo "<span style='color:red;'><small> >> Roll No exists . <small></span>";

	}else{


	$student_insert = "INSERT INTO students (reg_id, roll_no, name,session, year, semester, hall, pass, email) VALUES ('$reg_id','$roll_no', '$name','$session', '$year','$semester','$hall','$pass','$email')";

	if ($db->query($student_insert) === TRUE) {

        $msg_table = 'msg_'.$roll_no;

        $create_table = "CREATE TABLE $msg_table (
                    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    roll_no VARCHAR(10),
                    msg_to VARCHAR(10),
                    msg_from VARCHAR(10),
                    message VARCHAR(50),
                    msg_time VARCHAR(50),
                    msg_date  VARCHAR(20),
                    user_type  VARCHAR(20)
                )";
        if ($db->query($create_table) === TRUE) {
             echo "<span style='color:green;'><small> >> Thank you , You are successfully registered... <small></span>";
        } else {

            echo " Something wrong.. Please try again" . $db->error;

        }

			   

	} else {
	    echo "<span style='color:red;'><small> >> Registration Failed. <small></span>" . $db->error;
	}

	$db->close();

	}

}else if ($member_type =='teacher') {

	$userid =$_POST['userid'];
	$name =$_POST['name'];
	$pass =$_POST['pass_two'];
	$email =$_POST['email'];
	$rank =$_POST['rank'];
	$shortname =$_POST['shortname'];


	$userid_search = "SELECT * FROM teachers WHERE userid='$userid'";
	$userid_exist = mysqli_query($db, $userid_search);

	if (mysqli_num_rows($userid_exist) > 0) {

		echo "<span style='color:red;'><small> >> Yoy are already registered. <small></span>";

	}else{

		$teacher_insert = "INSERT INTO teachers (userid, name, pass, email, rank ,shortname) VALUES ('$userid','$name', '$pass', '$email','$rank','$shortname')";

		if ($db->query($teacher_insert) === TRUE) {

				$msg_table = 'msg_'.$userid;

		        $create_table = "CREATE TABLE $msg_table (
		            id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    userid VARCHAR(10),
                    msg_to VARCHAR(10),
                    msg_from VARCHAR(10),
                    message VARCHAR(50),
                    msg_time VARCHAR(50),
                    msg_date  VARCHAR(20),
                    user_type  VARCHAR(20)
                )";
		        if ($db->query($create_table) === TRUE) {
		             echo "<span style='color:green;'><small> >> Thank you , You are successfully registered... <small></span>";
		        } else {
		            echo " Something wrong.. Please try again" . $db->error;

		        }

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

