<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/logueado.css" />
         <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Mis Datos</title>
    </head>

	<body>
		<?php
			session_start();	
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
				?><div class="menu"><a href="/PHP/session_destroy.php">Cerrar Sesión</a></div><?php
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
		
		<?php
			echo "Email: ".$_SESSION["idUsuario"].".<br>";
			echo "Nombre: ".$_SESSION["nombre"]."."; 
		?>


		
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