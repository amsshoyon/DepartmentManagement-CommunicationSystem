<?php
include('server.php'); 





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



<style type="text/css">

.photo_post{
    width: 100%;
    display: inline-block;
}

.photo_post label, input {
  color: #333;
  font: 14px/20px Arial;
}

.photo_post label {
  display: inline-block;
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
.photo_post input,
[type=file] + label {
  border: 1px solid #CCC;
  border-radius: 3px;
  text-align: left;
  padding: 10px;
  width: 100%;
  position: relative;
  margin-top: -20px;
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



<section class="col-md-12">
    <button class="btn btn-info center" data-toggle="modal" data-target="#activity_modal" style="margin-left: 30px;">Add an Activity</button>
</section>

<div id="activity_modal" class="modal fade" role="dialog">
  <div class="modal-dialog"  style="width: 70%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add An Activity</h4>
        <span id="activity_msg"></span>
      </div>

        <form method="post" id="activity_form" action="add_activity.php" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="col-md-6">
                <img  id="output" src="http://placehold.it/320x320" style="width: 100%;">
                <div class="photo_post">
                    <input name="image" id="f02" type="file" placeholder="Activity Photo" onchange="loadFile(event)">
                    <label for="f02">Add Photo</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="activity_title">Activity Title</label>
                        <input id="title" name="title" type="text" value="" placeholder="Activity Title" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="activity_details">Activity Details</label>
                        <textarea class="form-control input-md" rows="8" name="details" placeholder="Activity Details" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="activity_time">Time</label>
                        <input id="time" name="time" type="text" value="" placeholder="Time" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="activity_date">Date</label>
                        <input id="date" name="date" type="text" value="" placeholder="Date" class="form-control input-md" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="activity_location">Location</label>
                        <input id="location" name="location" type="text" value="" placeholder="Location" class="form-control input-md" required>
                    </div>
                </div>
            </div>

          </div>
          <div class="clearfix"></div>
          <br>
          <div class="modal-footer">
            <button type="submit" name="upload" class="btn btn-success" onclick="return validation()">Upload</button>
          </div>

        </form>

    </div>

  </div>
</div>


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



<script type="text/javascript">


function validation() {

    
    var image=document.forms["activity_form"]["image"].value;
    if (image==null || image=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please Insert an Image...";
      return false;
    }

    var title=document.forms["activity_form"]["title"].value;
    if (title==null || title=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please Add a Title...";
      return false;
    }

    var details=document.forms["activity_form"]["details"].value;
    if (details==null || details=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please insert details...";
      return false;
    }

    var time=document.forms["activity_form"]["time"].value;
    if (time==null || time=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please Insert Time...";
      return false;
    }

    var date=document.forms["activity_form"]["date"].value;
    if (date==null || date=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please Insert Date...";
      return false;
    }

    var location=document.forms["activity_form"]["location"].value;
    if (location==null || location=="")
     {
      document.getElementById("activity_msg").innerHTML = "Please Insert Location...";
      return false;
    }

    var elem = document.getElementById("activity_msg");
    elem.innerHTML = "Uploade is Processing";
    elem.style.color = "#168781";

    return( true );

             
}
    
</script>   

<script src="assets/js/jquery.min.js"></script>

<script>
    $('#activity_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "add_activity.php",
            data: $(this).serialize(),      
            success: function(data){
                $('#activity_msg').html(data);
            }                   
        }).done(function() {
                $("#activity_form").trigger("reset");

            });
    });
</script>

<br>
<hr>

<section class="col-md-12">

<?php $activities = mysqli_query($db, "SELECT * FROM activities "); ?>
<?php while($show_activity = mysqli_fetch_array($activities)){ ?>

    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-2'>
        <a class="thumbnail " rel="" href="http://placehold.it/300x320.png">
            <img class="img-responsive" alt="" src="../images/activities/<?php echo $show_activity['image']; ?>" style="width: 350px;height: 250px;" />
            <div class='text-right'>
                <small class='text-muted'><?php echo $show_activity['date']; ?> - <?php echo $show_activity['time']; ?></small>
            </div>
            <div class='' style="border-top: 1px solid #333333;">
                <p class=''><?php echo $show_activity['title']; ?></p>
            </div> 
        </a>
    </div>

<?php } ?>


</section>





<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


</body>
</html>


