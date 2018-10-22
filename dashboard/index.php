<?php 

include('server.php');

	$user_temp = $_SESSION["sess_apeeadmin"];
	$sql_query = "SELECT id FROM admin WHERE username='$user_temp';";

	$result = mysqli_query($db, $sql_query);
	$row = mysqli_fetch_array($result);
	$id = $row["id"]; 
	
	
	$rec = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$firstname = $record['firstname'];
	$lastname = $record['lastname'];
	$username = $record['username'];
	$email = $record['email'];
	$phone = $record['phone'];
	$image = $record['image'];
	$id = $record['id'];

//$message_num = mysqli_query($db, "SELECT * FROM message ");
//$num_rows = mysqli_num_rows($message_num);



$my_iframe="home.php";
$inbox="";

$page_elements="";

$home_panal ="";
$page_slider   ="";
$favourits  ="";
$featured = "";
$recent  ="";


$all_books ="";

if(isset($_GET['id'])){
	
	$myid = $_GET['id'];
	
	if($myid=="dashboard"){$my_iframe="home.php";$dashboard="active";}
	elseif($myid=="my_profile"){$my_iframe="my_profile.php";$my_profile="active";}
	elseif($myid=="security"){$my_iframe="security.php";}
	elseif($myid=="inbox"){$my_iframe="inbox.php";}

	elseif($myid=="courses"){$my_iframe="courses.php";$courses="active";$page_elements="active open";}
	elseif($myid=="teachers"){$my_iframe="teachers.php";$teachers="active";$page_elements="active open";}
	elseif($myid=="students"){$my_iframe="students.php";$students="active";$page_elements="active open";}
	elseif($myid=="results"){$my_iframe="results.php";$results="active";$page_elements="active open";}
	elseif($myid=="exam_reg"){$my_iframe="exam_reg.php";$exam_reg="active";$page_elements="active open";}
	elseif($myid=="activities"){$my_iframe="activities.php";$activities="active";$page_elements="active open";}
	else{$my_iframe="home.php";}
	
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>APEE - DashBoard</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/common.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<script src="assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="pull-left">
					<a href="index.php?id=home" class="navbar-brand">
						<small>
							<span class="div_hide">Applied Physics and Electronic Engineering</span>
						</small>
					</a>
				</div>

				<div class="pull-right" role="navigation">
					<ul class="ace-nav">
						

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-navbar dropdown-menu dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Messages
								</li>

								<li class="dropdown-footer">
									<a href="index.php?id=inbox">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/admin/<?php echo $image;?>" alt="Admin's Photo" />
								<span class="div_hide">
									<small>Welcome,</small>
									<?php echo $_SESSION["sess_apeeadmin"];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a href="index.php?id=my_profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="index.php?id=security">
										<i class="ace-icon fa fa-user"></i>
										Security
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<span>Admin Panal</span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="<?php echo($dashboard); ?>">
						<a href="index.php?id=dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="<?php echo($my_profile); ?>">
						<a href="index.php?id=my_profile">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> My Profile </span>
						</a>
					</li>

					<li class="<?php echo($page_elements); ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Page &amp; Elements
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php echo($courses); ?>">
								<a href="index.php?id=courses">
									<i class="menu-icon fa fa-caret-right"></i>
										Courses
								</a>
							</li>

							<li class="<?php echo($teachers); ?>">
								<a href="index.php?id=teachers">
									<i class="menu-icon fa fa-caret-right"></i>
										Teachers
								</a>
							</li>

							<li class="<?php echo($students); ?>">
								<a href="index.php?id=students">
									<i class="menu-icon fa fa-caret-right"></i>
										Students
								</a>
							</li>

							<li class="<?php echo($results); ?>">
								<a href="index.php?id=results">
									<i class="menu-icon fa fa-caret-right"></i>
										Results
								</a>
							</li>

							<li class="<?php echo($exam_reg); ?>">
								<a href="index.php?id=exam_reg">
									<i class="menu-icon fa fa-caret-right"></i>
										Exam Registration
								</a>
							</li>

							<li class="<?php echo($activities); ?>">
								<a href="index.php?id=activities">
									<i class="menu-icon fa fa-caret-right"></i>
										Activities
								</a>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> More Pages </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="">
								<a href="http://www.ru.ac.bd/" target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									University of Rajshahi
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="http://www.ru.ac.bd/apee/"  target="_blank">
									<i class="menu-icon fa fa-caret-right"></i>
									Applied Physics & Electronic Engineering
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						
						
						
<!-------------------------------------- page content start ------------------------------------------>


<iframe src="<?php echo($my_iframe); ?>" frameborder="0" scrolling="no"  width="100%" height="5000px;" style="margin:0;padding:0;"></iframe>


<!---------------------------------------------------- page content end ----------------------------------------->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Copyright</span>
							 &copy; WebSpidy
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-change-style').on(ace.click_event, function() {
					var toggler = $('#menu-toggler');
					var fixed = toggler.hasClass('fixed');
					var display = toggler.hasClass('display');
					
					if(toggler.closest('.navbar').length == 1) {
						$('#menu-toggler').remove();
						toggler = $('#sidebar').before('<a id="menu-toggler" data-target="#sidebar" class="menu-toggler" href="#">\
							<span class="sr-only">Toggle sidebar</span>\
							<span class="toggler-text"></span>\
						 </a>').prev();
			
						 var ace_sidebar = $('#sidebar').ace_sidebar('ref');
						 ace_sidebar.set('mobile_style', 2);
			
						 var icon = $(this).children().detach();
						 $(this).text('Hide older Ace toggle button').prepend(icon);
						 
						 $('#id-push-content').closest('div').hide();
						 $('#id-push-content').removeAttr('checked');
						 $('.sidebar').removeClass('push_away');
					 } else {
						$('#menu-toggler').remove();
						toggler = $('.navbar-brand').before('<button data-target="#sidebar" id="menu-toggler" class="three-bars pull-left menu-toggler navbar-toggle" type="button">\
							<span class="sr-only">Toggle sidebar</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>\
						</button>').prev();
						
						 var ace_sidebar = $('#sidebar').ace_sidebar('ref');
						 ace_sidebar.set('mobile_style', 1);
						
						var icon = $(this).children().detach();
						$(this).text('Show older Ace toggle button').prepend(icon);
						
						$('#id-push-content').closest('div').show();
					 }
			
					 if(fixed) toggler.addClass('fixed');
					 if(display) toggler.addClass('display');
					 
					 $('.sidebar[data-sidebar-hover=true]').ace_sidebar_hover('reset');
					 $('.sidebar[data-sidebar-scroll=true]').ace_sidebar_scroll('reset');
			
					 return false;
				});
				
				$('#id-push-content').removeAttr('checked').on('click', function() {
					$('.sidebar').toggleClass('push_away');
				});
			});
		</script>
	</body>
</html>
