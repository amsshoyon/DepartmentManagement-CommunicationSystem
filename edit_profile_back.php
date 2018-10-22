<?php	
include('server.php');
include('session.php');


//im=nitializing variable
$name = "";
$rank = "";
$fathers_name = "";
$mothers_name = "";
$email = "";
$phone = "";
$gender = "";
$blood_group = "";
$birth_date = "";
$hall = "";
$nationality = "";
$religion = "";
$present_address = "";
$permanent_address = "";

$member_type ="";
$userid = "";
$id = 0;


$member_type =$_SESSION["apee_user"];


if ($member_type =='student') {

	$name =$_POST['name'];
	$fathers_name =$_POST['fathers_name'];
	$mothers_name =$_POST['mothers_name'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];
	$gender =$_POST['gender'];
	$blood_group =$_POST['blood_group'];
	$birth_date =$_POST['birth_date'];
	$hall =$_POST['hall'];
	$nationality =$_POST['nationality'];
	$religion =$_POST['religion'];
	$present_address =$_POST['present_address'];
	$permanent_address =$_POST['permanent_address'];

	$userid = $_SESSION["apee_userid"];


	$user_update = mysqli_query($db, "UPDATE students SET name='$name' ,fathers_name='$fathers_name' ,mothers_name='$mothers_name' ,email='$email' ,phone='$phone' ,gender='$gender' ,blood_group='$blood_group' ,birth_date='$birth_date' ,hall='$hall' ,nationality='$nationality' ,religion='$religion' ,present_address='$present_address' ,permanent_address='$permanent_address' WHERE userid=$userid");


	if(mysqli_affected_rows($db) > 0 ){

		echo "<span style='color:green;'><small> Profile Information Updated.. <small></span>";

	}else{

		echo "<span style='color:red;'><small>Already Updated.. <small></span>";

	} 
	$db->close();


}else if ($member_type =='teacher') {

	$name =$_POST['name'];
	$rank =$_POST['rank'];
	$fathers_name =$_POST['fathers_name'];
	$mothers_name =$_POST['mothers_name'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];
	$gender =$_POST['gender'];
	$blood_group =$_POST['blood_group'];
	$birth_date =$_POST['birth_date'];
	$nationality =$_POST['nationality'];
	$religion =$_POST['religion'];
	$present_address =$_POST['present_address'];
	$permanent_address =$_POST['permanent_address'];

	$userid = $_SESSION["apee_userid"];


	$user_update = mysqli_query($db, "UPDATE teachers SET name='$name' ,rank='$rank' ,fathers_name='$fathers_name' ,mothers_name='$mothers_name' ,email='$email' ,phone='$phone' ,gender='$gender' ,blood_group='$blood_group' ,birth_date='$birth_date' ,nationality='$nationality' ,religion='$religion' ,present_address='$present_address' ,permanent_address='$permanent_address' WHERE userid=$userid");


	if(mysqli_affected_rows($db) > 0 ){

		echo "<span style='color:green;'><small> Profile Information Updated.. <small></span>";

	}else{

		echo "<span style='color:red;'><small>Already Updated.. <small></span>";

	} 
	$db->close();

}else {
	echo "<span style='color:red;'><small>Update Failed.. Try Again.. <small></span>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

