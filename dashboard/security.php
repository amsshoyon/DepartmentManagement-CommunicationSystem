<?php

	include('server.php');
	$user_temp = $_SESSION["sess_apeeadmin"];
	$sql_query = "SELECT id FROM admin WHERE username='$user_temp';";

	$result = mysqli_query($db, $sql_query);
	$row = mysqli_fetch_array($result);
	$id = $row["id"]; 
	//im=nitializing variable
	
	//connect to database
	
	
	$rec = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$username = $record['username'];
	$email = $record['email'];
	$password = "";
	$id = $record['id'];

	
	//update data
	if (isset($_POST['save'])) {
		
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['pass_two'];

		$id =$_POST['id'];
		
		mysqli_query($db, "UPDATE admin SET username='$username', email='$email', password='$password' WHERE id=$id");
		$_SESSION['msg'] = "Address updated";
		header('location: security.php');
	}
	

	


?>

<!DOCTYPE html>
<html lang="en">
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
	

<div style="width:40%; margin: 0 auto;">
	<form id="reg_form" method="post" action="security.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id; ?>" required>


		<fieldset class="file-input">
			<input placeholder="Username" type="text" name="username" tabindex="1" value="<?php echo $username; ?>" required>
		</fieldset>

		<fieldset class="file-input">
			<input placeholder="Email" type="text" name="email" tabindex="1" value="<?php echo $email; ?>" required>
		</fieldset>

		<fieldset class="file-input">
			<input placeholder="Password" type="password" name="pass_one" tabindex="1" value="" required>
		</fieldset>

		<fieldset class="file-input">
			<input placeholder="Confirm Password" type="password" name="pass_two" tabindex="1" value="" required>
		</fieldset>

		<fieldset class="file-input">
			<input type="submit" name="save" id="insert" onclick="return myfn()" value="Save" class="btn btn-info" />
		</fieldset>
		<div id='result' style="padding:15px;text-align:center;color:red;"></div>
	</form>
</div>


<script type="text/javascript">
	function myfn() {


	 
	 var username=document.forms["reg_form"]["username"].value;
	if (username==null || username=="")
	 {
	  document.getElementById("result").innerHTML = " Error : username must be filled...";
	  return false;
	 }
	 
	var x = document.forms["reg_form"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
	
	
	var b=document.forms["reg_form"]["email"].value;
	if (b==null || b=="")
	 {
	  document.getElementById("result").innerHTML = " Error : Email field must be filled...";
	  return false;
	 }else{
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			document.getElementById("result").innerHTML = " Error : Please Enter a valid Email Address .........";
			return false;
		}
	 }
	 
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("result").innerHTML = " Error : Please Enter a valid Email Address .........";
        return false;
    }
	 
	
	 var pass_one=document.forms["reg_form"]["pass_one"].value;
	if (pass_one==null || pass_one=="")
	 {
	  document.getElementById("result").innerHTML = " Error : Password must be filled...";
	  return false;
	 }
	 
	 var pass_two=document.forms["reg_form"]["pass_two"].value;
	 if (pass_one != pass_two)
	 {
	  document.getElementById("result").innerHTML = " Error : Password must be Same...";
	  return false;
	 }

	 var r = confirm("do you want to save");
		if(r == true ){
			alert ("record Saved")
		}else{
			return r;
	}
			 
	}
	
</script>	


<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
