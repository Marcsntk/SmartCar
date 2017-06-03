<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/quienessomos.css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>¿Quienes somos?</title>
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
      
    <section id="nosotros">

    
		<article>
        <p>
        	Smart Car es un proyecto de fin de grado llevado por estudiantes del Centre d'Estudis Politècnics, és una idea firme que lleva con nosotros desde hace un par de años.
            <br/><br/>
            Queremos que este proyecto salga adelante y esperamos que algún día pueda salir al mercado y ser algo más que un mero trabajo de clase.
            <br/><br/>
            ¡Deseadnos suerte!
            </p>
            
        </article>

        
    </section>
    
        <section id="video">

        	<iframe width="560" height="315" src="https://www.youtube.com/embed/T3bxZic5r5Y" frameborder="0" allowfullscreen></iframe>

    </section>
    
 	<div id="">

        
    </div>
 
	</body>
</html>
