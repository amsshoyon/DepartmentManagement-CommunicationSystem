


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SpiderWeb</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/slider.css" rel="stylesheet">
</head>

<body>

		<li class="cart-icon login <?php //echo $logged_in; ?>">
			<i class="fa fa-envelope js-show-header-dropdown" style="font-size: 20px;padding: 5px;"></i>
			<span class="header-icons-noti">5<?php //echo $num_cart; ?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown" style="width: 400px;overflow: hidden;padding: 0;margin: 0;">


				<div class=" <?php echo $logged_in; ?>" id="" >
					<div class="col-md-12 text-center" style="background-color: #EBEDEF;padding: 12px;">
						<a href="all_messages.php" style="color: #333333;">View All Messages</a>
					</div>
					<div class="clearfix"></div>
					<div class="list-group">


<?php 
include('server.php'); 
$from = '';

$userid = $_SESSION["apee_userid"];
$msg_table = 'msg_'.$userid;

$get_msg = mysqli_query($db, "SELECT * FROM $msg_table ORDER BY id DESC limit 5");
while($msg_data = mysqli_fetch_array($get_msg)){

$from_id = $msg_data['msg_from'];

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

					    <a href="view_msg.php?tbl=<?php echo $msg_table ;?> & id=<?php echo $msg_data['id']; ?>" class="list-group-item">Message from : <?php echo $from; ?></a>


<?php } ?>


					</div>
					

					
				</div>
				


			<div class="hidden <?php //echo $login; ?>" style="text-align: center;">
				<p>Please Login First</p>
				<hr>
				<a href="user/user_login.php" class="btn btn-danger">Login</a>
			</div>
				
			</div>
		</li>

<script src="js/jquery.min.js"></script>
<script >
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");

</script>

<!-- JavaScript -->
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
