


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/noti.css">

</head>

<body>

		<li class="cart-icon login <?php //echo $logged_in; ?>">
			<i class="fa fa-bell js-show-header-dropdown" style="font-size: 20px;padding: 5px;"></i>
			<span class="header-icons-noti">6<?php //echo $num_cart; ?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown" style="width: 400px;overflow: hidden;padding: 0;margin: 0;">


				<div class=" <?php //echo $logged_in; ?>" id="" >

<?php 

$get_notice = mysqli_query($db, "SELECT * FROM noticeboard ORDER BY id DESC limit 5");
while($notice_data = mysqli_fetch_array($get_notice)){

$heading = $notice_data['heading'];
$notice = $notice_data['notice'];
$shortname = $notice_data['shortname'];
$date = $notice_data['date'];
$time = $notice_data['time'];


?>

		<div class="notice notice-success">
	        <strong><?php echo $heading; ?></strong>
	        <span class="pull-right text-success readMore">Read</span>
	        <div class="desc">
	           <p><span><?php echo $time; ?></span> - <span><?php echo $date; ?></span></p>        
	           <p><?php echo $notice; ?></p>        
	        </div>
	    </div>

<?php } ?>

				</div>
				


			<div class="" style="text-align: center;padding: 10px;">
				<a href="notices.php">View all notices</a>
			</div>
				
			</div>
		</li>

<script src="js/jquery.min.js"></script>
<script >
	$(document).ready(function(){
		$(".readMore").click(function(){
		var This=$(this);    
		$(this).next().toggle(function(){
		    if(This.text()=="Read"){
		      This.text("Hide") 
		    }
		    else{
		        This.text("Read") 
		    }
		})
	});})

</script>

<!-- JavaScript -->
<script src="js/jquery.js"></script>
<script src="js/menu.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
