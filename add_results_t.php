<?php
include('server.php');
include('redirect.php');

$update_msg = ""; 

$form = 'hidden';
$course_ttile = '';
$current_year = (new DateTime)->format("Y");

$get_courses = mysqli_query($db, "SELECT * FROM courses");


$year='Part_I';
$semester='Odd';

if(isset($_POST['insert'])){
  $form = 'visible';

  $exam_year=$_POST['exam_year'];
  $course_id=$_POST['course_id'];
  $section=$_POST['section'];

  if ($section =='section_a') {
    $section_show = 'Section A';
  }else if ($section =='section_b') {
    $section_show = 'Section B';
  }

  $course_id = preg_replace('/\s+/', '', $course_id);
  $course_id = strtolower($course_id);
  $course_table = 'course_'.$course_id;
  $student_data_regular= mysqli_query($db, "SELECT * FROM $course_table WHERE regularity='regular' AND exam_year='$exam_year' ");
  $student_data_improve= mysqli_query($db, "SELECT * FROM $course_table WHERE regularity='improve' AND exam_year='$exam_year' ");

  $course_data= mysqli_query($db, "SELECT * FROM courses WHERE course_id='$course_id' ");
  $course_info = mysqli_fetch_array($course_data);
  $course_title= $course_info['course_title'];

  $i ="0";

}


?>

<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">

    


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 110px;margin-bottom: 500px;">

    <div class="col-md-12">
        <form method="POST" action="add_results_t.php">

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
                    <select id="" name="year_semester" class="form-control" onchange="fetch_select(this.value);" required>
                        <option value="" selected hidden>Select Semester</option>
                        <option value="part_one_odd">Part - I (odd)</option>
                        <option value="part_one_even">Part - I (Even)</option>
                        <option value="part_two_odd">Part - II (odd)</option>
                        <option value="part_two_even">Part - II (Even)</option>
                        <option value="part_three_odd">Part - III (odd)</option>
                        <option value="part_three_even">Part - III (Even)</option>
                        <option value="part_four_odd">Part - IV (odd)</option>
                        <option value="part_four_even">Part - IV (Even)</option>
                    </select>
                </div>
            </div>  

            <div class="col-md-2">
                <div class="form-group">
                    <select id="course_id" name="course_id" class="form-control" required>
                        <option selected hidden value="">Select Course</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <select id="section" name="section" class="form-control" required>
                        <option selected hidden value="">Select Section</option>
                        <option value="section_a">Section A</option>
                        <option value="section_b">Section B</option>
                    </select>
                </div>
            </div>

            <div class="">
               <button type="submit" name="insert" class="btn btn-primary">Insert Results</button>
            </div>  
        </form>
    </div>


<script type="text/javascript">

function fetch_select(val)

  {
  $.ajax({
    type: 'post',
    url: 'fetch_courses.php',
    data: {
      get_option:val
    },
      success: function (response) {
      document.getElementById("course_id").innerHTML=response; 
    }
  });

}

</script>



    <div class="clearfix"></div>
    <div style="width: 100%; height: 5px; border-top: 1px solid #333333; border-bottom: 1px solid red;"></div>



    <div class="col-md-12 <?php echo $form;?>" style="margin-top: 20px;">

      <form method = "post" id="add_result_sql">

        <input name="course" type="hidden" value="<?php echo  $course_id; ?>">
        <input name="number" type="hidden" value="<?php echo  $student_amount; ?>">
        <input name="section" type="hidden" value="<?php echo  $section; ?>">

        <div class="col-md-12 text-center">
          <h3><?php echo $course_title;?> - <?php echo $section_show ;?></h3>
        </div>
        <br>
        <table class="table table-hover table-bordered results">
          
          <thead>
            <tr>
              <th>Roll_no</th>
              <th class="">Marks Obtained</th>
          </thead>
          <tbody>




            <?php while($regular_students = mysqli_fetch_array($student_data_regular)){ ?>

            <tr>
              <th scope="row">
                <?php echo  $regular_students['roll_no']; ?>
                <small style="color: blue">( Regular )</small>
              </th>
              <td>
                <div class="form-group">
                  <input name="roll_no[]" type="hidden" value="<?php echo  $regular_students['roll_no']; ?>">

                  <?php
                    $roll_for_marks = $regular_students['roll_no'];
                    $get_marks= mysqli_query($db, "SELECT * FROM $course_table WHERE roll_no='$roll_for_marks' ");
                    $fetch_marks = mysqli_fetch_array($get_marks);

                    $section_marks = $section.'_marks';
                  ?>

                  <input id="marks" name="marks[]" type="text" class="form-control input-md" value="<?php echo $fetch_marks[$section_marks]; ?>">
                </div>
              </td>
            </tr>
            <?php } ?>

            <?php while($improve_students = mysqli_fetch_array($student_data_improve)){ ?>

            <tr>
              <th scope="row">
                <?php echo  $improve_students['roll_no']; ?>
                <small style="color: blue">( Improve )</small>
              </th>
              <td>
                <div class="form-group">
                  <input name="roll_no[]" type="hidden" value="<?php echo  $regular_students['roll_no']; ?>">
                  <input id="marks" name="marks[]" type="text" class="form-control input-md">
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          
        </table>

        </table>



        <input type="submit" name="add_marks" class="col-md-12 btn btn-primary pull-right" value="Submit">
        <span style="color: red;" id="msg"></span>
      </form>

    </div>

</section>

<script src="js/jquery.min.js"></script>

<script>
    $('#add_result_sql').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "insert_marks.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#msg').html(data);
            }                   
        })
    });
</script>

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

