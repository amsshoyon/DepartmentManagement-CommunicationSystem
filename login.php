<?php 
include('server.php'); 

$userid_temp = "";
$pass_tmp = "";

$userid_temp =$_POST['userid'];
$pass_tmp =$_POST['pass'];

if(isset($_POST['login'])){

	$userid_search_s = "SELECT * FROM students WHERE roll_no='$userid_temp'";
	$userid_exist_s = mysqli_query($db, $userid_search_s);
	$pass_search_s = "SELECT * FROM students WHERE pass='$pass_tmp'";
	$pass_exist_s = mysqli_query($db, $pass_search_s);

	$userid_search_t = "SELECT * FROM teachers WHERE userid='$userid_temp'";
	$userid_exist_t = mysqli_query($db, $userid_search_t);
	$pass_search_t = "SELECT * FROM teachers WHERE pass='$pass_tmp'";
	$pass_exist_t = mysqli_query($db, $pass_search_t);

	if (mysqli_num_rows($userid_exist_s) > 0) {

		if(mysqli_num_rows($pass_exist_s) > 0){

			$student_sql = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$userid_temp'");
			$student_info = mysqli_fetch_array($student_sql);

			session_start();
	        $_SESSION["apee_userid"]= $student_info['roll_no'];
	        $_SESSION["apee_user"]= 'student';
			header("Location:home.php");
		}else {
			header("Location:index.php");
		}

	}else if(mysqli_num_rows($userid_exist_t) > 0) {

			if(mysqli_num_rows($pass_exist_t) > 0){

				$teacher_sql = mysqli_query($db, "SELECT * FROM teachers WHERE userid='$userid_temp'");
				$teacher_info = mysqli_fetch_array($teacher_sql);

				session_start();
		        $_SESSION["apee_userid"]= $teacher_info['userid'];
		        $_SESSION["apee_username"]= $teacher_info['username'];
		        $_SESSION["apee_user"]= 'teacher';
				header("Location:home.php");
			}else{

				header("Location:index.php");
			}

		}else {
			header("Location:index.php");
		}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>

