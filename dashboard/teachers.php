<?php

    include('server.php');

    $member_type ="";
    $userid ="";


    $result = mysqli_query($db, "SELECT * FROM teachers "); 

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

<section class="col-md-12">
    <h3 style="padding: 10px;">Teachers<button class="btn btn-info pull-right" data-toggle="modal" data-target="#add_teacher">Add Teacher</button></h3>
    <hr>
</section>

<form class="" id="reg_form" method="post" action="">
    <div id="add_teacher" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registration <small id='result' style="padding-left:15px;text-align:center;color:red;"></small></h4>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="member_type" value="teacher">
                        <div class="col-md-12">
                            
                            <div class="form-group col-lg-12">
                                <label>User ID</label>
                                <input type="text" name="userid" class="form-control" id="" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" id="" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Short Name</label>
                                <input type="text" name="shortname" class="form-control" id="" value="">
                            </div>
                            
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" name="pass_one" class="form-control" id="" value="">
                            </div>
                            
                            <div class="form-group col-lg-6">
                                <label>Repeat Password</label>
                                <input type="password" name="pass_two" class="form-control" id="" value="">
                            </div>
                                            
                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" id="" value="">
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="rank">Teacher Rank</label>
                                    <select id="rank" name="rank" class="form-control">
                                        <option selected hidden value="">Select</option>
                                        <option value="Professor">Professor</option>
                                        <option value="Associate Professor">Associate Professor</option>
                                        <option value="Assistant Professor">Assistant Professor</option>
                                        <option value="Lecturer">Lecturer</option>
                                    </select>
                                </div>
                            </div>   
                        </div>
                        
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right" onclick="return validate()">Register</button>
                </div>
            </div>

        </div>
    </div>
</form>



<script type="text/javascript">


function validate() {

    
    var userid=document.forms["reg_form"]["userid"].value;
    if (userid==null || userid=="")
     {
      document.getElementById("result").innerHTML = " Error : Please Enter User ID...";
      return false;
     }

    var name=document.forms["reg_form"]["name"].value;
    if (name==null || name=="")
     {
      document.getElementById("result").innerHTML = " Error : Enter Full Name...";
      return false;
     }

    var shortname=document.forms["reg_form"]["shortname"].value;
    if (shortname==null || shortname=="")
     {
      document.getElementById("result").innerHTML = " Error : Enter Short Name...";
      return false;
     }
     
    var pass_one=document.forms["reg_form"]["pass_one"].value;
    if (pass_one==null || pass_one=="")
     {
      document.getElementById("result").innerHTML = " Error : Password must be filled...";
      return false;
     }

    var pass_two=document.forms["reg_form"]["pass_two"].value;
    if (pass_two==null || pass_two=="")
     {
      document.getElementById("result").innerHTML = " Error : Confirm Password...";
      return false;
     }
     
    var pass_two=document.forms["reg_form"]["pass_two"].value;
     if (pass_one != pass_two)
     {
      document.getElementById("result").innerHTML = " Error : Password must be Same...";
      return false;
     }

    var x = document.forms["reg_form"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    
    
    var b=document.forms["reg_form"]["email"].value;
    if (b==null || b=="")
     {
      document.getElementById("result").innerHTML = " Error : Email field must be filled...";
      return false;
     }else{
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            document.getElementById("result").innerHTML = " Error : Please Enter a valid Email Address .........";
            return false;
        }
     }
     
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("result").innerHTML = " Error : Please Enter a valid Email Address .........";
        return false;
    }

    var rank=document.forms["reg_form"]["rank"].value;
    if (rank==null || rank=="") {
      document.getElementById("result").innerHTML = " Error : Select Rank...";
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
    $('#reg_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "reg.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#result').html(data);
            }                   
        }).done(function() {
                $("#reg_form").trigger("reset");
            });
    });
</script>


<style type="text/css">
    .user_name{
        padding: 10px;
        background-color: #37BF91;
        border:1px solid red;
        color: #fff;
    }
    .user_name a{
        color: #fff;
        text-decoration: none;
        opacity: .7;
    }
    .user_name a:hover{
        opacity: 1;
    }
</style>

<section class="col-md-8" style="margin-top: 10px;">

        <?php while($user = mysqli_fetch_array($result)){ ?>
            <?php 
                $image = $user['image'];
                $name = $user['name'];
                $userid = $user['userid'];
                if ($image=="") {
                    $image='user.jpg';
                }
                if ($name=="") {
                    $name=$user['username'];
                }
            ?>
            <div class="col-md-3 col-sm-6 col-xs-6 team-grids" style="margin-top: 10px;">
                <div class="thumbnail team-agileits">
                    <img src="../images/user/teacher/user.jpg" class="img-responsive" alt="" style="height:250px;width: 100%;"/>
                    <div class="text-center user_name">
                        <a href="profile.php?id=<?php echo $userid; ?>"><h4><?php echo $name; ?></h4></a>
                    </div>
                </div>
            </div>
        <?php } ?>

</section>


<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

