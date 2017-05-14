<?php
	session_start();
	$_SESSION["idUsuario"] = "";
	session_unset();

	
	session_destroy();
	
	header("Location:https://smartcar.000webhostapp.com");
	
?>