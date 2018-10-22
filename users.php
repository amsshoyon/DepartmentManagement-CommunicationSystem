<?php
include('redirect.php');
include('server.php');

$member_type ="";
$userid ="";


$table = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM $table "); 

if ($table == "students") {
	$location = "images/user/student/";
}else if ($table == "teachers") {
	$location = "images/user/teacher/";
}

?>


<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/courses.css">
	<link rel="stylesheet" href="css/status.css">

	


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<style type="text/css">
	.user_name{
		padding: 10px;
		background-color: #37BF91;
		border:1px solid red;
		color: #fff;
	}
	.user_name a{
		color: #fff;
		text-decoration: none;
		opacity: .7;
	}
	.user_name a:hover{
		opacity: 1;
	}
</style>

<section class="col-md-8" style="margin-top: 110px;">

		<?php while($user = mysqli_fetch_array($result)){ ?>
			<?php
				$image = $user['image'];
				if (empty($image)) {
					$image = 'user.jpg';
				}
			?>
			<div class="col-md-3 col-sm-6 col-xs-6 team-grids" style="margin-top: 10px;">
				<div class="thumbnail team-agileits">
					<img src="<?php echo $location; ?><?php echo $image; ?>" class="img-responsive" alt="" style="height:250px;width: 100%;"/>
					<div class="text-center user_name">
						<a href=""><h4><?php echo $user['name']; ?></h4></a>
					</div>
				</div>
			</div>
		<?php } ?>

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

