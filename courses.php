<?php


include ('server.php');


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



<section class="col-md-8" style="margin-top: 120px;">
 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-I Odd Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-I' and semester='Odd'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-I Even Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_e = "SELECT * FROM courses WHERE year='Part-I' and semester='Even'";
                $get_i_e = mysqli_query($db, $select_i_e);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_e)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-II Odd Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-II' and semester='Odd'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-II Even Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-II' and semester='Even'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-III Odd Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-III' and semester='Odd'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-III Even Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-III' and semester='Even'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

 
    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-IV Odd Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-IV' and semester='Odd'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

    <div class="courses col-md-12">
        <span class="col-md-12" style="font-size: 30px;font-weight: 500;">Part-IV Even Semester</span>
        

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
                </tr>
            </thead>

            <?php
                $select_i_o = "SELECT * FROM courses WHERE year='Part-IV' and semester='Even'";
                $get_i_o = mysqli_query($db, $select_i_o);
            ?>   
            <?php while($row = mysqli_fetch_array($get_i_o)){ ?>
                <tbody>
                    <tr class="active">
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['course_title']; ?></td>
                        <td><?php echo $row['marks']; ?></td>
                        <td><?php echo $row['credits']; ?></td>
                        <td><?php echo $row['contact_hour_week']; ?></td>
                        <td><?php echo $row['contact_periods_week']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
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

