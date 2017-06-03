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
				?><div class="menu"><a class="active" href="/PHP/session_destroy.php"><img src="imagenes/exit.png" width="90%" height="90%" /></div><?php
			}
			?>
			<div class="menu"><a href="mailto:andresnicolau@hotmail.com?Subject=SmartCar" target="_top">Contacto</a></div>
			<div class="menu"><a href="preguntas.php">F.A.Q.</a></div>
			<div class="menu"><a href="quienessomos.php">¿Quienes somos?</a></div>	
		</header>
      
    <section id="presentacion">

    
		<article>
        	<h1>¿Qué és Smart Car?</h1>
            
            <p>
            	Smart Car es una herramienta para conductores que te ayudará a llegar a tu destino mientras sabes más sobre tu coche.
            </p>
            
            <center><button onclick="window.open('https://drive.google.com/file/d/0B7pGB9YGuqI3M2FzYncxOU5lQ3M/view?usp=sharing')" target="_blank" class="descargar">¡Consíguela ahora!</button></center>
            
        </article>
        
       	<aside>
   	    	<img src="imagenes/pantallaprincipal.png" width="100%" height="100%" />
        </aside>
        
    </section>
    
 	<div id="instrucciones">
    	<h2>¿Cómo hacerlo funcionar?</h2>
        
        <center><img src="imagenes/instrucciones.png" width="100%" height="100%" /></center></br></br>
        
        <p>
        	Smart Car utiliza la tecnología OBDII para captar información importante de tu coche a tiempo real, como puede ser la temperatura del motor, o cuanto combustible consumes.
            </br></br>
            Nosotros traducimos esa información por ti, mostrandote como se siente tu coche en cada momento, todo esto mientras nuestro sistema de navegación GPS te guía entre el tráfico cotidiano, es fácil y sencillo, Smart Car recordará que información te interesa ver y cuando le hayas dado tu destino se encargará rel desto él sólo.
            </br></br>
            Cuando hayas acabado con tu viaje puedes volver a ver tu recorrido desde el móvil o nuestra web y saber que estilo de conducción tienes, si le pisas demasiado al acelerador o eres bueno economizando combustible.
            </br></br>
            Para que nuestro programa funcione correctamente tendrás que tener instalada la aplicación de <a href="https://play.google.com/store/apps/details?id=org.prowl.torque&hl=es"  target="_blank">Torque</a>, gracias a ella y un adptador OBDII podremos ayudarte a ahorrar combustible.
        </p>
        
    </div>
    
    <footer>
    </br>
    <center>¡Si tienes dudas visita nuestra sección de F.A.Q.!</br>
	<a href="indexEng.php">Pàgina en inglés</a></center>
    </footer> 
    
	</body>
</html>
