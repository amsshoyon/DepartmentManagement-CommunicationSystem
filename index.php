<?php

include('session.php');

if(isset($_SESSION["apee_userid"])){
	header("Location:home.php");
}

?>


<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>APEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

 <?php include('menu.php'); ?>

<style type="text/css">

body {
	background: url(images/ru.jpg) no-repeat center center fixed;
	background-size: 100% 100%;
	height: 100%;
	position: absolute;
	width: 100%;
	background-color: rgb(0,0,0, .9);
	background-blend-mode: overlay;
}
.clearfix:after {
	content: '';
	clear: both;
	display: block;
	height: 0;
	width: 0;
}

ul {
	list-style-type: none;
}

a {
	color: #00c5b9;
	text-decoration: none;
}

h1 {
	color: #FFF;
	text-align: center;
	margin-top: 30px;
	font-weight: 300;
	font-size: 2.4em;
}

/** ---------------------------------------
 * Slider 
 ----------------------------------------*/


.slider-wrapper {
	z-index: 500;
	position: relative;
	width: 90%;
	height: 420px;
	margin-left: 60px;
	background: #FFF;
	border: 5px solid #4b5973;
	overflow: hidden;
}

.slider-wrapper li {
	display: none;
}

.slider-wrapper .current-slide {
	display: block;
}

.slider-shadow {
	width: 100%;
	height: 15px;
	position: relative;
}

.slider-shadow:after, .slider-shadow:before {
	content: '';
	position: absolute;
	background: #171c24;
	height: 100%;
	width: 50%;
	left: 10px;
	top: -20px;
	-webkit-transform: rotate(-4deg);
	-ms-transform: rotate(-4deg);
	-o-transform: rotate(-4deg);
	transform: rotate(-4deg);
	-webkit-box-shadow: 0 0 15px 8px #171c24;
	box-shadow: 0 0 15px 8px #171c24;
}

.slider-shadow:before {
	right: 10px;
	left: auto;
	-webkit-transform: rotate(4deg);
	-ms-transform: rotate(4deg);
	-o-transform: rotate(4deg);
	transform: rotate(4deg);
}

.slider-wrapper img {
	position: absolute;
	max-width: 100%;
	height: auto;
	top: 0;
	left: 0;
}

/**
 * ---[Caption] ---------------------- 
 **/
.slider-wrapper .caption {
	position: absolute;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.65);
	width: 100%;
	padding: 10px;
	color: #FFF;
	-webkit-transform: translateY(100%);
	-ms-transform: translateY(100%);
	-o-transform: translateY(100%);
	transform: translateY(100%);
	opacity: 0;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.slider-wrapper li:hover .caption {
	-webkit-transform: translateY(0);
	-ms-transform: translateY(0);
	-o-transform: translateY(0);
	transform: translateY(0);
	opacity: 1;
}


.slider-wrapper h2 {
	color: #00c5b9;
	font-size: 2em;
	font-weight: 400;
	margin-bottom: 6px;
}

.slider-wrapper p {
	font-size: 1.6em;
	font-weight: 300;
	line-height: 1.4em;
}

/**
 * ---[Botones-Control] ---------------------- 
 **/
.control-buttons {
	margin-top: 15px;
	text-align: left;
	margin-right: 25px;
}

.control-buttons li {
	cursor: pointer;
	display: inline-block;
	background: #424f66;
	text-indent: -99999px;
	height: 12px;
	width: 12px;
	margin: 0 6px;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.control-buttons li.active {
	background: #00c5b9;
}

.authors {
	text-align: center;
	color: #7a8699;
	display: block;
	font-size: 1.6em;
	font-weight: 300;
	margin-top: 80px;
	font-size: 300;
}

/** ---------------------------------------
 * Responsive 
 ----------------------------------------*/
 @media only screen and (max-width: 825px) {
 	.container {
 		width: 500px;
 	}

 	.slider-wrapper {
 		height: 260px;
 	}
 }

 @media only screen and (max-width: 535px) {
 	.container {
 		padding: 5px;
 		width: 100%;
 		margin: 40px 0 0 0;
 	}

 	.slider-wrapper {
 		height: 200px;
 	}
	
 	.slider-wrapper .caption {
 		display: none;
 	}

 }

 @media only screen and (max-width: 410px) {
 	.slider-wrapper {
 		height: 160px;
 	}
 }
</style>

	<section id="slider" class="col-md-6" style="margin-top: 180px;">
		<ul class="slider-wrapper">
		<li class="current-slide">
			<img src="images/slider/1.jpg" title="" alt="" style="width: 100%; height: 100%;">

			<div class="caption">
				<h2 class="slider-title">University Of Rajshahi</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
			</div>
		</li>

		<li>
			<img src="images/slider/2.jpg" title="" alt="" style="width: 100%; height: 100%;">

			<div class="caption">
				<h2 class="slider-title">Applied Physics & Electronic Engineering</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
			</div>
		</li>

		<li>
			<img src="images/slider/3.jpg" title="" alt="" style="width: 100%; height: 100%;">

			<div class="caption">
				<h2 class="slider-title">Applied Physics & Electronic Engineering</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
			</div>
		</li>

		<li>
			<img src="images/slider/4.jpg" title="" alt="" style="width: 100%; height: 100%;">

			<div class="caption">
				<h2 class="slider-title">Applied Physics & Electronic Engineering</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
			</div>
		</li>
		</ul>
		<!-- Sombras -->
		<div class="slider-shadow"></div>
		
		<ul id="control-buttons" class="control-buttons pull-right"></ul>
	</section>

<section class="col-md-6" style="margin-top: 150px;color: #fff;" >
	<h3>Department of</h3>
	<h2 style="color: red">Applied Physics &Electronic Engineering</h2>
	<h3 style="color: red"><i>University Of Rajshahi</i></h3>
	<h3 style="color: red"><i>Motihar , Rajshahi</i></h3>
	<p>The APEE department began its journey in July 1966. The mission of the department is to produce sincere, dutiful and caring individuals with required professional skills so that they can competently serve the nation and render services to the international communities. To realise the vision, the curricular, co-curricular and extra-curricular activities of the department are updated on regular basis.</p>

	<p>Now the department has a team of qualified and professionally skilled academics who are actively engaged in teaching and research within and outside the country. Students entering this department leave with self-confidence on the subject matter to meet the demand and challenge of the job market.</p>
	<p>The historical background of the creation of Department of Applied Physics and Electronic Engineering (APEE) goes back to mid sixties when an urgent need to establish a department of Applied Physics and Electronics (APE) was felt. As a matter of fact APE began its journey in 1966 with a few teaching staff and some 20 postgraduate students under the leadership of the late Professor M. R. Sarkar (later became the Vice-Chancellor of this University). Undergraduate honors course was introduced in 1972. As the only other center of the Applied Physics and Electronics in the country, APE gradually rose to become a full-fledged and prestigious center of excellence. In 2006 the name of the department has been changed to Applied Physics and Electronic Engineering. Today APEE has a team of highly qualified and professionally well experienced academic members who are actively engaged in research within and outside the country. APEE boasts of having close research links with the institutions of countries like Sweden, China and Vietnam. Students entering APEE leave with self-confidence on the subject to meet any challenges demanded by their jobs.</p>
</section>
	
	
<script type="text/javascript">
	/**
 * @Titulo: Slider Responsivo
 * @Autor: Creaticode
 * @URL: http://creaticode.com 
 */
$(function() {
	/** -----------------------------------------
	 * Modulo del Slider 
	 -------------------------------------------*/
	 var SliderModule = (function() {
	 	var pb = {};
	 	pb.el = $('#slider');
	 	pb.items = {
	 		panels: pb.el.find('.slider-wrapper > li'),
	 	}

	 	// Interval del Slider
	 	var SliderInterval,
	 		currentSlider = 0,
	 		nextSlider = 1,
	 		lengthSlider = pb.items.panels.length;

	 	// Constructor del Slider
	 	pb.init = function(settings) {
	 		this.settings = settings || {duration: 8000};
	 		var items = this.items,
	 			lengthPanels = items.panels.length,
	 			output = '';

	 		// Insertamos nuestros botones
	 		for(var i = 0; i < lengthPanels; i++) {
	 			if(i == 0) {
	 				output += '<li class="active"></li>';
	 			} else {
	 				output += '<li></li>';
	 			}
	 		}

	 		$('#control-buttons').html(output);

	 		// Activamos nuestro Slider
	 		activateSlider();
	 		// Eventos para los controles
	 		$('#control-buttons').on('click', 'li', function(e) {
	 			var $this = $(this);
	 			if(!(currentSlider === $this.index())) {
	 				changePanel($this.index());
	 			}
	 		});

	 	}

	 	// Funcion para activar el Slider
	 	var activateSlider = function() {
	 		SliderInterval = setInterval(pb.startSlider, pb.settings.duration);
	 	}

	 	// Funcion para la Animacion
	 	pb.startSlider = function() {
	 		var items = pb.items,
	 			controls = $('#control-buttons li');
	 		// Comprobamos si es el ultimo panel para reiniciar el conteo
	 		if(nextSlider >= lengthSlider) {
	 			nextSlider = 0;
	 			currentSlider = lengthSlider-1;
	 		}

	 		controls.removeClass('active').eq(nextSlider).addClass('active');
	 		items.panels.eq(currentSlider).fadeOut('slow');
	 		items.panels.eq(nextSlider).fadeIn('slow');

	 		// Actualizamos los datos del slider
	 		currentSlider = nextSlider;
	 		nextSlider += 1;
	 	}

	 	// Funcion para Cambiar de Panel con Los Controles
	 	var changePanel = function(id) {
	 		clearInterval(SliderInterval);
	 		var items = pb.items,
	 			controls = $('#control-buttons li');
	 		// Comprobamos si el ID esta disponible entre los paneles
	 		if(id >= lengthSlider) {
	 			id = 0;
	 		} else if(id < 0) {
	 			id = lengthSlider-1;
	 		}

	 		controls.removeClass('active').eq(id).addClass('active');
	 		items.panels.eq(currentSlider).fadeOut('slow');
	 		items.panels.eq(id).fadeIn('slow');

	 		// Volvemos a actualizar los datos del slider
	 		currentSlider = id;
	 		nextSlider = id+1;
	 		// Reactivamos nuestro slider
	 		activateSlider();
	 	}

		return pb;
	 }());

	 SliderModule.init({duration: 4000});

});
</script>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/notification.js"></script>



<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>

