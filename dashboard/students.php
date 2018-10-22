<?php

    include('server.php');

    $member_type ="";
    $userid ="";


    $result = mysqli_query($db, "SELECT * FROM students "); 

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
    <h3 style="padding: 10px;">Students<button class="btn btn-info pull-right" data-toggle="modal" data-target="#add_student">Add Student</button></h3>
    <hr>
</section>

<form class="" id="reg_form" method="post" action="">
    <div id="add_student" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registration <small id='result' style="padding-left:15px;text-align:center;color:red;"></small></h4>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="member_type" value="student">
                        <div class="col-md-12">
                            
                            <div class="form-group col-lg-6">
                                <label>Registration ID</label>
                                <input type="text" name="reg_id" class="form-control" id="" value="">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Roll No</label>
                                <input type="text" name="roll_no" class="form-control" id="" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" id="" value="">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Session</label>
                                <input type="text" name="session" class="form-control" id="" value="">
                            </div>

                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label class="control-label" for="year">Year</label>
                                    <select id="" name="year" class="form-control" required>
                                        <option value="" selected hidden>Select</option>
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
                                    <label class="control-label" for="semester">Semester</label>
                                    <select id="semester" name="semester" class="form-control">
                                        <option selected hidden value="">Select</option>
                                        <option value="Odd">Odd</option>
                                        <option value="Even">Even</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="hall">Attatched Hall</label>
                                    <select id="hall" name="hall" class="form-control">
                                        <option selected hidden value="">Select</option>
                                        <option value="Sher-e Bangla Fazlul Haque Hall">Sher-e Bangla Fazlul Haque Hall</option>
                                        <option value="Shah Mukhdum Hall">Shah Mukhdum Hall</option>
                                        <option value="Nawab Abdul Latif Hall">Nawab Abdul Latif Hall</option>
                                        <option value="Syed Amer Ali Hall">Syed Amer Ali Hall</option>
                                        <option value="Shaheed Shamsuzzoha Hall">Shaheed Shamsuzzoha Hall</option>
                                        <option value="Shaheed Habibur Rahman Hall">Shaheed Habibur Rahman Hall</option>
                                        <option value=" Matihar Hall"> Matihar Hall</option>
                                        <option value="Madar Bux Hall">Madar Bux Hall</option>
                                        <option value="Shaheed Suhrawardy Hall">Shaheed Suhrawardy Hall</option>
                                        <option value="Shaheed Ziaur Rahman Hall">Shaheed Ziaur Rahman Hall</option>
                                        <option value="Bangabandhu Sheikh Mujibur Rahman Hall">Bangabandhu Sheikh Mujibur Rahman Hall</option>
                                        <option value="Mannujan Hall">Mannujan Hall</option>
                                        <option value="Rokeya Hall">Rokeya Hall</option>
                                        <option value="Tapashi Rabeya Hall">Tapashi Rabeya Hall</option>
                                        <option value="Begum Khaleda Zia Hall">Begum Khaleda Zia Hall</option>
                                        <option value="Rahamatunnesa Hall">Rahamatunnesa Hall</option>
                                        <option value="Bangamata  Fazilatunnesa  Hall">Bangamata  Fazilatunnesa  Hall</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" id="" value="">
                            </div> 
                            
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" name="pass_one" class="form-control" id="" value="">
                            </div>
                            
                            <div class="form-group col-lg-6">
                                <label>Repeat Password</label>
                                <input type="password" name="pass_two" class="form-control" id="" value="">
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

    
    var reg_id=document.forms["reg_form"]["reg_id"].value;
    if (reg_id==null || reg_id=="")
     {
      document.getElementById("result").innerHTML = " Error : Please Enter Registration ID...";
      return false;
     }

    var roll_no=document.forms["reg_form"]["roll_no"].value;
    if (roll_no==null || roll_no=="")
     {
      document.getElementById("result").innerHTML = " Error : Enter Roll No...";
      return false;
     }

    var name=document.forms["reg_form"]["name"].value;
    if (name==null || name=="")
     {
      document.getElementById("result").innerHTML = " Error : Enter Full Name...";
      return false;
     }

    var session=document.forms["reg_form"]["session"].value;
    if (session==null || session=="")
     {
      document.getElementById("result").innerHTML = " Error : Enter Session...";
      return false;
     }

    var year=document.forms["reg_form"]["year"].value;
    if (year==null || year=="")
     {
      document.getElementById("result").innerHTML = " Error : Select Year...";
      return false;
     }

    var semester=document.forms["reg_form"]["semester"].value;
    if (semester==null || semester=="")
     {
      document.getElementById("result").innerHTML = " Error : Select Semester...";
      return false;
     }

    var hall=document.forms["reg_form"]["hall"].value;
    if (hall==null || hall=="")
     {
      document.getElementById("result").innerHTML = " Error : Select Hall...";
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
        line-height: 5px;
        margin-top: -10px;
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

<section class="col-md-12" style="margin-top: 10px;">

        <?php while($user = mysqli_fetch_array($result)){ ?>
            <?php 
                $image = $user['image'];
                $name = $user['name'];
                $session = $user['session'];
                $roll_no = $user['roll_no'];
                if ($image=="") {
                    $image='user.jpg';
                }
                if ($name=="") {
                    $name=$user['username'];
                }
            ?>
            <div class="col-md-2 col-sm-6 col-xs-6 team-grids" style="margin-top: 10px;">
                <div class="thumbnail team-agileits">
                    <img src="../images/user/teacher/user.jpg" class="img-responsive" alt="" style="height:250px;width: 100%;"/>
                    <div class="text-center user_name">
                        <a href="profile.php?id=<?php echo $roll_no; ?>">
                            <h4><?php echo $name; ?></h4>
                            <small> ( <?php echo $roll_no; ?> || <?php echo $session; ?> ) </small>
                        </a>
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

