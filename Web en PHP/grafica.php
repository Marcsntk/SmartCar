<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/logueado.css" />
         <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Mis Trayectos</title>
    </head>

	<body>
		<?php
			require "PHP/init.php";
			session_start();
			$tipo=$_GET["tipo"];
			$sql = "SELECT Trip_Distance,".$tipo." FROM `torque` WHERE `eMail`='".$_SESSION["idUsuario"]."' AND `IDFile` ='".$_SESSION["IDFile"]."'  ORDER BY Row ASC";
			$result = mysqli_query($con, $sql);
			$result2 = mysqli_query($con, $sql);
		?>
		
		<header>
			<div class="logo"><img border="0" src="imagenes/logo.png" width="100%" height="100%"></div>
			<div class="title-left"><a href="index.php">Smart Car</div>
			<?php
			if ($_SESSION["idUsuario"] == "") {
				?><div class="user"><a class="active" href="loguear.php"><img src="imagenes/usuario.png" width="100%" height="100%" /></a> </div><?php
			}
			else
			{
				?><div class="user"><a class="active" href="misdatos.php"><img src="imagenes/usuario.png" width="100%" height="100%" /></a> </div><?php
			}
			?>
			<?php
			if ($_SESSION["idUsuario"] != "") {
				?><div class="user"><a class="active" href="/PHP/session_destroy.php"><img src="imagenes/exit.png" width="100%" height="100%" /></a> </div><?php
			}
			?>
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
		
		<div><a class="active" href="ruta.php?IDFile=<?php echo $_SESSION["IDFile"]?>"><img src="imagenes/back.png" width="3%" height="3%" /></div>		
		<div id='body_div'>
			<center><h2><?php echo $tipo ?> a través de la ruta</h2></center></br>
			
			<script src="Chart.js"></script>

			<canvas id="chart-area4" width="150" height="50"></canvas>

			<script>
				var lineChartData = {
					labels : [<?php
						while($row = mysqli_fetch_array($result)){
							echo "".$row["Trip_Distance"].",";
						}
					?> ],
					datasets : [
						{
							label: "Primera serie de datos",
							fillColor : "rgba(220,220,220,0.2)",
							strokeColor : "#6b9dfa",
							pointColor : "#1e45d7",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(220,220,220,1)",
							data : [<?php
								while($row2 = mysqli_fetch_array($result2)){
									echo "".$row2[1].",";
								}
							?>  ]
						}
					]
				}
				var ctx4 = document.getElementById("chart-area4").getContext("2d");
				window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
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