<?php
include('redirect.php');
include('server.php');

$name ="";
$fathers_name ="";
$mothers_name ="";
$email ="";
$phone ="";
$gender ="";
$blood_group ="";
$birth_date ="";
$hall ="";
$nationality = "";
$religion = "";
$present_address = "";
$permanent_address = "";
$rank = "";

$member_type ="";
$userid ="";


$member_type =$_SESSION["apee_user"];


if ($member_type =='student') {

    $userid = $_SESSION["apee_userid"];

    $edit_data = mysqli_query($db, "SELECT * FROM students WHERE userid=$userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $name =$edit_value['name'];
    $fathers_name =$edit_value['fathers_name'];
    $mothers_name =$edit_value['mothers_name'];
    $email =$edit_value['email'];
    $phone =$edit_value['phone'];
    $gender =$edit_value['gender'];
    $blood_group =$edit_value['blood_group'];
    $birth_date =$edit_value['birth_date'];
    $hall =$edit_value['hall'];
    $nationality =$edit_value['nationality'];
    $religion =$edit_value['religion'];
    $present_address =$edit_value['present_address'];
    $permanent_address =$edit_value['permanent_address'];

    if ($gender=="") {

    $gender = 'Select';

    }else{
        $gender =$edit_value['gender'];
    }

    if ($blood_group=="") {

    $blood_group = 'Select';

    }else{
        $blood_group =$edit_value['blood_group'];
    }

    $student = 'visible';
    $teacher = 'hidden';

}else if ($member_type =='teacher') {

    $userid = $_SESSION["apee_userid"];

    $edit_data = mysqli_query($db, "SELECT * FROM teachers WHERE userid=$userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $name =$edit_value['name'];
    $rank =$edit_value['rank'];
    $fathers_name =$edit_value['fathers_name'];
    $mothers_name =$edit_value['mothers_name'];
    $email =$edit_value['email'];
    $phone =$edit_value['phone'];
    $gender =$edit_value['gender'];
    $blood_group =$edit_value['blood_group'];
    $birth_date =$edit_value['birth_date'];
    $nationality =$edit_value['nationality'];
    $religion =$edit_value['religion'];
    $present_address =$edit_value['present_address'];
    $permanent_address =$edit_value['permanent_address'];

    if ($gender=="") {

    $gender = 'Select';

    }else{
        $gender =$edit_value['gender'];
    }

    if ($blood_group=="") {

    $blood_group = 'Select';

    }else{
        $blood_group =$edit_value['blood_group'];
    }

    if ($rank=="") {

    $rank = 'Select';

    }else{
       $rank =$edit_value['rank'];
    }

    $student = 'hidden';
    $teacher = 'visible';

}



?>


<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/courses.css">
	<link rel="stylesheet" href="css/status.css">

	


</head>
<body>




 <?php include('menu.php'); ?>

 <?php include('body.php'); ?>

<section class="col-md-8" style="margin-top: 130px; margin-bottom: 100px;">
	
    <div class="" style="width: 80%;margin: 0 auto;background-color: #F5F5F5;padding: 20px;border-radius: 5px;box-shadow: 2px 5px 5px 2px rgba(0, 0, 0, 0.1);">
    	<div class="col-md-12" style="padding: 20px;">
			<h3>Edit Profile <a href="my_profile.php" class="btn btn-info pull-right" >Go Back To Profile</a></h3>
		</div>
		<div class="clearfix"></div>
		<div style="width: 100%;height: 5px;border-top: 1px solid #333333;border-bottom: 1px solid red;margin-bottom: 30px;"></div>
    	<form class="" id="edit_profile" method="post" action="">
            <!-- Form start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="name">Full Name</label>
                        <input id="name" name="name" type="text" value="<?php echo $name; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-12 <?php echo $teacher;?>">
                    <div class="form-group">
                        <label class="control-label" for="rank">Teacher Rank</label>
                        <select id="rank" name="rank" class="form-control">
                            <option selected hidden value="<?php echo $rank; ?>"><?php echo $rank; ?></option>
                            <option value="Professor">Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Assistant Professor">Assistant Professor</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="fathers_name">Father's Name</label>
                        <input id="fathers_name" name="fathers_name" type="text" value="<?php echo $fathers_name; ?>" class="form-control input-md">
                    </div>
                </div>
                <!-- Text input-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="mothers_name">Mother's Name</label>
                        <input id="mothers_name" name="mothers_name" type="text" value="<?php echo $mothers_name; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input id="email" name="email" type="text" value="<?php echo $email; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" value="<?php echo $phone; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                        	<option selected hidden value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="blood_group">Blood Group</label>
                        <select id="blood_group" name="blood_group" class="form-control">
                        	<option selected hidden value="<?php echo $blood_group; ?>"><?php echo $blood_group; ?></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="birth_date">Date of Birth</label>
                        <input id="birth_date" name="birth_date" type="text" value="<?php echo $birth_date; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-12  <?php echo $student; ?>">
                    <div class="form-group">
                        <label class="control-label" for="hall">Attatched Hall</label>
                        <input id="hall" name="hall" type="text" value="<?php echo $hall; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="nationality">Nationality</label>
                        <input id="nationality" name="nationality" type="text" value="<?php echo $nationality; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="religion">Religion</label>
                        <input id="religion" name="religion" type="text" value="<?php echo $religion; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="present_address">Present Address</label>
                        <input id="present_address" name="present_address" type="text" value="<?php echo $present_address; ?>" class="form-control input-md">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="permanent_address">Permanent Address</label>
                        <input id="permanent_address" name="permanent_address" type="text" value="<?php echo $permanent_address; ?>" class="form-control input-md">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="col-md-12">
                    <div class="form-group">
                        <span id="edit_profile_msg" style="color: red;padding: 10px;"></span><button type="submit" name="submit" class="btn btn-info pull-right" onclick="return edit_profile()">Submit Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        

</section>

 <?php include('footer.php'); ?>



<script type="text/javascript">


function edit_profile() {

    
    var name=document.forms["edit_profile"]["name"].value;
    if (name==null || name=="")
     {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Name...";
      return false;
     }

     <?php

        if ($member_type =="teacher") {
              echo ' var rank=document.forms["edit_profile"]["rank"].value; ';
              echo ' if (rank==null || rank=="") {'; 
               echo ' document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Rank ...";';  
                 echo ' return false;';
               echo '}';
        }


    ?>

    var fathers_name=document.forms["edit_profile"]["fathers_name"].value;
    if (fathers_name==null || fathers_name=="")
     {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Father's Name...";
      return false;
     }
    var mothers_name=document.forms["edit_profile"]["mothers_name"].value;
    if (mothers_name==null || mothers_name=="")
     {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Mother's Name...";
      return false;
     }

    var x = document.forms["edit_profile"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    
    
    var b=document.forms["edit_profile"]["email"].value;
    if (b==null || b=="")
     {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Email ...";
      return false;
     }else{
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            document.getElementById("edit_profile_msg").innerHTML = "Please Enter a valid Email Address .........";
            return false;
        }
     }
     
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("edit_profile_msg").innerHTML = "Please Enter a valid Email Address .........";
        return false;
    }

    var phone=document.forms["edit_profile"]["phone"].value;
    if (phone==null || phone=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Phone Number ...";
      return false;
    }    

    var gender=document.forms["edit_profile"]["gender"].value;
    if (gender==null || gender=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please select your Gender ...";
      return false;
    }

    var blood_group=document.forms["edit_profile"]["blood_group"].value;
    if (blood_group==null || blood_group=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please select your Blood Group ...";
      return false;
    }

    var birth_date=document.forms["edit_profile"]["birth_date"].value;
    if (birth_date==null || birth_date=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please select your Date of Birth ...";
      return false;
    }
    

    <?php

        if ($member_type =="Student") {
              echo ' var hall=document.forms["edit_profile"]["hall"].value; ';
              echo ' if (hall==null || hall=="") {'; 
               echo ' document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Hall Name ...";';  
                 echo ' return false;';
               echo '}';
        }


    ?>

    

    var nationality=document.forms["edit_profile"]["nationality"].value;
    if (nationality==null || nationality=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Nationality ...";
      return false;
    }

    var religion=document.forms["edit_profile"]["religion"].value;
    if (religion==null || religion=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Religion ...";
      return false;
    }

    var present_address=document.forms["edit_profile"]["present_address"].value;
    if (present_address==null || present_address=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Present Address";
      return false;
    }

    var permanent_address=document.forms["edit_profile"]["permanent_address"].value;
    if (permanent_address==null || permanent_address=="") {
      document.getElementById("edit_profile_msg").innerHTML = "Please Enter Your Permanent Address";
      return false;
    }

    var elem = document.getElementById("result");
    elem.innerHTML = "Updating....";
    elem.style.color = "#168781";

    return( true );

             
}
    
</script>   


<script>
    $('#edit_profile').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "edit_profile_back.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#edit_profile_msg').html(data);
            }                   
        }).done(function() {
                $("#edit_profile").trigger("reset");
            });
    });
</script>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/notification.js"></script>



<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>

