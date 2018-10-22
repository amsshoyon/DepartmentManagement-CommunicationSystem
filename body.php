<?php 

  include('server.php'); 
  $teacher_menu = '';
  $student_menu = '';
  $user_name = '';

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

  }else if ($member == 'teacher'){
    $result_redirect = 'results_t.php';
    $teacher_menu = 'visible';
    $student_menu = 'hidden';

    $get_user = mysqli_query($db, "SELECT * FROM teachers WHERE userid=$userid");
    $get_name = mysqli_fetch_array($get_user);

    $user_name =$get_name['name'];
  }else {

  }

}

  



?>



<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="css/body.css">



 
</head>
<body>

<section class="col-md-2" style="margin-top: 110px;">
	<div class="list-group">
	  <a href="" class="list-group-item list-group-item-action">History</a>
	  <a href="" class="list-group-item list-group-item-action">Governance</a>
	  <a href="" class="list-group-item list-group-item-action">Academic Programs</a>
	  <a href="users.php?id=teachers" class="list-group-item list-group-item-action">Teachers</a>
	  <a href="users.php?id=students" class="list-group-item list-group-item-action">All Students</a>
	  <a href="" class="list-group-item list-group-item-action">Officer list</a>
	  <a href="" class="list-group-item list-group-item-action">Staff list</a>
	  <a href="" class="list-group-item list-group-item-action">Research</a>
	  <a href="" class="list-group-item list-group-item-action">Resources</a>
	  <a href="" class="list-group-item list-group-item-action">Electronics Club</a>
	  <a href="" class="list-group-item list-group-item-action">Archives</a>
	</div>
</section>






<section class="col-md-2 pull-right" style="margin-top: 110px;">
	
	<div class="notice_board">
		<div class="sidebar_title text-center">
			<span>Notice Board</span>
			<span class="<?php echo $teacher_menu;?>"> || <a href="" data-toggle="modal" data-target="#notice_post">Post</a></span>
		</div>

<?php 

$get_notice = mysqli_query($db, "SELECT * FROM noticeboard ORDER BY id DESC limit 5");
while($notice_data = mysqli_fetch_array($get_notice)){

$heading = $notice_data['heading'];
$notice = $notice_data['notice'];
$shortname = $notice_data['shortname'];
$date = $notice_data['date'];
$time = $notice_data['time'];


?>

		<div class="notice notice-success"  style="overflow: hidden;">
	        <strong><?php echo $heading; ?></strong>
	        <span class="pull-right text-success readMore">Read</span>
	        <div class="desc">
	           <p><span><?php echo $time; ?></span> - <span><?php echo $date; ?></span></p>        
	           <p><?php echo $notice; ?></p>        
	        </div>
	    </div>

<?php } ?>


	</div>

	<div id="notice_post" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	    	<form method="post" id="notice_form">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header <span id="notice_msg" style="color: red;"></span></h4>
			      </div>
			      <div class="modal-body">
			      	
			      		<div class="options form-group">
			      			<label class="control-label" for="heading">Heading</label>
							<input name='heading' placeholder="Heading.." class="form-control" cols="100" rows="4" style="border-radius: 5px;">
						</div>
			      		<div class="options form-group">
			      			<label class="control-label" for="notice">Notice</label>
							<textarea name='notice' class="form-control" cols="100" rows="4" style="border-radius: 5px;" placeholder="Write Something on Notice Board"></textarea>
						</div>

			   
						
			      </div>
			      <div class="modal-footer">
			        <button class="btn btn-success pull-right" type="submit"  onclick="return validate_notice()">POST</button>
			      </div>
	 		 </form>
	    </div>

	  </div>
	</div>


<script type="text/javascript">

function validate_notice() {
    var heading=document.forms["notice_form"]["heading"].value;
    if (heading==null || heading=="")
     {
      document.getElementById("notice_msg").innerHTML = " -- Please Write a Heading...";
      return false;
     }

    var notice=document.forms["notice_form"]["notice"].value;
    if (notice==null || notice=="")
     {
      document.getElementById("notice_msg").innerHTML = " -- Please Write a Notice Message...";
      return false;
     }

    var elem = document.getElementById("notice_msg");
    elem.innerHTML = "Posting...";
    elem.style.color = "#168781";

    return( true );

             
}

  
</script>

<script src="js/jquery.min.js"></script>

<script>
    $('#notice_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "post_notice.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#notice_msg').html(data);
            }                   
        }).done(function() {
                $("#notice_form").trigger("reset");
            });
    });
</script>


	<br>
	<br>

	<div class="message col-md-12">
		<div class="sidebar_title text-center">
			<span>Write a Message</span>
		</div>
		<div class="message_content">

			<form method="POST" id="msg_form">

				<div class="">
				  <div class="options">
				    	<select id="" name="year_semester" class="form-control" onchange="fetch_select(this.value);" required>
		                    <option value="" selected hidden>Select Semester</option>
		                    <option value="part_one_odd">Part - I (odd)</option>
		                    <option value="part_one_even">Part - I (Even)</option>
		                    <option value="part_two_odd">Part - II (odd)</option>
		                    <option value="part_two_even">Part - II (Even)</option>
		                    <option value="part_three_odd">Part - III (odd)</option>
		                    <option value="part_three_even">Part - III (Even)</option>
		                    <option value="part_four_odd">Part - IV (odd)</option>
		                    <option value="part_four_even">Part - IV (Even)</option>
		                </select>
				  </div>

				  <div class="options">
				     <select class="form-control form-control-lg" id="receiver" name="roll_no" required></select>
				  </div>
				  <div class="options form-group">
				    	<textarea name="message" class="form-control" cols="100" rows="4" placeholder="Write a Message"></textarea>
				  </div>
				  <div class="form-group" style="margin: 10px;">
				    	<button type="submit" name="send_msg" id ="msg_noti" class="btn btn-info form-control" cols="100" rows="4">Send Message</button>
				  </div>
				  <div class="clearfix"></div>
				</div>
	    	</form>
	    </div>
	</div>

	
</section>

<script type="text/javascript">

function fetch_select(val)

  {
  $.ajax({
    type: 'post',
    url: 'fetch_students.php',
    data: {
      get_option:val
    },
      success: function (response) {
      document.getElementById("receiver").innerHTML=response; 
    }
  });

}

</script>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<script>
    $('#msg_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "sent_msg.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#msg_noti').html(data);
            }                   
        }).done(function() {
                $("#msg_form").trigger("reset");
            });
    });
</script>




</body>
</html>

