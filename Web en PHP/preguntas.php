<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/preguntas.css" />
		<link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Preguntas frecuentes</title>
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


      

 	 <div id="bloque">
        <button class="accordion1">¿Qué es el OBD?</button>
    <div class="panel">
      <p>OBD es un conector de diagnosis que se instala en los coches europeos desde antes del 2000.</br></br>
      Es parecido a los conectores que teníamos antiguamente en los VHS y los televisores, pero en este caso conectamos un ordenador, este ordenador especializado nos permite leer y escribir  de la Línea Can Bus , permitiéndonos obtener información como la temperatura del refrigerante, si hay alguna pieza averiada... </br></br>Esto ayuda mucho a los mecánicos a saber dónde están los fallos, aunque no siempre acierta.
      </p>
    </div>
        <button class="accordion">¿Línea Can bus?</button>
    <div class="panel">
      <p>La Línea Can Bus es una red interna del coche que permite la transmisión de información.</br></br>
      Debemos imaginarnoslo como si tuviesemos una habitación con muchos ordenadores, los ordenadores serían los sensores y actuadores del coche, y para conectar cada ordenador tuviesemos que tirar un cable entre ellos.</br></br>
      Esto está muy bien si tenemos dos Pc's, ¿pero que pasará cuando tengamos 200? Esto supuso un problema y los coches antes de la Línea Can podían tener 9km de cable.</br></br>
      Para solucionarlo se instaló un solo cable que atraviesa el coche y los sensores y actuadores vierten y recogen de allí la información de forma digital, menos cables significa menos peso, lo cual se traduce en menor consumo. ¡Yai por la tecnología!
      </p>
    </div>
    
    
            <button class="accordion">¿Por qué usar Torque?</button>
    <div class="panel">
      <p>Torque es una aplicación diseñada únicamente para ver información de nuestro coche, nosotros estamos desarrollando esta aplicación como un proyecto escolar y tenemos recursos límitados.</br></br>
      Usar Torque nos permite invertir más tiempo en la satisfacción de nuestros usuarios, en vez de usarlo para desarrollar código interno.
      </p>
    </div>
        <button class="accordion2">¿Cómo recopilais esa información y quién la puede ver?</button>
    <div class="panel">
      <p>Hoy en día se venden unos dispositivos OBD muy sencillos, no permiten tareas profesionales pero si leer el estado de nuestro coche, para un uso diario es perfecto.</br></br>
      Este dispositivo nos cabe en la palma de la mano y se conecta a nuestro móviles via Bluetooth, de manera que es simple y cómodo de usar. Además no suelen superar los 10€, lo que los hace ideales para cualquiera que tenga un interés por saber más.</br></br>
      La información que obtenemos se sube a nuestros servidores para que puedas verla cómodamente desde tu escritorio, pero no te preocupes, esta información solo la puedes ver tu.
      </p>
    </div>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;
		
		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				this.classList.toggle("active");
				this.nextElementSibling.classList.toggle("show");
		  }
		}
    </script>
    	<script>
		var acc = document.getElementsByClassName("accordion1");
		var i;
		
		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				this.classList.toggle("active");
				this.nextElementSibling.classList.toggle("show");
		  }
		}
    </script>
        	<script>
		var acc = document.getElementsByClassName("accordion2");
		var i;
		
		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				this.classList.toggle("active");
				this.nextElementSibling.classList.toggle("show");
		  }
		}
    </script>
  </div>


 
	</body>
</html>
