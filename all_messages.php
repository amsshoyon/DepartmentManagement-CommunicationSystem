<?php
include('redirect.php');
include('server.php');

$member_type = $_SESSION["apee_user"];
$userid =$_SESSION["apee_userid"];

$tbl = 'msg_'.$userid;


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
  
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#inbox">Inbox</a></li>
  <li><a data-toggle="tab" href="#sent">Sent </a></li>
</ul>

<div class="tab-content">
  <div id="inbox" class="tab-pane fade in active">
    <div class="list-group">

<?php 
$result = mysqli_query($db, "SELECT * FROM $tbl WHERE msg_from != ''  ORDER BY id DESC"); 

while($msg_data = mysqli_fetch_array($result)){ 
?>

    <a href="view_msg.php?tbl=<?php echo $msg_table ;?> & id=<?php echo $msg_data['id']; ?>" class="list-group-item">Message from : <?php echo $from; ?>
      <span class="pull-right"><?php echo $msg_data['msg_time']; ?> || <?php echo $msg_data['msg_date']; ?></span>
    </a>

<?php } ?>

    </div>
  </div>
  <div id="sent" class="tab-pane fade">
    <div class="list-group">

<?php 
$result = mysqli_query($db, "SELECT * FROM $tbl WHERE msg_to != ''  ORDER BY id DESC"); 

while($msg_data = mysqli_fetch_array($result)){ 
?>

    <a href="view_msg.php?tbl=<?php echo $msg_table ;?> & id=<?php echo $msg_data['id']; ?>" class="list-group-item">Message from : <?php echo $from; ?>
      <span class="pull-right"><?php echo $msg_data['msg_time']; ?> || <?php echo $msg_data['msg_date']; ?></span>
    </a>

<?php } ?>

    </div>

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


