<?php
	session_start();
	//desasignar todas las variables de la sesión
	$_SESSION["idUsuario"] = "";
	session_unset();

	//destruir la sesión
	session_destroy();
	
	header("Location:https://smartcar.000webhostapp.com");
	
?>