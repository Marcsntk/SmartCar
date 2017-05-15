<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/logueado.css" />
         <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Logueado</title>
    </head>

	<body>
	
		
		<header>
			<div class="logo"><img border="0" src="imagenes/logo.png" width="100%" height="100%"></div>
			<div class="title-left"><a href="index.php">Smart Car</div>
			<div class="user"><a class="active" href="loguear.php"><img src="imagenes/usuario.png" width="100%" height="100%" /></a> </div>
			<div class="menu"><a href="mailto:andresnicolau@hotmail.com?Subject=SmartCar" target="_top">Contacto</a></div>
			<div class="menu"><a href="preguntas.php">F.A.Q.</a></div>
			<div class="menu"><a href="quienessomos.php">¿Quienes somos?</a></div>
		</header>  

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<div id="banner">

		</div>

		  <nav id='nav_bar'> 
		  <center>
			<ul class='nav_links'>
			  <li><a href="misdatos.php">Mis datos</a></li>
			  <li><a href="mistrayectos.php">Mis trayectos</a></li>
			  <li><a href="misestadisticas.php">Mis estadísticas</a></li>
			</ul>
			 </center>
		  </nav> 


		<div id='body_div'>
			
		</div>
		<div id='body_div'>
			<center><h2>Velocidad a través de la ruta</h2></center></br>

			<script src="Chart.js"></script>

			<canvas id="chart-area4" width="600" height="300"></canvas>

			<script>
				var lineChartData = {
					labels : [ ],
					datasets : [
						{
							label: "Primera serie de datos",
							fillColor : "rgba(220,220,220,0.2)",
							strokeColor : "#6b9dfa",
							pointColor : "#1e45d7",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(220,220,220,1)",
							data : [ ]
						}
					]

				}

				var ctx4 = document.getElementById("chart-area4").getContext("2d");

				window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
			</script>
		</div>

		<div id='body_div'>
			<center><h2>Temperatura refrigerante para 1ª marcha (ºC)</h2></center></br>

			<script src="Chart.js"></script>

			<canvas id="chart-area1" width="600" height="300"></canvas>

			<script>
				var lineChartData = {
					labels : ["1.000 RPM","1.500 RPM","2.000 RPM","2.500 RPM","3.000 RPM","3.500 RPM","4.000 RPM", "4.500 RPM", "5.000 RPM", "5.500 RPM", "6.500 RPM", "7.000 RPM"],
					datasets : [
						{
							label: "Primera serie de datos",
							fillColor : "rgba(220,220,220,0.2)",
							strokeColor : "#6b9dfa",
							pointColor : "#1e45d7",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(220,220,220,1)",
							data : [ 79, 80, 82, 85, 87, 88, 89, 90, 92,93 ,95 , 95]
						}
					]

				}

				var ctx1 = document.getElementById("chart-area1").getContext("2d");

				window.myPie = new Chart(ctx1).Line(lineChartData, {responsive:true});
			</script>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
			  
			  $(window).scroll(function () {
				  //if you hard code, then use console
				  //.log to determine when you want the 
				  //nav bar to stick.  
				  console.log($(window).scrollTop())
				if ($(window).scrollTop() > 90) {
				  $('#nav_bar').addClass('navbar-fixed');
				}
				if ($(window).scrollTop() < 91) {
				  $('#nav_bar').removeClass('navbar-fixed');
				}
			  });
			});
		</script>
		
	</body>
</html>
