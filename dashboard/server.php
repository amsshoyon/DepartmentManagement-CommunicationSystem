<?php
	$db = mysqli_connect('localhost', 'root', '', 'apee');

	session_start();
    if(!isset($_SESSION["sess_apeeadmin"])){
    		header('location: ../admin_login/admin_login.php');
	}
?>
