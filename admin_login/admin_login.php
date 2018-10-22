<?php include('server.php'); 

	$username_tmp = "";
	$password_tmp = "";
	
	if(isset($_POST['login'])){
		$username_tmp =$_POST['username'];
		$password_tmp =$_POST['password'];
		

		$select = "SELECT * FROM admin WHERE username = '$username_tmp' and password = '$password_tmp'";
		$result = mysqli_query($db, $select);
		while($row = mysqli_fetch_array( $result )){        

            $_SESSION["sess_apeeadmin"]= $row['username'];

                header("Location: ../dashboard/index.php");
            }
            $msg = "Incorrect Email / Password :";
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>APEE- DashBoard</title>
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

			<form class="login100-form validate-form" method="post" action="admin_login.php">
					<?php if(isset($_SESSION['msg'])): ?>
						<div class="" style="text-align:center;border:1px solid #C0C0C0;color:#CCFFFF;background-color:#333333;border-radius:10px;font:15px;padding:15px;">
							<?php
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							?>
						</div>
					<?php endif ?>
				<span class="login100-form-title" id="">
					Member Login
				</span>

				<div class="wrap-input100">
					<input class="input100" name="username" placeholder="Username.." type="text" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 ">
					<input class="input100" name="password" placeholder="Password.." type="password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="login">
						Login
					</button>
				</div>
				<div class="text-center msg" id="msg" style="color:red;font-size:15px;padding:10px;"></div>

				<div class="text-center p-t-12">
					<span class="txt1">
						Forgot
					</span>
					<a class="txt2" href="forgot_pass.php">
						Username / Password?
					</a>
				</div>

			</form>
		</div>
	</div>
</section>

<script type="text/javascript">
	document.getElementById("msg").innerHTML = "<?php echo $msg; ?>";
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