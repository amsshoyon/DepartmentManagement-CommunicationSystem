<?php
include('session.php');
include('server.php');

$member_id =$_SESSION["apee_userid"];

if (isset($_POST['update_security'])) {

    $member_type =$_SESSION["apee_user"];
    $password = $_POST['pass_two'];

    if ($member_type =='student') {
        $password = $_POST['pass_two'];

        $id =$_POST['id'];
        
        mysqli_query($db, "UPDATE students SET pass = $password WHERE roll_no = $member_id");
        header('location: my_profile.php');
    
    }else if($member_type =='teacher'){

        $password = $_POST['pass_two'];

        $id =$_POST['id'];
        
        mysqli_query($db, "UPDATE teachers SET pass= $password WHERE userid = $member_id" );
        header('location: my_profile.php');
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
    <link rel="stylesheet" href="css/courses.css">
	<link rel="stylesheet" href="css/status.css">

	


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 120px;margin-bottom: 500px;">
<div class="" style="width: 70%;margin: 0 auto;background-color: #F5F5F5;padding: 20px;border-radius: 5px;box-shadow: 2px 5px 5px 2px rgba(0, 0, 0, 0.1);">
    	<div class="col-md-12" style="padding: 20px;">
			<h3>Edit Security <span id="result" style="color: red; margin-left: 20px;"></span></h3>
		</div>
		<div class="clearfix"></div>
		<div style="width: 100%;height: 5px;border-top: 1px solid #333333;border-bottom: 1px solid red;margin-bottom: 30px;"></div>
    	<form id="security_update" method="post" action="edit_security.php">
            <!-- Form start -->
            <div class="row">
                <!-- Text input-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input name="pass_one" type="password" placeholder="Password" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="password2">Confirm Password</label>
                        <input name="pass_two" type="password" placeholder="Confirm Password" class="form-control input-md">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="col-md-12">
                    <div class="form-group">
                        <button id="singlebutton" name="update_security" class="btn btn-info pull-right"  onclick="return validate()">Update Security Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
	    


</section>


<script type="text/javascript">


function validate() {

    var pass_one=document.forms["security_update"]["pass_one"].value;
    if (pass_one==null || pass_one=="")
     {
      document.getElementById("result").innerHTML = " Error : Password must be filled...";
      return false;
     }

    var pass_two=document.forms["security_update"]["pass_two"].value;
    if (pass_two==null || pass_two=="")
     {
      document.getElementById("result").innerHTML = " Error : Confirm Password...";
      return false;
     }
     
    var pass_two=document.forms["security_update"]["pass_two"].value;
     if (pass_one != pass_two)
     {
      document.getElementById("result").innerHTML = " Error : Password must be Same...";
      return false;
     }


    var elem = document.getElementById("result");
    elem.style.color = "#168781";

    return( true );

             
}
</script>

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

