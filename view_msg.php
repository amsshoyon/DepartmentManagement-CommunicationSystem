<?php
include('redirect.php');
include('server.php');

$member_type = $_SESSION["apee_user"];
$userid =$_SESSION["apee_userid"];


$tbl = $_GET['tbl'];
$id = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM $tbl WHERE id = '$id'"); 
$msg_data = mysqli_fetch_array($result);

$from_id = $msg_data['msg_from'];
$message = $msg_data['message'];
$msg_time = $msg_data['msg_time'];
$msg_date = $msg_data['msg_date'];

$userid_search_s = "SELECT * FROM students WHERE roll_no='$from_id'";
$userid_exist_s = mysqli_query($db, $userid_search_s);

$userid_search_t = "SELECT * FROM teachers WHERE userid='$from_id'";
$userid_exist_t = mysqli_query($db, $userid_search_t);

if (mysqli_num_rows($userid_exist_s) > 0) {
	$student_sql = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$from_id'");
	$student_info = mysqli_fetch_array($student_sql);
	$from = $student_info['name'];
}else if (mysqli_num_rows($userid_exist_t) > 0) {
	$teacher_sql = mysqli_query($db, "SELECT * FROM teachers WHERE userid='$from_id'");
	$teacher_info = mysqli_fetch_array($teacher_sql);
	$from = $teacher_info['name'];
}

?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">

	


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 110px;">
  
	<div class="" style="width: 80%; background-color: #EBEDEF;border-radius: 10px;margin: 0 auto;">
		<div style="padding: 20px; border-bottom: 1px solid #333333;">
			<span>from : <?php echo $from; ?></span><span class="pull-right"><?php echo $msg_time; ?> || <?php echo $msg_date; ?></span>
		</div>

		<div style="padding: 20px; margin-bottom: 1px solid #333333;">
			<p>
				<?php echo $message; ?>	
			</p>
		</div>
		
	</div>




  
</section>

 <?php include('footer.php'); ?>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/notification.js"></script>



<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>


