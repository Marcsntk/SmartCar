<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Estilos/loguear.css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
        <title>Login</title>
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
          <form action="/PHP/loginweb.php" method="post" role="form">
          <div class="usuario"><img src="imagenes/usuario_redondo.png" width="250px" height="250px" /></div>
              <section id="loginusuario">
            <input type="text" placeholder="Email" name="email" autofocus required>
              </section>
              <section id="logincontrasena">
              <input type="password" placeholder="Contraseña" name="password" required>
              </section>
              <button type="submit">Entrar</button>
            <input type="checkbox" checked="checked"> Recuérdame</div>
        	</br>
            </br>
            	<section id="recuperar">
					<p><a class="contrasena" href="#">¿Has olvídado la contraseña?</a></p>
            	</section>
                
          </form>
		  <form action="registro.php">
			<button type="submit" id="registro">¡Regístrate!</button>
		  </form>
        </center>
    </section>
 </center>
	</body>
</html>
