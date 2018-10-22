<?php
//include('redirect.php');

?>

<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/activities.css">

	


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 110px;">

<?php 

$get_notice = mysqli_query($db, "SELECT * FROM noticeboard ORDER BY id DESC limit 30");
while($notice_data = mysqli_fetch_array($get_notice)){

$heading = $notice_data['heading'];
$notice = $notice_data['notice'];
$shortname = $notice_data['shortname'];
$date = $notice_data['date'];
$time = $notice_data['time'];


?>

    <div class="notice notice-success">
          
          <span style="margin-left: 30px;"> <?php echo $time; ?> : <?php echo $date; ?> : </span>
          <strong><?php echo $heading; ?> </strong>
          <span class="pull-right text-success readMore">Read</span>
          <div class="desc">       
             <p style="padding-top: 10px;border-top: 1px solid #333333;"><?php echo $notice; ?></p>        
          </div>
      </div>

<?php } ?>


</section>



 <?php include('footer.php'); ?>




</body>
</html>


