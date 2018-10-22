<?php
include('server.php');

$current_year = (new DateTime)->format("Y");

$regular= "visible";
$improve = 'hidden';
$regularity = 'regular';

if(isset($_POST['regular'])){

  $regular = 'visible';
  $improve = 'hidden';
  $regularity = 'regular';

}else if(isset($_POST['improve'])){

  $improve = 'visible';
  $regular= "hidden";
  $regularity = 'improve';

}

?>

<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
<body>

<section style="width: 50%; margin: 20px auto; ">
  <form method="POST" action="exam_reg.php">
    <div class="col-md-6">
      <button type="submit" name="regular" class="btn btn-primary btn-lg" style="width: 100%">Regular</button>
    </div>
    <div class="col-md-6">
      <button type="submit" name="improve" class="btn btn-primary btn-lg" style="width: 100%">Improvement</button>
    </div>
  </form>
</section>

<section class="col-md-12 <?php echo $improve;?>" style="margin-top: 10px;">
  <form class="" id="exam_reg_form_improve" method="post" style="width: 65%;margin :0 auto;">
      <div class="">
        <h3 class="dark-grey">Registration For Improvement<span id='result' style="padding-left:15px;text-align:center;color:red;"></span></h3>
        <br>
        <span id="msg"></span>
        <hr>
        <br>
        
        <input name="regularity" type="hidden" value="<?php echo  $regularity; ?>">

        <div class="form-group col-lg-6">
          <label>Roll No.</label>
          <input type="" name="roll_no" class="form-control" id="" value="" required>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Select Course</label>
                <select id="dataPicker" name="course_id" class="selectpicker form-control"  data-show-subtext="true" data-live-search="true" required>
                    <option selected hidden value="">Select Course</option>
                    <?php $get_courses = mysqli_query($db, "SELECT * FROM courses");?>
                    <?php while($select_course = mysqli_fetch_array($get_courses)){ ?>
                      <option value="<?php echo $select_course['course_id']; ?>"><?php echo $select_course['course_id']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group col-lg-4">
          <label>Exam Year</label>
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

        <div class="col-md-4">
            <div class="form-group">
                <label>Select Part</label>
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

        <div class="col-md-4">
            <div class="form-group">
                <label>Select Semester</label>
                <select id="semester" name="semester" class="form-control" required>
                    <option selected hidden value="">Select Semester</option>
                    <option value="Odd">Odd</option>
                    <option value="Even">Even</option>
                </select>
            </div>
        </div>
        
        <div class="form-group col-lg-12">
          <button type="submit" name="register" class="btn btn-primary" style="width: 100%;">Register</button>
        </div>        
    </div>
  </form>


</section>



<section class="col-md-12 <?php echo $regular;?>" style="margin-top: 10px;">
  <form class="" id="exam_reg_form_regular" method="post" style="width: 65%;margin :0 auto;">
      <div class="">
        <h3 class="dark-grey">Registration For Examination<span id='result' style="padding-left:15px;text-align:center;color:red;"></span></h3>
        <br>
        <span id="msg_r"></span>
        <hr>
        <br>
        
        <input name="regularity" type="hidden" value="<?php echo  $regularity; ?>">

        <div class="form-group col-lg-12">
          <label>Roll No.</label>
          <input type="" name="roll_no" class="form-control" id="" value="" required>
        </div>

        <div class="form-group col-lg-4">
          <label>Exam Year</label>
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

        <div class="col-md-4">
            <div class="form-group">
                <label>Select Part</label>
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

        <div class="col-md-4">
            <div class="form-group">
                <label>Select Semester</label>
                <select id="semester" name="semester" class="form-control" required>
                    <option selected hidden value="">Select Semester</option>
                    <option value="Odd">Odd</option>
                    <option value="Even">Even</option>
                </select>
            </div>
        </div>
        
        <div class="form-group col-lg-12">
          <button type="submit" name="register" class="btn btn-primary" style="width: 100%;">Register</button>
        </div>        
    </div>
  </form>



<script src="assets/js/jquery.min.js"></script>

<script>
    $('#exam_reg_form_regular').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "exam_reg_back.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#msg_r').html(data);
            }                   
        }).done(function() {
                $("#exam_reg_form_regular").trigger("reset");
            });
    });

    $('#exam_reg_form_improve').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "exam_reg_back.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#msg').html(data);
            }                   
        }).done(function() {
                $("#exam_reg_form_improve").trigger("reset");
                $("#dataPicker").selectpicker("refresh");
            });
    });
</script>

</section>




<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>

</body>
</html>

