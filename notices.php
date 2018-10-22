<?php
include('redirect.php');
include('server.php');
 
$start = 0;
$end = 10;
$next = 'visible';
$previous = 'hidden';

$count_notice = mysqli_query($db, "SELECT * FROM noticeboard ");
$rowcount=mysqli_num_rows($count_notice);


if ($rowcount <= $end) {
  $previous = 'hidden';
  $next = 'hidden';
}

if(isset($_POST['previous'])){

  $start = $_POST['page'];

  if ($start == 0) {
    $start = 0 ;
  }else{

    $previous = 'visible';
    $start = $start - $end;
    if ( $start <= 0) {
      $start = 0;
      $previous = 'hidden';
    }
  }


}else if(isset($_POST['next'])){

  $start = $_POST['page'];
  $previous = 'visible';

  

  if ($compare >= 0) {
    $start = $start + $end;

    $compare = $rowcount - ( $start + $end);
    if ($compare <= 0) {
      $next = 'hidden';
    }
  }else {
    $next = 'hidden';
  }


}




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


<style type="text/css">
 .desc p{
    white-space: pre-line;
  }
  
</style>


<?php 

$get_notice = mysqli_query($db, "SELECT * FROM noticeboard ORDER BY id DESC limit $start , $end");
while($notice_data = mysqli_fetch_array($get_notice)){

$heading = $notice_data['heading'];
$notice = $notice_data['notice'];
$shortname = $notice_data['shortname'];
$date = $notice_data['date'];
$time = $notice_data['time'];


?>
<form method="post" id="notice_mark">
  <div class="notice notice-success"> 
      <span style="margin-left: 30px;"> <?php echo $time; ?> : <?php echo $date; ?> : </span>
      <strong><?php echo $heading; ?> </strong>
      <span class="pull-right text-success readMore">Read</span>
      <div class="desc">       
         <p style="padding-top: 10px;border-top: 1px solid #333333;"><?php echo $notice; ?></p>        
      </div>
  </div>


</form>
    

<?php } ?>

<div class="pull-middle">
  <form method="post" action="notices.php">
    <input type="hidden" name="page" value="<?php echo $start; ?>">
    <button class="<?php echo $previous; ?>" type="submit" name="previous" style="width: 150px;margin: 10px;"><< Previous</button>
    <button class="<?php echo $next; ?>" type="submit" name="next" style="width: 150px;margin: 10px;">Next >></button>
  </form>
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


