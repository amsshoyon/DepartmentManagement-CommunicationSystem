<?php

    include('server.php');

    $member_type ="";
    $userid ="";
    $roll_no = $_GET['id'];

    if (isset($_POST['update'])) {
        $name =$_POST['name'];
        $session =$_POST['session'];
        $year =$_POST['year'];
        $semester =$_POST['semester'];
        $hall =$_POST['hall'];
        $pass =$_POST['pass_two'];
        $email =$_POST['email'];

        $insert = "UPDATE students SET reg_id='$reg_id' , roll_no = '$roll_no' , name = '$name', session = '$session', year = '$year', semester = '$semester', hall = '$hall', pass = '$pass', email = '$email' WHERE roll_no='$roll_no'";

        if ($db->query($insert) === TRUE) {

            header("location:profile.php?id=".$roll_no);

        } else {

            echo "Ragistration Failed." . $db->error;

        }

    }



    $student_sql = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$roll_no'");
    $student_info = mysqli_fetch_array($student_sql);


?>
<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    


</head>
<body>





<section class="col-md-8 col-md-offset-1" style="margin-top: 70px;padding: 30px;border-radius: 10px;background-color: #EBEDEF">

            <form class="" id="reg_form" method="post" action="">


                <input type="hidden" name="member_type" value="student">
                <div class="col-md-12">
                    
                    <div class="form-group col-lg-12">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" id="" value="<?php echo $student_info['name'] ; ?>">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Session</label>
                        <input type="text" name="session" class="form-control" id="" value="<?php echo $student_info['session'] ; ?>">
                    </div>

                    <div class="col-md-6" style="">
                        <div class="form-group">
                            <label class="control-label" for="year">Year</label>
                            <select id="" name="year" class="form-control" required>
                                <option value="<?php echo $student_info['year'] ; ?>" selected hidden><?php echo $student_info['year'] ; ?></option>
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
                                <option selected hidden value="<?php echo $student_info['semester'] ; ?>"><?php echo $student_info['semester'] ; ?></option>
                                <option value="Odd">Odd</option>
                                <option value="Even">Even</option>
                            </select>
                        </div>
                    </div>  

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="hall">Attatched Hall</label>
                            <select id="hall" name="hall" class="form-control">
                                <option selected hidden value="<?php echo $student_info['hall'] ; ?>"><?php echo $student_info['hall'] ; ?></option>
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
                        <input type="email" name="email" class="form-control" id="" value="<?php echo $student_info['email'] ; ?>">
                    </div> 
                    
                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input type="password" name="pass_one" class="form-control" id="" value="<?php echo $student_info['pass'] ; ?>">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Repeat Password</label>
                        <input type="password" name="pass_two" class="form-control" id="" value="<?php echo $student_info['pass'] ; ?>">
                    </div>
                                    
                        <span id='result'></span>
                        <button type="submit" name="update" class="btn btn-success pull-right" onclick="return validate()">Update</button>
                </div>

                    
      
            </form>

</section>


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
    


<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

