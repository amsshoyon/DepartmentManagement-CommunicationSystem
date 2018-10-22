<?php 

  include('server.php'); 
  include('session.php'); 
  $teacher_menu = '';
  $student_menu = '';
  $user_name = '';
  $user_roll = '';
  $user_year = '';
  $user_semester = '';

if (isset($_SESSION["apee_userid"])) {

  $member = $_SESSION["apee_user"];
  $userid = $_SESSION["apee_userid"];

  if ($member == 'student') {
    $result_redirect = 'results_s.php';
    $teacher_menu = 'hidden';
    $student_menu = 'visible';

    $get_user = mysqli_query($db, "SELECT * FROM students WHERE roll_no=$userid");
    $get_name = mysqli_fetch_array($get_user);

    $user_name =$get_name['name'];
    $user_roll =$get_name['roll_no'];
    $user_year =$get_name['year'];
    $user_semester =$get_name['semester'];


  }else if ($member == 'teacher'){
    $result_redirect = 'results_t.php';
    $teacher_menu = 'visible';
    $student_menu = 'hidden';

    $get_user = mysqli_query($db, "SELECT * FROM teachers WHERE userid=$userid");
    $get_name = mysqli_fetch_array($get_user);

    $user_name = $get_name['name'];
    $user_rank = $get_name['rank'];
  }else {

  }

}

  



?>



<!DOCTYPE html>
<html class="no-js">
	<head>

  <link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="dashboard/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/menu.css">

	



</head>
<body>


 <header class="navbar navbar-default navbar-doublerow navbar-trans navbar-fixed-top">
  <!-- top nav -->
  <nav class="navbar navbar-top hidden-xs">
    <div class="top-nav">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="http://www.ru.ac.bd/" target="_blank"><span class=""><img src="images/ru_logo.png" style="width: 20px;"> <b> University of Rajshahi</b></span></a></li>
          <li><a href="http://www.ru.ac.bd/apee/" target="_blank"><span class=""><span class="fa fa-envelope"></span> <b>: Applied Physics and Electronic Engineering</b></span></a></li>
          <li class="<?php echo $logged_in;?>"><a href=""><span class=""><span class="fa fa-user"></span> <b>: <?php echo $user_name; ?></b></span></a></li>
          <li class="<?php echo $logged_in;?> <?php echo $teacher_menu;?>"><a href=""><span class=""><span class="  fa fa-bookmark"> </span> : <?php echo $user_rank; ?></span></a></li>
          <li class="<?php echo $logged_in;?> <?php echo $student_menu;?>"><a href=""><span class=""><span class="  fa fa-bookmark"> </span> : <?php echo $user_roll; ?> ( <?php echo $user_year; ?> - <?php echo $user_semester; ?> )</span></a></li>
        </ul>
      <!-- right nav top -->
      <ul class="nav navbar-nav pull-right">
        <li id="login_msg"></li>
        <li><a href="" class="">About Us</a></li>
        <li><a data-toggle="modal" data-target="#contact">Contact Us</a></li> 
      </ul>
      

      </div>
      <!-- left nav top -->

    </div>
  </nav>
  <!-- down nav -->
 <nav class="navbar navbar-default navbar-static-top navbar-bottom" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: #333333;font-size: 30px;">APEE </a>

    </div>
    <div class=" collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav  <?php echo $logged_in;?>">

        <li><span class="linedivide1"></span></li>

        <li class="activee"><a href="index.php">Home</a></li>

        <li class=""><a href="courses.php">Courses</a></li>
        <li class=""><a href="activities.php">Activities</a></li>
        <li class=""><a href="<?php echo $result_redirect;?>">Results</a></li>
        <li class="<?php echo $teacher_menu;?>"><a href="attendance.php">Attendance</a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Classes<b class="caret"></b></a> 
          <ul class="dropdown-menu">
            <li><a href="students.php?id=1st_year_odd">1st Year ( odd )</a></li>
            <li><a href="students.php?id=1st_year_even">1st Year ( Even )</a></li>
            <li><a href="students.php?id=2nd_year_odd">2nd Year ( odd )</a></li>
            <li><a href="students.php?id=2nd_year_even">2nd Year ( Even )</a></li>
            <li><a href="students.php?id=3rd_year_odd">3rd Year ( odd )</a></li>
            <li><a href="students.php?id=3rd_year_even">3rd Year ( Even )</a></li>
            <li><a href="students.php?id=4th_year_odd">4th Year ( odd )</a></li>
            <li><a href="students.php?id=4th_year_even">4th Year ( Even )</a></li>
            <li><a href="students.php?id=masters">Masters</a></li>
          </ul>
        </li>

      

      </ul>
      
      <form id="login_form" class="navbar-form navbar-right <?php echo $login;?>" method="post" action="login.php">
          <div class="form-group">
              <input type="text" class="form-control" name="userid" placeholder="User ID">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Password">
          </div>
          <button type="submit" name="login" class="btn btn-default" onclick="return login()">Login</button>
      </form>




    <ul class="nav navbar-nav hidden-xs pull-right cart-menu  <?php echo $logged_in;?>">
      <li class="search">
      <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
      <button type="submit" class="btn btn-primary btn-sm">Search</button>
    </li>
    <li><span class="linedivide1"></span></li>

    <?php include('noti_menu.php'); ?>

    <li><span class="linedivide1 <?php //echo $logged_in; ?>"></span></li>

    <?php include('msg_menu.php'); ?>

    <li><span class="linedivide1 <?php //echo $logged_in; ?>"></span></li>

    <li class="cart-icon login <?php// echo $logged_in; ?>">
      <img  class="js-show-header-dropdown" src="images/icons/icon-header-01.png" class="login" alt="ICON">
      <span class="header-icons-noti">5<?php //echo $num_cart; ?></span>

      <!-- Header cart noti -->
      <div class="header-cart header-dropdown" style="width: 200px;overflow: hidden;padding: 0;">


        <div class=" <?php //echo $logged_in; ?>" id="" >
          <div class="list-group">
            <a href="my_profile.php" class="list-group-item list-group-item-action">My Profile</a>
            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
            <a href="edit_security.php" class="list-group-item list-group-item-action">Edit Security</a>
            <a href="notice_board.php" class="list-group-item list-group-item-action">Notice Board</a>
            <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
          </div>
        </div>
        
      </div>
    </li>
    
    </ul>

    </div>
    <!-- /.navbar-collapse -->

    </div>


  </nav>

</header> 


<script type="text/javascript">


function login() {


  var userid=document.forms["login_form"]["userid"].value;
  if (userid==null || userid=="")
   {
      return false;
   }
   
  var pass=document.forms["login_form"]["pass"].value;
  if (pass==null || pass=="")
   {
      return false;
   }

  return( true );

       
}
  
</script>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>


