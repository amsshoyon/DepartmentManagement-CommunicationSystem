<?php

$login="";
$logged_in="";


session_start();
if(!isset($_SESSION["apee_userid"])  && !isset($_SESSION["apee_user"])){
	$login='visible';
	$logged_in="hidden";
}
else{

	$login='hidden';
	$logged_in="visible";
}

?>