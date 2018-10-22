

<!DOCTYPE html>
<html lang="zxx">

<head>

</head>

<body>




<div id="contact" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
					
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Write a Message.....</h4>
			</div>
			<div class="modal-body">


				<div id="" class="contact">
					<div class="contact_body">
						<div class="row">
							<div class="contact_message">
								<div class="">  
								  <form id="myform" action="" method="post" >
									<fieldset>
									  <input type="text" name="name" value="Plasma Laboratory, University of Rajshahi" tabindex="1" required>
									  
									</fieldset>
									<fieldset>
									  <input type="email" class="form-control text-field-box" name="email" id="email" placeholder="Receiver's Email" data-rule="email"  tabindex="2" required/>
									</fieldset>
									<fieldset>
									  <input placeholder="Message subject..." type="text" name="subject" value="" tabindex="4" required>
									  
									</fieldset>
									<fieldset>
									  <textarea type="text" name="message" placeholder="Write a message..." id="" cols="150" rows="8" value="" required></textarea>
									</fieldset>
									<fieldset>
									  <button onclick="return validateform()" name="submit" type="submit" id="contact-submit" class="submit_btn">Submit</button>
									</fieldset>
									<div id='result'></div>
								  </form>
								</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>

			</div>

		</div>
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

	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/js/jquery.js"></script>

</body>

</html>