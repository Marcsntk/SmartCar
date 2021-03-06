<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/base.css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Página principal</title>
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
				?><div class="user"><a class="active" href="/PHP/session_destroy.php"><img src="imagenes/exit.png" width="100%" height="100%" /></a> </div><?php
			}
			?>
			<div class="menu"><a href="mailto:andresnicolau@hotmail.com?Subject=SmartCar" target="_top">Contacto</a></div>
			<div class="menu"><a href="preguntas.php">F.A.Q.</a></div>
			<div class="menu"><a href="quienessomos.php">¿Quienes somos?</a></div>	
		</header>
    
    
      
    <section id="presentacion">

    
		<article>
        	<h1>What is Smart Car?</h1>
            
            <p>
            	Smart Car is a tool for drivers that will help you to reach your destination while you know more about your car.
            </p>
            
            <center><button onclick="window.open('https://drive.google.com/file/d/0B7pGB9YGuqI3M2FzYncxOU5lQ3M/view?usp=sharing')" target="_blank" class="descargar">Get it now!</button></center>
            
        </article>
        
       	<aside>
   	    	<img src="imagenes/pantallaprincipal.png" width="100%" height="100%" />
        </aside>
        
    </section>
    
 	<div id="instrucciones">
    	<h2>How to make it work</h2>
        
        <center><img src="imagenes/instruccionesENG.png" width="100%" height="100%" /></center></br></br>
        
        <p>
        	Smart Car uses the technology OBDII to get important information form your car in real time, it can be the temperature of the motor or how much fuel it uses.
			</br></br>
            We translate that information for you, showing how the car feels in every moment, all that while our GPS system of navigation guides you through the daily traffic - its easy and simple - Smart Car will remember what information you want to see and when you have given your destiny it will take care of the rest by itself.
			</br></br>
            When you have finished your trip you can see your route from the mobile or from our Website and know what your driving style is, if you hit the throttle too much or you're good at saving fuel.
			</br></br>
			For our program to work properly you will have to have the <a href="https://play.google.com/store/apps/details?id=org.prowl.torque&hl=es"  target="_blank">Torque</a> application installed, thanks to it and an OBDII adapter you can save fuel.
		</p>
        
    </div>
    
    <footer>
    </br>
    <center>If you have any doubt, visit our F.A.Q. section!</br>
	<a href="indexEng.php">Website in spanish</a></center></center>
    </footer> 
    
	</body>
</html>
