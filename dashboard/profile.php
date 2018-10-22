<?php

include('server.php');
$member_type ="";



$roll_no = $_GET['id'];
    
$userid_search_s = "SELECT * FROM students WHERE roll_no='$roll_no'";
$userid_exist_s = mysqli_query($db, $userid_search_s);

$userid_search_t = "SELECT * FROM teachers WHERE userid='$roll_no'";
$userid_exist_t = mysqli_query($db, $userid_search_t);

if (mysqli_num_rows($userid_exist_s) > 0) {

    $student_sql = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$roll_no'");
    $student_info = mysqli_fetch_array($student_sql);

    $member_type ="student";

    $name =$student_info['name'];
    $reg_id =$student_info['reg_id'];
    $roll_no =$student_info['roll_no'];
    $year =$student_info['year'];
    $semester =$student_info['semester'];
    $session =$student_info['session'];
    $image =$student_info['image'];
    $fathers_name =$student_info['fathers_name'];
    $mothers_name =$student_info['mothers_name'];
    $email =$student_info['email'];
    $hall =$student_info['hall'];
    $phone =$student_info['phone'];
    $gender =$student_info['gender'];
    $blood_group =$student_info['blood_group'];
    $birth_date =$student_info['birth_date'];
    $nationality =$student_info['nationality'];
    $religion =$student_info['religion'];
    $present_address =$student_info['present_address'];
    $permanent_address =$student_info['permanent_address'];

    $student = 'visible';
    $teacher = 'hidden';



}else if(mysqli_num_rows($userid_exist_t) > 0) {

    $teacher_sql = mysqli_query($db, "SELECT * FROM teachers WHERE userid='$roll_no'");
    $teacher_info = mysqli_fetch_array($teacher_sql);

    $member_type ="teacher";

    $name =$teacher_info['name'];
    $userid =$teacher_info['userid'];
    $rank =$teacher_info['rank'];
    $image =$teacher_info['image'];
    $fathers_name =$teacher_info['fathers_name'];
    $mothers_name =$teacher_info['mothers_name'];
    $email =$teacher_info['email'];
    $phone =$teacher_info['phone'];
    $gender =$teacher_info['gender'];
    $blood_group =$teacher_info['blood_group'];
    $birth_date =$teacher_info['birth_date'];
    $nationality =$teacher_info['nationality'];
    $religion =$teacher_info['religion'];
    $present_address =$teacher_info['present_address'];
    $permanent_address =$teacher_info['permanent_address'];

    $student = 'hidden';
    $teacher = 'visible';
}else {
    header("Location:registration.php");
}

if ($image =="") {
  $image = 'user.jpg';
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <script src="assets/js/jquery.js"></script>

</head>

<body class="no-skin">
<script type="text/javascript">
  
$(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });



</script>


<style type="text/css">


  .user_row{
    padding: 15px;
    border-bottom: 1px solid #C7CBD1;
    border-radius: 5px;
  }
  .user_row:hover{
    background-color: #EBEDEF;
  }

  #pic_update{
    width: 250px;
  }

  .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
  }
  .btn_update{
    width: 100%;
  }
</style>  

<section class="col-md-8" style="margin-top: 110px;">
    

  <div class="">
    <div class="" >
          <div class="" style="margin:0 auto; width: 80%;">
        <div class="panel panel-default">
          <div class="panel-heading">  
            <h3 ><?php echo $name;?></h3>
            <small class="<?php echo $teacher; ?>"><?php echo $rank; ?></small>
            <small class="<?php echo $student; ?>"><?php echo $year; ?> - <?php echo $semester; ?> Semester</small>
            <a href="edit_profile.php?id=<?php echo $roll_no; ?>" class="btn btn-danger pull-right" style="margin-top: -40px;">Edit Profile</a>
          </div>
          <div class="panel-body">
            <div class="box box-info">
                  <div class="box-body">
                <div class="" style="margin:0 auto; width: 60%;">
                  <div  align="center"> 
  

                    <form id="pic_update" method="post" action="user_img_update.php" enctype="multipart/form-data">
                      <div class="">
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-btn">
                                      <span class="btn btn-default btn-file">
                                          Browse… <input type="file" id="imgInp" name="image">
                                      </span>
                                  </span>
                                  <input type="text" class="form-control" readonly>
                              </div>
                              <img id='img-upload' src="../images/user/<?php echo $member_type;?>/<?php echo $image;?>" class="img-responsive" />

                          </div>
                          <input type="submit" name="update_img" id="insert" value="Update" onclick="return validateimg()" class="btn btn-info btn_update"/>
                      </div>
                    </form>

                    <script type="text/javascript">
                      function validateimg() {

                      var img=document.forms["pic_update"]["image"].value;
                      if (img==null || img=="")
                       {
                        alert('Please insert an image !');
                        return false;
                       }


                      return( true );
                      }
                      
                    </script> 


                  </div>  
                </div>
                <br>
                <br>
                      
                      <div class="clearfix"></div>
                      <div style="width: 100%;height: 5px;border-top: 1px solid #333333;border-bottom: 1px solid red;"></div>
                      
                <div class="user_info">

                  <div class="col-md-12 user_row  <?php echo $student; ?>">
                    <div class="col-md-3">Session :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $session; ?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Father's Name :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $fathers_name;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Mother's Name :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $mothers_name;?> </div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Email Address :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $email;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Phone Number :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $phone;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Birth Date :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $birth_date;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Gender :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $gender;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Blood Group :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $blood_group;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Nationality :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $nationality;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Religion :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $religion;?></div>
                  </div>

                  <div class="col-md-12 user_row  <?php echo $student; ?>">
                    <div class="col-md-3">Hall Attatched :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $hall;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Present Address :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $present_address;?></div>
                  </div>

                  <div class="col-md-12 user_row">
                    <div class="col-md-3">Permanent Addres :</div>
                    <div class="col-md-8" style="padding-left: 20px;"><?php echo $permanent_address;?></div>
                  </div>

                </div>
                



                
              </div>
                <!-- /.box -->
            </div>
          </div> 
        </div>
      </div>  
    </div>
  </div>

</section>

<script>
  $(function() {
    $('#profile-image1').on('click', function() {
      $('#profile-image-upload').click();
    });
  });       
</script> 





<script src="assets/js/bootstrap.min.js"></script>



    
</body>
</html>