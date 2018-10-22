<?php 
include('server.php'); 
	$forgotmsg = "";

	if(isset($_POST['submit'])){
		$email_tmp =$_POST['email'];
		
		$sql_query = "select firstname,lastname,username,email,pass from registration where email like '$email_tmp';";

		$result = mysqli_query($db, $sql_query);

		if(mysqli_num_rows($result) > 0 ){

			$row = mysqli_fetch_assoc($result);
			$firstname =  $row['firstname'];
			$lastname =  $row['lastname'];
			$username =  $row['username'];
			$email =  $row['email'];
			$pass =  $row['pass'];
			
			$to = 'amsshoyon@gmail.com';
			$subject = "Forgot Password";
			$message ="
			Message From : Lab... .
			Hello $firstname $lastname ,  Your username is '$username' and password is '$pass'  
			Keep Your information Secret.. thank you";
			
			$mailsent = mail($to, $subject, $message);

			if($mailsent) {
				$forgotmsg = "<span style='color:green;'>An email with username and Password has been sent ...</span>";
			}else{
				$forgotmsg =  "<span style='color:red;'>Sorry !! Message not sent . Time out...</span>";
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}

		}else
			$forgotmsg =  "Incorrect Email / You are not an Admin";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>APEE - DashBoard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/hamburgers.css">
	<link rel="stylesheet" type="text/css" href="css/select2.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body>

<section class="limiter">
	<div class="container-login100">

	
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
				<img src="assets/img-01.png" alt="IMG">
			</div>

			<form id="myform" class="login100-form" method="post" action="forgot_pass.php">
					
				<span class="login100-form-title" id="">
					Forgot Password !!!
				</span>

				<fieldset  class="wrap-input100">
					<input type="email" class="input100"  name="email" id="email" placeholder="Your Email" data-rule="email"  tabindex="2" required/>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</fieldset>
				
				<fieldset class="container-login100-form-btn">
					  <button onclick="myfn()"  name="submit" type="submit" id="contact-submit" class="login100-form-btn">Retrive Password</button>
				</fieldset>
				<div class="text-center" id="result" style="color:red;font-size:15px;padding:10px;">
					<?php echo $forgotmsg; ?>
				</div>

				<div class="text-center p-t-12">
					<a class="txt2" href="admin_login.php">
						Login
					</a>
					<a class="txt2" href="admin_reg.php">
						Register as Admin
					</a>
				</div>
			</form>
		</div>
	</div>
</section>

<script type="text/javascript">
	function myfn() {
	 
	var x = document.forms["myform"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
	
	
	var b=document.forms["myform"]["email"].value;
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
	var elem = document.getElementById("result");
	elem.innerHTML = "Message is sending";
	elem.style.color = "#00BEFD";
	return( true );
	}
	
</script>	


<!--===============================================================================================-->
<script type="text/javascript" async="" src="js/analytics.js"></script><script src="js/jquery-3.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/select2.js"></script>
<script src="js/tilt.js"></script>

<script>
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

	



</body>
</html>