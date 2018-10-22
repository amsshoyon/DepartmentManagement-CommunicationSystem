<?php

	include('server.php');
	$user_temp = $_SESSION["sess_apeeadmin"];
	$sql_query = "SELECT id FROM admin WHERE username='$user_temp';";

	$result = mysqli_query($db, $sql_query);
	$row = mysqli_fetch_array($result);
	$id = $row["id"]; 
	//im=nitializing variable
	
	$edit_state = true;
	
	//connect to database
	
	
	
	$rec = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$firstname = $record['firstname'];
	$lastname = $record['lastname'];
	$username = $record['username'];
	$email = $record['email'];
	$phone = $record['phone'];
	$image = $record['image'];
	$id = $record['id'];

	$fullname = $firstname.' '.$lastname ;
	
	//update data
	if (isset($_POST['save'])) {
		
		unlink("assets/images/admin/".$image);

		$target = "assets/images/admin/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$target);

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
			
		mysqli_query($db, "UPDATE admin SET firstname='$firstname', lastname='$lastname', phone='$phone' , image='$image' WHERE id=$id");

		$for_img = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");
		$img_sess = mysqli_fetch_array($for_img);
		$image= $img_sess['photo'];

		header('location: my_profile.php');
	}
	

	


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/style.css" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<script src="assets/js/jquery.js"></script>

</head>

<body class="no-skin">
	

<style type="text/css">
    
  input.hidden {
    position: absolute;
    left: -9999px;
  }

  #profile-image1 {
    cursor: pointer;
    width: 100px;
    height: 100px;
    border:2px solid #03b1ce ;
  }
  .tital{ 
    font-size:16px; 
    font-weight:500;
  }
  .bot-border{ 
    border-bottom:1px #f8f8f8 solid;  
    margin:5px 0  5px 0;
  } 

</style>

<div class="panel panel-default container" style="margin-top: 150px;">
  <div class="panel-heading">
  	<span style="font-size: 25px;">My Profile 
  		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_profile" style="float:right;">Edit Profile</button>
  	</span>
  	
  </div>
  <div class="panel-body">
    <div class="box box-info">
      <div class="box-body">
        <div class="col-sm-6">
          <div  align="center"> 
          	<img alt="User Pic" src="assets/images/admin/<?php echo $image ; ?>" id="profile-image1" class="img-circle img-responsive"> 
          </div>
          <br>
        </div>
        <div class="col-sm-6">
          <h4 style="color:#00b1b1;"><?php echo $fullname ; ?> </h4></span>
          <span><p>Admin</p></span>            
        </div>
        <div class="clearfix"></div>
        <hr style="margin:5px 0 5px 0;">
            
                      
        <div class="col-sm-5 col-xs-6 tital " >First Name:</div>
        <div class="col-sm-7 col-xs-6 "><?php echo $firstname ; ?> </div>
        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Last Name:</div>
        <div class="col-sm-7"> <?php echo $lastname ; ?> </div>
        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >User Name:</div>
        <div class="col-sm-7"> <?php echo $username ; ?> </div>
        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Email:</div>
        <div class="col-sm-7"> <?php echo $email ; ?> </div>
        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Contact no:</div>
        <div class="col-sm-7"> <?php echo $phone ; ?> </div>
        <div class="clearfix"></div>
        <div class="bot-border"></div>


      </div>
    </div>
  </div> 
</div>





<div id="edit_profile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">

		<div class="">
			<form method="post" action="my_profile.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>" required>

				<fieldset class="file-input">
					<input type="file" name="image" id="image" />
					<span class='button'>Choose A Photo</span>
					<span class='label' data-js-label>No file selected</label>
				</fieldset>

				<fieldset class="file-input">
					<input placeholder="First Name" type="text" name="firstname" tabindex="1" value="<?php echo $firstname; ?>" required>
				</fieldset>

				<fieldset class="file-input">
					<input placeholder="Last Name" type="text" name="lastname" tabindex="1" value="<?php echo $lastname; ?>" required>
				</fieldset>

				<fieldset class="file-input">
					<input placeholder="Phone" type="text" name="phone" tabindex="1" value="<?php echo $phone; ?>" required>
				</fieldset>

				<fieldset class="file-input">
					<input type="submit" name="save" id="insert" value="Save" class="btn btn-info" />
				</fieldset>
			</form>
		</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





<script src="assets/js/bootstrap.min.js"></script>



	
</body>
</html>