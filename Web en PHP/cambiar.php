<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/registro.css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Cambiar contraseña</title>
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
      
 <center>
    <section id="loguearusuario">
    	<center>
        <p><h1></br>Cambiar contraseña</br></h1></p>
		<form action="/PHP/cambiarcontra.php" method="post" role="form">
              <section id="registrousuario">
				<input type="text" placeholder="Contraseña antigua" name="passwordold" required>
              </section>
              <section id="registrocontrasena">
				<input type="password" placeholder="Contraseña nueva" name="passwordnew" required>
              </section>
              <section id="repetirregistrocontrasena">
				<input type="password" placeholder="Repetir contraseña" name="passwordcheck" required>
              </section>
              </br></br>
              <button type="submit">Cambiar contraseña</button>
		</form>
        </center>
    </section>
 </center>
	</body>
</html>
