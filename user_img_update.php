
<?php

  include('server.php');
  include('session.php');

  $member_type =$_SESSION["apee_user"];
  $userid = $_SESSION["apee_userid"];


  if ($member_type =='student') {

    if(isset($_POST['update_img'])){
      //path to store
      $target = "images/user/student/".basename($_FILES['image']['name']);
      
      //get all submitted data from the form
      $image = $_FILES['image']['name'];
      

      $img_update = mysqli_query($db, "UPDATE students SET image='$image' WHERE userid=$userid");
      
      if ($img_update === TRUE) {

        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

            header('location: my_profile.php');

          }else{

            $msg = "Failed to upload ... ";

          }

      } else {
          echo "Error updating record: ";
      }
      
    }



  }else if ($member_type =='teacher') {

    if(isset($_POST['update_img'])){
      //path to store
      $target = "images/user/teacher/".basename($_FILES['image']['name']);
      
      //get all submitted data from the form
      $image = $_FILES['image']['name'];
      

      $img_update = mysqli_query($db, "UPDATE teachers SET image='$image' WHERE userid=$userid");
      
      if ($img_update === TRUE) {

        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

            header('location: my_profile.php');

          }else{

            $msg = "Failed to upload ... ";

          }

      } else {
          echo "Error updating record: ";
      }
      
    }



  }



?>
