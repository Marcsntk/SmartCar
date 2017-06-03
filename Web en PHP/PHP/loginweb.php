<?php
	// Desactivar toda notificación de error
	error_reporting(0);
	//para obtener los datos de la conexión a la base de datos
	require "init.php";
	
	//Assignar las variables
	$email = $_POST['email'];
	$passwordn   = $_POST['password'];
	$password=md5($passwordn);
	  
	//sentencia sql para comprovar la contraseña y el usuario
	$sql = "SELECT * FROM `usuario` WHERE `eMail`='".$email."' AND `Contrasena`='".$password."';";
	
	//"ejecutamos" la sentencia
	$result = mysqli_query($con, $sql);

	$response = array();
	$name;
	//si ha encontrado resultados dos devolverá un booleano y asignamos $name al "nombre" del nombre del usuario en la base de datos
	while($row = mysqli_fetch_array($result)){
		$response = array("name"=>$row[2],"password"=>$row[1],"email"=>$row[0]);
		$name=$row[2];
		$trovat=true;
	}

	if($trovat){
		//iniciamos sesión
		session_start();
		//asignamos variables a la sesión
		$_SESSION["idUsuario"] = $email;
		$_SESSION["nombre"] = $name;
		header("Location:https://smartcar.000webhostapp.com/misdatos.php");
		die();
	}else{
		header("Location:https://smartcar.000webhostapp.com/loguinerror.php");
		die();
		
	}

?>