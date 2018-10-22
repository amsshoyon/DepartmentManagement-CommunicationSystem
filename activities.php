<?php
include('redirect.php');

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
 
<?php $activities = mysqli_query($db, "SELECT * FROM activities "); ?>
<?php while($show_activity = mysqli_fetch_array($activities)){ ?>

    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
        <a class="thumbnail " rel="" href="images/activities/<?php echo $show_activity['image']; ?>">
            <img class="img-responsive" alt="" src="images/activities/<?php echo $show_activity['image']; ?>" style="width: 350px;height: 250px;" />
            <div class='text-right'>
                <small class='text-muted'><?php echo $show_activity['date']; ?> - <?php echo $show_activity['time']; ?></small>
            </div>
            <div class='' style="border-top: 1px solid #333333;">
                <p class=''><?php echo $show_activity['title']; ?></p>
            </div> 
        </a>
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


