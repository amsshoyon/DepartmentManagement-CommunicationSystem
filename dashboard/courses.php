<?php

include ('server.php');
$course_code = "";
$course_title = "";
$marks = "";
$credits = "";
$contact_hour_week = "";
$contact_periods_week = "";
$redirect_self ="";
$msg = '';
$form_id = 'course_data';

$deletemsg = "";

$id = 0;
$edit_state = false;


$year_semester ="";
$block_title = "Part-I (Odd Semester)";
$year = 'Part-I';
$semester = 'Odd';

$year_show = 'Select';
$semester_show = 'Select';

$year_value = '';
$semester_value = '';

$select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
$select_info = mysqli_query($db, $select_row);



if(isset($_POST['select_course'])){

    $year_semester =$_POST['year_semester'];

    if ($year_semester =="part_one_odd") {
        $year = 'Part-I';
        $semester = 'Odd';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);


        $block_title = "Part-I (Odd Semester)";
   
    }else if($year_semester =="part_one_even") {
        $year = 'Part-I';
        $semester = 'Even';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-I (Even Semester)";

    }else if($year_semester =="part_two_odd") {
        $year = 'Part-II';
        $semester = 'Odd';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-II (Odd Semester)";

    }else if($year_semester =="part_two_even") {
        $year = 'Part-II';
        $semester = 'Even';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-II (Even Semester)";

    }else if($year_semester =="part_three_odd") {
        $year = 'Part-III';
        $semester = 'Odd';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-III (Odd Semester)";

    }else if($year_semester =="part_three_even") {
        $year = 'Part-III';
        $semester = 'Even';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-III (Even Semester)";

    }else if($year_semester =="part_four_odd") {
        $year = 'Part-IV';
        $semester = 'Odd';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-IV (Odd Semester)";

    }else if($year_semester =="part_four_even") {
        $year = 'Part-IV';
        $semester = 'Even';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-IV (Even Semester)";

    }else if($year_semester =="masters") {
        $year = 'Part-I';
        $semester = 'Even';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-I (Even Semester)";

    }else {
        $year = 'Part-I';
        $semester = 'Odd';

        $select_row = "SELECT * FROM courses WHERE year='$year' and semester='$semester'  ";
        $select_info = mysqli_query($db, $select_row);

        $block_title = "Part-I (Odd Semester)";
   
    }


}



if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $redirect_self ="courses.php";
    $form_id = 'update_data';
    $edit_state = true;

    
    $rec = mysqli_query($db, "SELECT * FROM courses WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $course_code = $record['course_code'];
    $course_title = $record['course_title'];
    $marks = $record['marks'];
    $credits = $record['credits'];
    $contact_hour_week = $record['contact_hour_week'];
    $contact_periods_week = $record['contact_periods_week'];
    $id = $record['id'];

    $year_show= $record['year'];
    $semester_show= $record['semester'];

    $year_value= $record['year'];
    $semester_value= $record['semester'];

    $select_row = "SELECT * FROM courses WHERE year='$year_show' and semester='$semester_show'  ";
    $select_info = mysqli_query($db, $select_row);

    $block_title = "$year_value ($semester_value Semester)";
}


if (isset($_POST['update'])) {
    
    $course_code =$_POST['course_code'];
    $course_title =$_POST['course_title'];
    $marks =$_POST['marks'];
    $credits =$_POST['credits'];
    $contact_hour_week =$_POST['contact_hour_week'];
    $contact_periods_week =$_POST['contact_periods_week'];
    $year =$_POST['year'];
    $semester =$_POST['semester'];

    $id =$_POST['id'];
    
    mysqli_query($db, "UPDATE courses SET course_code='$course_code', course_title='$course_title', marks='$marks', credits='$credits', contact_hour_week='$contact_hour_week', contact_periods_week='$contact_periods_week', year='$year', semester='$semester' WHERE id=$id");

    $rec = mysqli_query($db, "SELECT * FROM courses WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $course_code = $record['course_code'];
    $course_title = $record['course_title'];
    $marks = $record['marks'];
    $credits = $record['credits'];
    $contact_hour_week = $record['contact_hour_week'];
    $contact_periods_week = $record['contact_periods_week'];
    $id = $record['id'];

    $year_show= $record['year'];
    $semester_show= $record['semester'];

    $year_value= $record['year'];
    $semester_value= $record['semester'];

    $select_row = "SELECT * FROM courses WHERE year='$year_show' and semester='$semester_show'  ";
    $select_info = mysqli_query($db, $select_row);

    $block_title = "$year_value ($semester_value Semester)";
    $msg ="Updated..";
}


//delete data
if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM courses WHERE id=$id");
    header('location: courses.php');
    $deletemsg = "Deleted..";
}

    
        



?>

<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/courses.css">

	


</head>
<body>

<section class="col-md-12 text-center">
    <h3 style="padding: 10px;">Courses</h3>
    <hr>
</section>

<style type="text/css">
    .seperator{
        width: 100%;
        height: 5px;
        border-top: 1px solid #333333;
        border-bottom: : 1px solid red;
    }
    .course_form{
        background-color: #B43757;
        padding: 10px;
        box-shadow: 0 3px 5px 0px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 20px;
        color: #333333;
    }
    .courses{
        background-color: #EBEDEF;
        padding: 10px;
        box-shadow: 0 3px 5px 0px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>

<section class="col-md-6" style="margin-top: 20px;">
    
    <div class="courses col-md-12">
        <span class="col-md-6" style="font-size: 30px;font-weight: 500;"><?php echo $block_title;?></span>
        <form  class="col-md-6 pull-right" id="" method="post" action="courses.php">
            <div class="col-md-8" style="">
                <div class="form-group">
                    <select id="" name="year_semester" class="form-control" required>
                        <option value="" selected hidden>Select</option>
                        <option value="part_one_odd">Part - I (odd)</option>
                        <option value="part_one_even">Part - I (Even)</option>
                        <option value="part_two_odd">Part - II (odd)</option>
                        <option value="part_two_even">Part - II (Even)</option>
                        <option value="part_three_odd">Part - III (odd)</option>
                        <option value="part_three_even">Part - III (Even)</option>
                        <option value="part_four_odd">Part - IV (odd)</option>
                        <option value="part_four_even">Part - IV (Even)</option>
                        <option value="masters">Masters</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="select_course" class="col-md-4 btn btn-info pull-right">Select Courses</button>
        </form>

        <div class="clearfix"></div>
        <div class="seperator"></div>
    	<table class="table">
            <thead>
                <tr>
                    <th>Course Codes</th>
                    <th>Course Titles</th>
                    <th>Marks</th>
                    <th>Credits</th>
                    <th>Contact hours/week</th>
                    <th>Contact Period/week</th>
                    <th>Update</th>
                </tr>
            </thead>
            <?php while($row = mysqli_fetch_array($select_info)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                        <td><a href="courses.php?edit=<?php echo $row['id']; ?>" class="btn btn-danger">Edit</a></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</section>

<section class="col-md-6"  style="margin-top: 20px;">
    <div class="course_form col-md-12">
        <span style="font-size: 30px;font-weight: 500;">Add / Edit a Course
        <?php 
            if ($edit_state == true){
                echo '<a href="courses.php" class="btn btn-info pull-right">Add Course</a>';
            }

        ?>
        </span>

        <div class="seperator"></div>
        <form  class="" id="<?php echo $form_id;?>" method="post" action="<?php echo $redirect_self;?>">
            <!-- Form start -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="course_code">Course Code</label>
                        <input id="course_code" name="course_code" type="text" value="<?php echo $course_code;?>" placeholder="course_code" class="form-control input-md" required>
                    </div>
                </div>
                <!-- Text input-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="course_title">Course Title</label>
                        <input id="course_title" name="course_title" type="text" value="<?php echo $course_title;?>" placeholder="Course Title" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="marks">Mark</label>
                        <input id="marks" name="marks" type="text" value="<?php echo $marks;?>" placeholder="Mark" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="credits">Credit</label>
                        <input id="credits" name="credits" type="text" value="<?php echo $credits;?>" placeholder="Credits" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="contact_hour_week">Contact hour/week</label>
                        <input id="contact_hour_week" name="contact_hour_week" type="text" value="<?php echo $contact_hour_week;?>" placeholder="Contact hour/week" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="contact_periods_week">Contact period/week</label>
                        <input id="contact_periods_week" name="contact_periods_week" type="text" value="<?php echo $contact_periods_week;?>" placeholder="Contact periods/week" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="year">Course Year</label>
                        <select id="year" name="year" class="form-control" required>
                            <option selected hidden value="<?php echo $year_value;?>"><?php echo $year_show;?></option>
                            <option value="Part-I">Part - I</option>
                            <option value="Part-II">Part - II</option>
                            <option value="Part-III">Part - III</option>
                            <option value="Part-IV">Part - IV</option>
                            <option value="Masters">Masters</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="semester">Course Semester</label>
                        <select id="semester" name="semester" class="form-control" required>
                            <option hidden value="<?php echo $semester_value;?>"><?php echo $semester_show;?></option>
                            <option value="Odd">Odd</option>
                            <option value="Even">Even</option>
                        </select>
                    </div>
                </div>
                
                <!-- Button -->
                <div class="col-md-12">
                    <div class="form-group">
                        <?php if ($edit_state == false): ?>
                            <span id="course_msg" style="color: white;"><?php echo $msg;?><?php echo $deletemsg;?></span><button type="submit" class="btn btn-info pull-right"  onclick="return validate()">Add Course</button>
                        <?php else: ?>
                            <div class="pull-right">
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <input type="reset" value="Reset" class="btn btn-primary">
                                <a type="button" class="btn btn-danger" href="courses.php?del=<?php echo $id; ?>" onclick="return deletefn()"> Delete</a>
                            </div>
                            
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">


function validate() {

    
    var course_code=document.forms["course_data"]["course_code"].value;
    if (course_code==null || course_code=="")
     {
      document.getElementById("course_msg").innerHTML = "Please Enter Course Code...";
      return false;
     }

    var elem = document.getElementById("result");
    elem.innerHTML = "Registration is Processing";
    elem.style.color = "#168781";

    return( true );

             
}
    
</script>   

<script src="assets/js/jquery.min.js"></script>

<script>
    $('#course_data').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "add_course.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#course_msg').html(data);
                setTimeout(function(){// wait for 2 secs(2)
                     location.reload(); // then reload the page.(3)
                }, 1000);
            }                   
        }).done(function() {
                $("#course_data").trigger("reset");

            });
    });
</script>

<script>
    function deletefn(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){

        alert ("record deleted")
    }
    return del;
    }
</script>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

