
<?php
session_start();
unset($_SESSION['sess_apeeadmin']);

header('location: ../admin_login/admin_login.php');
exit();

?>

