
<?php
session_start();
unset($_SESSION['apee_userid']);
unset($_SESSION['apee_username']);
unset($_SESSION['apee_user']);

header('location:index.php');
exit();

?>

