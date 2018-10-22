<?php

include ('server.php');
include ('session.php');

$member_type =$_SESSION["apee_user"];
$userid = $_SESSION["apee_userid"];

if ($member_type =='student') {

    $edit_data = mysqli_query($db, "SELECT * FROM students WHERE roll_no = $userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $user_name =$edit_value['name'];

}else if ($member_type =='teacher') {


    $edit_data = mysqli_query($db, "SELECT * FROM teachers WHERE userid = $userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $user_name =$edit_value['name'];

}

if (isset($_POST['status_upload'])) {

  $status = $_POST['status'];
  $base_name = basename($_FILES['image']['name']);

  if (!empty($base_name)) {

      date_default_timezone_set('Asia/Dhaka');
      $date = date("Y/m/d");
      $time = date('h:i:s A');;
      $userid = $_SESSION["apee_userid"];

      $tmp_name = $_FILES['image']['tmp_name'];
      $new_name = time().".jpg";
      move_uploaded_file($tmp_name, "images/status/".$new_name);

      $insert = "INSERT INTO status (status, photo, userid, user, user_type, time, date) VALUES ('$status','$new_name','$userid', '$user_name','$member_type', '$time', '$date')";

      if ($db->query($insert) === TRUE) {
        $msg = 'Status Updated..';

        header('location: home.php');
      } else {
         header('location: error.php');
      }


  }else if (empty($base_name)){

      date_default_timezone_set('Asia/Dhaka');
      $date = date("Y/m/d");
      $time = date('h:i:s A');;
      $userid = $_SESSION["apee_userid"];

      $insert = "INSERT INTO status (status, userid, user, user_type, time, date) VALUES ('$status','$userid', '$user_name','$member_type', '$time', '$date')";

      if ($db->query($insert) === TRUE) {
        $msg = 'Status Updated..';

        header('location: home.php');
      } else {
         header('location: error.php');
      }

  }else {
    header('location: home.php');
  }



    

}



?>