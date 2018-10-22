<?php

include('server.php');
include('session.php');
$roll_no = $_SESSION["apee_userid"];

if(isset($_POST['get_option'])) {

	 $state = $_POST['get_option'];


	 if($state == 'part_one_odd'){
	 	$year = 'Part-I';
	 	$semester = 'Odd';
	 }else if ($state == 'part_one_even'){
	 	$year = 'Part-I';
	 	$semester = 'Even';
	 }else if ($state == 'part_two_odd'){
	 	$year = 'Part-II';
	 	$semester = 'Odd';
	 }else if ($state == 'part_two_even'){
	 	$year = 'Part-II';
	 	$semester = 'Even';
	 }else if ($state == 'part_three_odd'){
	 	$year = 'Part-III';
	 	$semester = 'Odd';
	 }else if ($state == 'part_three_even'){
	 	$year = 'Part-III';
	 	$semester = 'Even';
	 }else if ($state == 'part_four_odd'){
	 	$year = 'Part-IV';
	 	$semester = 'Odd';
	 }else if ($state == 'part_four_even'){
	 	$year = 'Part-IV';
	 	$semester = 'Even';
	 }

	 $course_data= mysqli_query($db, "SELECT * FROM students WHERE year='$year' AND semester = '$semester' AND roll_no != '$roll_no'");
	 while($row = mysqli_fetch_array($course_data))
	 {
	  echo "<option value='".$row['roll_no']."'>".$row['name']."</option>";
	 }
	 exit;
}



?>