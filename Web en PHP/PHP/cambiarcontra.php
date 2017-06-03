<?php 
	error_reporting(0);
	//para obtener los datos de la conexión a la base de datos
	require "init.php";
	
	//Assignar las variables de las contraseñas encriptandolas con el metodo md5
	$passwordold=md5($_POST["passwordold"]);
	$passwordnew=md5($_POST["passwordnew"]);
	$passwordcheck=md5($_POST["passwordcheck"]);
	
	//iniciamos la sesión
	session_start();
	//sentencia sql para comprovar la contraseña antigua es correcta.
	$sql = "SELECT * FROM `usuario` WHERE `eMail`='".$_SESSION["idUsuario"]."' AND `Contrasena`='".$passwordold."';";
	
	//"ejecutamos" la sentencia
	$result = mysqli_query($con, $sql);
	
	//si ha encontrado resultados dos devolverá un booleano
	while($row = mysqli_fetch_array($result)){
		$trovat=true;
	}

	if($trovat){
		if($passwordnew == $passwordcheck){
			//sentencia sql para hacer "update" al usuario y cambiar la contraseña
			$sql2 = "UPDATE `usuario` SET `Contrasena`='".$passwordnew."' WHERE `eMail`='".$_SESSION["idUsuario"]."';";
			mysqli_query($con, $sql2);
			//contraseña cambiada
			header("Location:https://smartcar.000webhostapp.com/misdatos.php");
			die();
		}else{
			//contraseñas nuevas diferentes	
			header("Location:https://smartcar.000webhostapp.com/cambiar.php");
			die();
		}
	}else{
		//Contraseña fallida
		header("Location:https://smartcar.000webhostapp.com/cambiar.php");
		die();
	}
?>