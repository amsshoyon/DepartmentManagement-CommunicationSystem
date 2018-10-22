<?php

include ('server.php');

$msg = '';
$member_type =$_SESSION["apee_user"];
$userid = $_SESSION["apee_userid"];

if ($member_type =='student') {

   

    $edit_data = mysqli_query($db, "SELECT * FROM students WHERE roll_no = $userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $image =$edit_value['image'];
    $user_name =$edit_value['name'];

    $location = 'images/user/student';

    if ($image=="") {

    $image = 'user.jpg';

    }else{
        $image = $edit_value['image'];
    }

}else if ($member_type =='teacher') {


    $edit_data = mysqli_query($db, "SELECT * FROM teachers WHERE userid = $userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $image =$edit_value['image'];
    $user_name =$edit_value['name'];

    $location = 'images/user/teacher';

    if ($image=="") {

    $image = 'user.jpg';

    }else{
        $image = $edit_value['image'];
    }
}




?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet" href="css/status.css">

</head>
<body>

<style type="text/css">

.photo_post{
    width: 150px;
    display: inline-block;
}

label, input {
  color: #333;
  font: 14px/20px Arial;
}

label {
  display: inline-block;
  width: 5em;
  padding: 0 1em;
  text-align: right;
}

/* Hide the file input using
opacity */
[type=file] {
    position: absolute;
    filter: alpha(opacity=0);
    opacity: 0;
}
input,
[type=file] + label {
  border: 1px solid #CCC;
  border-radius: 3px;
  text-align: left;
  padding: 10px;
  width: 150px;
  position: relative;
}
[type=file] + label {
  text-align: center;
  /* Decorative */
  background: #333;
  color: #fff;
  border: none;
  cursor: pointer;
}
[type=file] + label:hover {
  background: #3399ff;
}
.photo_review{
    display: absolute;

}

</style>
    
<?php echo $msg ; ?>

    <section class="col-md-12">
        <form action="status_update.php" id="" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
            <div class="share">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-file"></i> Update Status 
                      <span id="status_msg" style="margin-left: 20px;color: inherit;"></span>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <div class="col-md-2">
                                <img id="output" class="img-responsive" src="<?php echo $location;?>/<?php echo $image;?>" style="width:100%;height: 200px;" >
                            </div>
                            <div class="col-md-10">
                                <textarea name="status" cols="40" rows="8" id="status_message" class="form-control message" style=" overflow: hidden;" placeholder="What's on your mind ?"></textarea> 
                            </div>
                            
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="btn-group">
                                      <div class="photo_post">
                                          <input name="image" id="f02" type="file" placeholder="Add profile picture" onchange="loadFile(event)"/>
                                             <label for="f02">Upload Photo</label>
                                      </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right" style="margin-right: 30px;">
                                <div class="form-group">               
                                    <input type="submit" name="status_upload" value="Post" class="btn btn-primary" style="height: 30px;width: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>




<div class="clearfix"></div>


<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>




<?php
 
$start = 0;
$end = 6;

$count_status = mysqli_query($db, "SELECT * FROM status");
$rowcount=mysqli_num_rows($count_status);


if ($rowcount <= $end) {
  $previous = 'hidden';
  $next = 'hidden';
}

if(isset($_POST['previous'])){

  $start = $_POST['page'];

  if ($start == 0) {
    $start = 0 ;
  }else{

    $previous = 'visible';
    $start = $start - $end;
    if ( $start <= 0) {
      $start = 0;
      $previous = 'hidden';
    }
  }


}else if(isset($_POST['next'])){

  $start = $_POST['page'];
  $previous = 'visible';

  

  if ($compare >= 0) {
    $start = $start + $end;

    $compare = $rowcount - ( $start + $end);
    if ($compare <= 0) {
      $next = 'hidden';
    }
  }else {
    $next = 'hidden';
  }


}



$get_status = mysqli_query($db, "SELECT * FROM status ORDER BY id DESC limit $start , $end");
while($status_data = mysqli_fetch_array($get_status)){

$status = $status_data['status'];
$img_st = $status_data['photo'];
$user = $status_data['user'];
$date = $status_data['date'];
$time = $status_data['time'];
$user_type = $status_data['user_type'];
$userid = $status_data['userid'];
$hide_st_img = '';

if ($user_type =='student') {

    $edit_data = mysqli_query($db, "SELECT * FROM students WHERE roll_no = '$userid'");
    $edit_value = mysqli_fetch_array($edit_data);

    $user_image =$edit_value['image'];

    $location = 'images/user/student';

    if ($user_image=="") {

    $user_image = 'user.jpg';

    }else{
        $user_image = $edit_value['image'];
    }

}else if ($user_type =='teacher') {


    $edit_data = mysqli_query($db, "SELECT * FROM teachers WHERE userid = $userid");
    $edit_value = mysqli_fetch_array($edit_data);

    $user_image =$edit_value['image'];

    $location = 'images/user/teacher';

    if ($user_image=="") {

    $user_image = 'user.jpg';

    }else{
        $user_image = $edit_value['image'];
    }
}

if ($img_st == '') {
  $hide_st_img = "hidden";
}

?>

    <section class="status container-fluid">
        <div class="status_head col-md-12">
            <img class="img-responsive img-circle" src="<?php echo $location;?>/<?php echo $user_image;?>">
            <span><?php echo $user?></span>
            <span class="time pull-right"><?php echo $time; ?> || <?php echo $date; ?> </span>
            <span class="time pull-right"><a href="">( Edit ) </a></span>
        </div>
        <div class="clearfix"></div>
        <div class="seperator"></div>
        <div class="col-md-12">
            <div class="col-md-4 ">
                <img class="img-responsive <?php echo $hide_st_img; ?>" src="images/status/<?php echo $img_st; ?>">
            </div>
            <div class="col-md-6">
                <p style="white-space: pre-line;"><?php echo $status;?></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="seperator"></div>
        <div class="clearfix"></div>
        <div class="post-footer-option">
            <ul class="list-unstyled">
                <li class="pull-left"><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                <li class="pull-left"><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
                <li class="pull-right"><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
            </ul>
       </div>
    </section>

<?php } ?>


<div class="pull-middle">
  <form method="post" action="home.php">
    <input type="hidden" name="page" value="<?php echo $start; ?>">
    <button class="<?php echo $previous; ?>" type="submit" name="previous" style="width: 150px;margin: 10px;"><< Previous</button>
    <button class="<?php echo $next; ?>" type="submit" name="next" style="width: 150px;margin: 10px;">Next >></button>
  </form>
</div>

       
</body>
</html>

