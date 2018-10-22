<?php

include('server.php'); 



$title =$_POST['title'];
$details =$_POST['details'];
$time =$_POST['time'];
$date =$_POST['date'];
$location =$_POST['location'];

$tmp_name = $_FILES['image']['tmp_name'];
$new_name = time().".jpg";


if (move_uploaded_file($tmp_name,"../images/activities/".$new_name)) {

    $query = "INSERT INTO activities (image ,title, details, time, date, location) VALUES ('$new_name','$title', '$title', '$time', '$date', '$location')";

    if ($db->query($query) === TRUE) {

        header("location: activities.php");

    } else {
        echo "Error Adding Course.. Try Again.." . $db->error;
    }

} else {
    echo "Something went wrong.. Try again.";
}


   
?>