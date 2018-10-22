<?php

include('redirect.php');

?>


<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>APEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/menu.css">

	


</head>
<body>

 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 100px;">

<?php include('class_routine.php'); ?>
<?php include('status.php'); ?>



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

