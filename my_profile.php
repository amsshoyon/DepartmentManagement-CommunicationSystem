<?php
include('redirect.php');
include('server.php');

$member_type ="";
$userid ="";


$member_type =$_SESSION["apee_user"];


if ($member_type =='student') {

    $userid = $_SESSION["apee_userid"];

    $edit_data = mysqli_query($db, "SELECT * FROM students WHERE roll_no=$userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $name =$edit_value['name'];
    $username =$edit_value['username'];
    $image =$edit_value['image'];
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

    if ($gender=="Select") {
    	
   		$gender = '';

    }else{
        $gender =$edit_value['gender'];
    }

    if ($blood_group=="Select") {

    $blood_group = '';

    }else{
        $blood_group =$edit_value['blood_group'];
    }

    if ($name=="") {

    $name = $username;

    }else{
        $name =$edit_value['name'];
    }

    $student = 'visible';
    $teacher = 'hidden';

}else if ($member_type =='teacher') {

    $userid = $_SESSION["apee_userid"];

    $edit_data = mysqli_query($db, "SELECT * FROM teachers WHERE userid=$userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $name =$edit_value['name'];
    $rank =$edit_value['rank'];
    $username =$edit_value['username'];
    $image =$edit_value['image'];
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

    if ($gender=="Select") {
    	
   		$gender = '';

    }else{
        $gender =$edit_value['gender'];
    }

    if ($blood_group=="Select") {

    $blood_group = '';

    }else{
        $blood_group =$edit_value['blood_group'];
    }

    if ($name=="") {

    $name = $username;

    }else{
        $name =$edit_value['name'];
    }

    if ($rank=="") {

    $rank = 'Teacher';

    }else{
       $rank =$edit_value['rank'];
    }

    $student = 'hidden';
    $teacher = 'visible';

}

if ($image =="") {
	$image = 'user.jpg';
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
		overflow: hidden;
	}

	.btn-file input[type=file] {
	    position: absolute;
	    font-size: 100px;
	    filter: alpha(opacity=0);
	    opacity: 0;
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
						<small class="<?php echo $student; ?>">4th year - Even Semester</small>
						<a href="edit_profile.php" class="btn btn-danger pull-right" style="margin-top: -40px;">Edit Profile</a>
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
											        <img id='img-upload' src="images/user/<?php echo $member_type;?>/<?php echo $image;?>" class="img-responsive" style= 'height: 300px;width: 100%;'/>

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
										<div class="col-md-8" style="padding-left: 20px;">2013-14</div>
									</div>
									<div class="col-md-12 user_row  <?php echo $student; ?>">
										<div class="col-md-3">Year :</div>
										<div class="col-md-8" style="padding-left: 20px;">4rth</div>
									</div>
									<div class="col-md-12 user_row  <?php echo $student; ?>">
										<div class="col-md-3">Semester :</div>
										<div class="col-md-8" style="padding-left: 20px;">Even</div>
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

