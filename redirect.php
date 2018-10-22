<?php

include('session.php');

if(!isset($_SESSION["apee_userid"])  && !isset($_SESSION["apee_user"])){
	header("Location:index.php");
}
?>