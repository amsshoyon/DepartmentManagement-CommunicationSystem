<?php
include('server.php');
include('redirect.php');

$msg ='';
$update_msg = ""; 
$color ='';
$error = '';
$result = '';
$empty_result = '';
$dividend = 0;
$divisor  = 0;
$average  = '';

$form = 'hidden';
$course_ttile = '';

$get_courses = mysqli_query($db, "SELECT * FROM courses");


$year='Part-I';
$semester='Odd';

if(isset($_POST['view'])){
  $form = 'visible';

  $roll_no = $_SESSION["apee_userid"];
  $year=$_POST['year'];
  $semester=$_POST['semester'];

  $courses= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");

  if (mysqli_num_rows($courses) > 0) {

      while($select_course = mysqli_fetch_array($courses)){ 

        $course_id= $select_course['course_id']; 
        $course_id = strtolower($course_id);
        $course_table = 'course_'.$course_id; 

        $roll_search = "SELECT * FROM $course_table WHERE roll_no='$roll_no'";
        $roll_exist = mysqli_query($db, $roll_search);

        if (mysqli_num_rows($roll_exist) > 0) {

            $marks_search = "SELECT * FROM $course_table WHERE roll_no='$roll_no'";
            $marks_a = mysqli_query($db, $marks_search);
            $row = mysqli_fetch_assoc($marks_a);

            $section_a_marks = $row['section_a_marks'];
            $section_b_marks = $row['section_b_marks'];

            if ($section_a_marks != "" && $section_b_marks != "") {
              $empty_result = "ok";
              
            }else {
              $empty_result = 'empty';
              break;
            }

        }else{
            $error = 'yes';
            break;
        }

    }

  }else {
    $result = 'Course Not Found For this Semester..';
  }




}


?>

<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php include('menu.php'); ?>

<?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 110px;">

  <div class="col-md-12" >

      <div class="col-md-12">
          <form method="POST" action="results_s.php">
              <div class="col-md-2" style="">
                  <div class="form-group">
                      <select id="" name="year" class="form-control" required>
                          <option value="" selected hidden>Select Year</option>
                          <option value="Part-I">Part - I</option>
                          <option value="Part-II">Part - II</option>
                          <option value="Part-III">Part - III</option>
                          <option value="Part-IV">Part - IV</option>
                      </select>
                  </div>
              </div>  

              <div class="col-md-2">
                  <div class="form-group">
                      <select id="semester" name="semester" class="form-control" required>
                          <option selected hidden value="">Select Semester</option>
                          <option value="Odd">Odd</option>
                          <option value="Even">Even</option>
                      </select>
                  </div>
              </div>

              <div class="">
                 <button type="submit" name="view" class="btn btn-primary">View Results</button>
              </div>  
          </form>
      </div>
      <div class="clearfix"></div>
      <div style="width: 100%; height: 5px; border-top: 1px solid #333333; border-bottom: 1px solid red;"></div>

  </div>

 
  <div class="col-md-12 <?php echo $form ;?>">
      <div class="center text-center">
          <h4><?php echo $year?>  <?php echo $semester?> Semester</h4>
      </div>
      
      <br>

<?php 

  if ($error == 'yes') {

    $result = 'You are not registered for this semester....';

  }else if ($empty_result == 'ok'){

?>

      

      <div class="table-responsive">
          <table id="mytable" class="table table-hover table-bordered">
                             
              <thead>

                  <?php 
                    $pick_courses= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");
                    while($pick_course = mysqli_fetch_array($pick_courses)){ 
                  ?>
                      <th><?php echo $pick_course['course_id']; ?></th>


                  <?php } ?>
                  <th>Average</th>

              </thead>




              <tbody>


                      <tr>

                          <?php 
                            $pick_results= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");
                            while($pick_marks = mysqli_fetch_array($pick_results)){ 
                          ?>
                              <td>
                                  <?php 
                                      $course_id = $pick_marks['course_id'];
                                      $course_id = strtolower($course_id);
                                      $max_marks = $pick_marks['marks'];
                                      $credits  = $pick_marks['credits'];
                                      $course_table = 'course_'.$course_id;

                                      $find_results = mysqli_query($db, "SELECT * FROM $course_table WHERE roll_no = '$roll_no'");

                                      $get_marks = mysqli_fetch_array($find_results);
                                      $section_a_marks = $get_marks['section_a_marks'];
                                      $section_b_marks = $get_marks['section_b_marks'];

                                      $mark_obtain = $section_a_marks + $section_b_marks;


                                      if ($section_a_marks != "" && $section_b_marks != "") {
                                         
                                          $a_plus = (80 * $max_marks) / 100;
                                          $a = (75 * $max_marks) / 100;
                                          $a_minus = (70 * $max_marks) / 100;
                                          $b_plus = (65 * $max_marks) / 100;
                                          $b = (60 * $max_marks) / 100;
                                          $b_minus = (55 * $max_marks) / 100;
                                          $c_plus = (50 * $max_marks) / 100;
                                          $c = (45 * $max_marks) / 100;
                                          $d = (40 * $max_marks) / 100;

                                          if ($mark_obtain >= $a_plus) {
                                              $gp = 4.00;
                                              $lg = 'A+';
                                          }else if ($mark_obtain >= $a && $mark_obtain < $a_plus) {
                                              $gp = 3.75;
                                              $lg = 'A';
                                          }else if ($mark_obtain >= $a_minus && $mark_obtain < $a) {
                                              $gp = 3.50;
                                              $lg = 'A-';
                                          }else if ($mark_obtain >= $b_plus && $mark_obtain < $a_minus) {
                                              $gp = 3.25;
                                              $lg = 'B+';
                                          }else if ($mark_obtain >= $b && $mark_obtain < $b_plus) {
                                              $gp = 3.00;
                                              $lg = 'B';
                                          }else if ($mark_obtain >= $b_minus && $mark_obtain < $b) {
                                              $gp = 2.75;
                                              $lg = 'B-';
                                          }else if ($mark_obtain >= $c_plus && $mark_obtain < $b_minus) {
                                              $gp = 2.50;
                                              $lg = 'C+';
                                          }else if ($mark_obtain >= $c && $mark_obtain < $c_plus) {
                                              $gp = 2.25;
                                              $lg = 'C';
                                          }else if ($mark_obtain >= $d && $mark_obtain < $c) {
                                              $gp = 2.00;
                                              $lg = 'D';
                                          }else if ($mark_obtain < $d) {
                                              $gp = 0.00;
                                              $lg = 'F';
                                          }else{
                                              $gp = 0.00;
                                              $lg = 'F';
                                          }

                                          if ($gp >= 3) {
                                              $color = 'green';
                                          }else if($gp < 3  && $gp > 0){
                                              $color = 'blue';
                                          }else if($gp == 0){
                                              $color = 'red';
                                          }else {
                                              $color = 'red';
                                          }

                                          $dividend_i = $gp * $credits;
                                          $dividend = $dividend + $dividend_i;

                                          $divisor = $divisor + $credits;

                                          echo '<span style="color:'.$color.'"> '.$gp.' ('.$lg.')</span>';


                                      }else if ($section_a_marks == "" && $section_b_marks != ""){
                                          echo 'Section A not Uploaded';
                                      }else if ($section_a_marks != "" && $section_b_marks == ""){
                                          echo 'Section B not Uploaded';
                                      }else if ($section_a_marks == "" && $section_b_marks == ""){
                                          echo "Result not Published";
                                      }else {
                                          echo "Result not Published";
                                      } 

                                      
                                  ?>

                              </td>
                              <?php } ?>

                              <td>
                                <?php 
                                    $average = $dividend / $divisor;
                                    echo $average;
                                ?>
                                  
                              </td>

                      </tr>

              </tbody>
                  
          </table>


      </div>


<?php 

  } else if ($empty_result == 'empty'){
      $result = 'Result Not Published..';
  }

?>

<div class="center text-center">
    <h4 style="color: red; margin-top: 100px; font-size: 35px;font-weight: 700;"><?php echo $result; ?></h4>
</div>


  </div>

</section>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php include('footer.php'); ?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/notification.js"></script>



<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>

