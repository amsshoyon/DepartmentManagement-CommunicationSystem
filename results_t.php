<?php
include('server.php');


$update_msg = ""; 
$color ='';
$dividend = 0;
$divisor  = 0;
$average  = '';
$current_year = (new DateTime)->format("Y");

$form = 'hidden';
$course_ttile = '';

$get_courses = mysqli_query($db, "SELECT * FROM courses");


$year='Part-I';
$semester='Odd';

if(isset($_POST['view'])){
  $form = 'visible';

  $exam_year=$_POST['exam_year'];
  $year=$_POST['year'];
  $semester=$_POST['semester'];

  $students= mysqli_query($db, "SELECT * FROM exam_registration WHERE year='$year' AND semester='$semester' AND exam_year='$exam_year'");

  $course_data= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");


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

<section class="col-md-8" style="margin-top: 120px;">

  <div class="col-md-12" >

      <div class="col-md-12">
          <form method="POST" action="results_t.php">
              <div class="form-group col-lg-2">
                <select id="" name="exam_year" class="form-control" required>
                    <option value="" selected hidden>Select Year</option>
                    <?php
                        $i = 0;
                        for ($i=0; $i < 6; $i++) {
                            $current_year_option = $current_year - $i; 
                            echo '<option value="'.$current_year_option.'">'.$current_year_option.'</option>';
                        }

                    ?>
                </select>
              </div>

              <div class="col-md-2" style="">
                  <div class="form-group">
                      <select id="" name="year" class="form-control" required>
                          <option value="" selected hidden>Select Year</option>
                          <option value="Part-I">Part - I</option>
                          <option value="Part-II">Part - II</option>
                          <option value="Part-III">Part - III</option>
                          <option value="Part-IV">Part - IV</option>
                          <option value="Masters">Masters</option>
                      </select>
                  </div>
              </div>  

              <div class="col-md-2">
                  <div class="form-group">
                      <select id="semester" name="semester" class="form-control">
                          <option selected hidden value="">Select Semester</option>
                          <option value="Odd">Odd</option>
                          <option value="Even">Even</option>
                      </select>
                  </div>
              </div>

              <div class="">
                 <button type="submit" name="view" class="btn btn-primary">View Results</button>
                 <a href="add_results_t.php" class="btn btn-primary pull-right">Add Result</a>
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

      
      <div class="table-responsive">
          <table id="mytable" class="table table-hover table-bordered">
                             
              <thead>
                  <th>Roll No</th>

                  <?php while($select_course = mysqli_fetch_array($course_data)){ ?>
                      <th><?php echo $select_course['course_id']; ?></th>
                  <?php } ?>

                  <th>Average</th>

              </thead>




              <tbody>

                  <?php 
                      $members = array();
                      while ($member =   mysqli_fetch_array($students))
                      {
                          $members[] = $member;
                      }
                      foreach ($members as $member)
                      { 
                        $average = 0;
                        $dividend = 0;
                        $divisor = 0;
                  ?>


                      <tr>
                          <td><?php echo $member['roll_no']; ?></td>

                          <?php $find_courses = mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'"); ?>

                          <?php while($select_results = mysqli_fetch_array($find_courses)){ ?>
                              <td>

                                  <?php 
                                      $course = $select_results['course_id'];
                                      $max_marks = $select_results['marks'];
                                      $credits  = $select_results['credits'];
                                      $course_table = 'course_'.$course; 
                                      $roll = $member['roll_no'];

                                      $find_results = mysqli_query($db, "SELECT * FROM $course_table WHERE roll_no = '$roll'");

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

                                          $dividend_i = $gp * $credits;
                                          $dividend = $dividend + $dividend_i;

                                          $divisor = $divisor + $credits;

                                          $average = $dividend / $divisor;

                                          if ($gp >= 3) {
                                              $color = 'black';
                                          }else if($gp < 3  && $gp > 0){
                                              $color = 'blue';
                                          }else if($gp == 0){
                                              $color = 'red';
                                          }else {
                                              $color = 'red';
                                          }

                                          echo '<span style="color:'.$color.'"> '.$gp.' <br> ('.$lg.')</span>';


                                      }else if ($section_a_marks == "" && $section_b_marks != ""){
                                          echo 'Section A not Uploaded';
                                          $average = 'Result not Published';
                                      }else if ($section_a_marks != "" && $section_b_marks == ""){
                                          echo 'Section B not Uploaded';
                                          $average = 'Result not Published';
                                      }else if ($section_a_marks == "" && $section_b_marks == ""){
                                          echo "Result not Published";
                                          $average = 'Result not Published';
                                      }else {
                                          echo "Result not Published";
                                          $average = 'Result not Published';
                                      } 

                                  ?>
                                      
                              </td>
                          <?php } ?>

                              <td>
                                <?php 
                                    echo $average;
                                ?>
                                  
                              </td>




                      </tr>


                  <?php } ?>
              </tbody>
                  
          </table>


      </div>

  </div>

</section>
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

