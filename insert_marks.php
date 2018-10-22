<?php

  include ('server.php');
  session_start();

  $error = "";
  $msg = "";

  $table =  $_POST['course'];
  $table_name = 'course_'.$table;
  $number = $_POST['number'];
  $section = $_POST['section'];

  $examiner = $_SESSION["apee_userid"];


  $rec = mysqli_query($db, "SELECT * FROM courses WHERE course_id = '$table'");
  $record = mysqli_fetch_array($rec);

  $max_total_marks = $record['marks'];
  $max_marks = $max_total_marks /2;


  $i=0;

  for ($j=0; $j < $number; $j++) { 

    $marks = $_POST['marks'][$j];
    $marks = preg_replace('/\s+/', '', $marks);

    $roll_no = $_POST['roll_no'][$j];



    if ($marks =="") {

      $error = 'empty marks for '.$roll_no;
      echo $error;
      break;

    }else if(!ctype_digit($marks) ) {

          $error = 'Incorrect marks for '.$roll_no;
          echo $error;
          break;

    } else if ($marks > $max_marks){
          $error = 'Invilid marks for '.$roll_no;
          echo $error;
          break;
    }


  }

if ($section =='section_a') {
  
    if ($error=="") {

      foreach($_POST['roll_no'] as $key => $val){

        $roll_no=$val;
        $marks=$_POST['marks'][$key];
        $marks = preg_replace('/\s+/', '', $marks);

        $result_search = "SELECT * FROM $table_name WHERE roll_no='$roll_no'";
        $result_exist = mysqli_query($db, $result_search);

        if (mysqli_num_rows($result_exist) > 0) {

          $examiner_col = $section.'_examiner';
          $section_col = $section.'_marks';

          $insert = "UPDATE $table_name SET $section_col='$marks' , $examiner_col = '$examiner' WHERE roll_no='$roll_no'";

          if ($db->query($insert) === TRUE) {

            $msg = "Updated...";

          } else {
            $msg = "Failed...";
          }

        }else {

          $examiner_col = $section.'_examiner';
          $section_col = $section.'_marks';

          $insert = "INSERT INTO $table_name (roll_no, $section_col , $examiner_col ,regularity, appearance) VALUES ('$roll_no','$marks','$examiner', 'regular', '1')";

          if ($db->query($insert) === TRUE) {
            $msg = "Updated...";
          } else {
              echo "Failed." . $db->error;
              break;
          }

          $i++;

        }

      }

      echo $msg;

    }

}else if ($section =='section_b') {
  
    if ($error=="") {

      foreach($_POST['roll_no'] as $key => $val){

        $roll_no=$val;
        $marks=$_POST['marks'][$key];
        $marks = preg_replace('/\s+/', '', $marks);

        $result_search = "SELECT * FROM $table_name WHERE roll_no='$roll_no'";
        $result_exist = mysqli_query($db, $result_search);

        if (mysqli_num_rows($result_exist) > 0) {

          $examiner_col = $section.'_examiner';
          $section_col = $section.'_marks';

          $insert = "UPDATE $table_name SET $section_col='$marks' , $examiner_col = '$examiner' WHERE roll_no='$roll_no'";

          if ($db->query($insert) === TRUE) {

            $msg = "Updated...";

          } else {
            $msg = "Failed...";
          }

        }else {

          $examiner_col = $section.'_examiner';
          $section_col = $section.'_marks';

          $insert = "INSERT INTO $table_name (roll_no, $section_col , $examiner_col ,regularity, appearance) VALUES ('$roll_no','$marks','$examiner', 'regular', '1')";

          if ($db->query($insert) === TRUE) {
            $msg = "Updated...";
          } else {
              echo "Failed." . $db->error;
              break;
          }

          $i++;

        }

      }

      echo $msg;

    }

}


?>