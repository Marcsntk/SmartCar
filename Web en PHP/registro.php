<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/registro.css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Registro</title>
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
      
 <center>
    <section id="loguearusuario">
    	<center>
        <p><h1></br>Registro nuevo usuario</br></h1></p>
		<form action="/PHP/registerweb.php" method="post" role="form">
              <section id="registrousuario">
            <input type="text" placeholder="Usuario" name="name" required>
              </section>
              <section id="registrocontrasena">
              <input type="password" placeholder="Contraseña" name="password" required>
              </section>
              <section id="repetirregistrocontrasena">
              <input type="password" placeholder="Repetir contraseña" name="passwordr" required>
              </section>
              <section id="registroemail">
            <input type="text" placeholder="E-mail" name="email" required>
              </section>
              <button type="submit">Crear usuario</button>
		</form>
        </center>
    </section>
 </center>
	</body>
</html>
