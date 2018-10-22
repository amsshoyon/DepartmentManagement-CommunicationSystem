<?php

include('server.php');

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

	 $course_data= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester = '$semester' ");
	 while($row = mysqli_fetch_array($course_data))
	 {
	  echo "<option value='".$row['course_id']."'>".$row['course_code']."</option>";
	 }
	 exit;
}



?>