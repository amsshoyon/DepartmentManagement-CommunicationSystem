<?php
	include ('server.php');

	$inbox = mysqli_query($db, "SELECT * FROM message");

		//delete data
	if(isset($_GET['dell_inbox'])){
		$id = $_GET['dell_inbox'];
		mysqli_query($db, "DELETE FROM message WHERE id=$id");
		header('location: inbox.php');
	}

	$sent_msg = mysqli_query($db, "SELECT * FROM sent_msg");

	if(isset($_GET['dell_sent'])){
		$id = $_GET['dell_sent'];
		mysqli_query($db, "DELETE FROM sent_msg WHERE id=$id");
		header('location: inbox.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APEE - DashBoard</title>

    <!-- CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/inbox.css">
</head>	
<body>


<div id="exTab3" class="">	
	<ul  class="nav nav-pills">
		<li class="active">
			<a  href="#1bb" data-toggle="tab">Inbox</a>
		</li>
		<li>
			<a href="#2bbb" data-toggle="tab">Sent</a>
		</li>
		<li>
			<a href="#3b" data-toggle="tab">Drafts</a>
		</li>
		<li>
			<a data-toggle="modal" data-target="#contact"><span class="glyphicon glyphicon-envelope"></span> Write Message</a>
		</li>
	</ul>
	<?php include('message.php'); ?>

	<div class="tab-content clearfix">

		<!--      Inbox        -->
		<div class="tab-pane active" id="1bb">
			<h3>All Messages</h3>
			<div class="tab-pane" id="">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


					<?php while($row_inbox = mysqli_fetch_array($inbox)){ ?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#inbox-collapse<?php echo $row_inbox['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
										<div class="inbox clearfix">
											<div class="col-md-9">
												<span class="glyphicon glyphicon-star-empty margin-right"></span>
												<span class="subject"><?php echo $row_inbox['name'] ?></span> 
												<small class="text-muted" style="overflow: visible;">- <?php echo $row_inbox['email'] ?>.....</small>
											</div>
											<div class="">
												<div class="pull-right">
													<span class="badge">Mark as Read</span> 
													<span class="badge margin-left">Time</span>
													<a href = "inbox.php?dell_inbox=<?php echo $row_inbox['id']; ?>" onclick="return deleletconfig()"><span class="glyphicon glyphicon-trash margin-left"></span></a>
												</div>
											</div>
											
										</div>
									</a>
								</h4>
							</div>
							<div id="inbox-collapse<?php echo $row_inbox['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<span style="color: #009FFF;"><?php echo $row_inbox['subject'] ?></span><br><br>
									<?php echo $row_inbox['msg'] ?>
								</div>
							</div>
						</div>
					<?php } ?>



				</div>
			</div>

		</div>
		<!--      /Inbox        -->



		<!--      Sent Messages        -->
		<div class="tab-pane" id="2bbb">
			<h3>Sent Messages</h3>
			<div class="tab-pane" id="">
				<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">


					<?php while($row_sent = mysqli_fetch_array($sent_msg)){ ?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion2" href="#sent-collapse<?php echo $row_sent['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
										<div class="inbox clearfix">
											<div class="col-md-9">
												<span class="glyphicon glyphicon-star-empty margin-right"></span>
												<span class="subject"><?php echo $row_sent['name'] ?></span> 
												<small class="text-muted" style="overflow: visible;">- <?php echo $row_sent['email'] ?>.....</small>
											</div>
											<div class="">
												<div class="pull-right">
													<span class="badge">Mark as Read</span> 
													<span class="badge margin-left">Time</span>
													<a href = "inbox.php?dell_sent=<?php echo $row_sent['id']; ?>" onclick="return deleletconfig()"><span class="glyphicon glyphicon-trash margin-left"></span></a>
												</div>
											</div>
											
										</div>
									</a>
								</h4>
							</div>
							<div id="sent-collapse<?php echo $row_sent['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<span style="color: #009FFF;"><?php echo $row_sent['subject'] ?></span><br><br>
									<?php echo $row_sent['msg'] ?>
								</div>
							</div>
						</div>
					<?php } ?>



				</div>
			</div>

		</div>




		
		<!--     / Sent Messages        -->




		<!--     Message Draft        -->
		<div class="tab-pane" id="3b">
			<h3>Drafts</h3>
			<div class="tab-pane" id="">
				<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion3" href="#draft-collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<div class="inbox clearfix">
										<div class="col-md-9">
											<span class="glyphicon glyphicon-star-empty margin-right"></span>
											<span class="subject">Nice work on the docs for lastest version</span> 
											<small class="text-muted">- Joe, I just reviewed the last...</small>
										</div>
										<div class="">
											<div class="pull-right">
												<span class="badge">Mark as Read</span> 
												<span class="badge margin-left">12:10 AM</span>
												<span class="glyphicon glyphicon-trash margin-left"></span>
											</div>
										</div>
										
									</div>
								</a>
							</h4>
						</div>
						<div id="draft-collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<p><p><br /><br /><br /><br /><br /></p></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--     /Message Draft        -->



		<!--      Write Messages        -->

		<!--      /Write Messages        -->
	</div>
</div>





<script type="text/javascript">
	function validateform() {

	var a=document.forms["myform"]["name"].value;
	if (a==null || a=="")
	 {
	  document.getElementById("result").innerHTML = " Error : Name field must be filled...";
	  return false;
	 }
	 
	var x = document.forms["myform"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
	
	
	var b=document.forms["myform"]["email"].value;
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
	

	var c=document.forms["myform"]["subject"].value;
	if (c==null || c=="") {
	  document.getElementById("result").innerHTML = " Error : Subject field must be filled...";
	  return false;
	}
	var d=document.forms["myform"]["message"].value;
	if (d==null || d=="") {
	  document.getElementById("result").innerHTML = " Error : Please write a message .........";
	  return false;
	}
	var elem = document.getElementById("result");
	elem.innerHTML = "Message is sending";
	elem.style.color = "#00BEFD";


	return( true );
	}
	
</script>	
	
	
<script>
	$('#myform').submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "contact-form.php",
			data: $(this).serialize(),		
			success: function(data){
				$('#result').html(data);
			}					
		}).done(function() {
				$("#myform").trigger("reset");
			});
	});
</script>


<script>
	function deleletconfig(){

	var del=confirm("Are you sure you want to delete this record?");
	if (del==true){
	   alert ("record deleted")
	}
	return del;
	}
</script>

<!-- js -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>