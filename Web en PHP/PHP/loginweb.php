<?php 
	error_reporting(0);
	require "init.php";

	$email = $_POST['email'];
	$passwordn   = $_POST['password'];
	$password=md5($passwordn);
	  

	$sql = "SELECT * FROM `usuario` WHERE `eMail`='".$email."' AND `Contrasena`='".$password."';";

	$result = mysqli_query($con, $sql);

	$response = array();
	$name;

	while($row = mysqli_fetch_array($result)){
		$response = array("name"=>$row[2],"password"=>$row[1],"email"=>$row[0]);
		$name=$row[2];
		$trovat=true;
	}

	if($trovat){
		session_start();
		$_SESSION["idUsuario"] = $email;
		$_SESSION["nombre"] = $name;
		header("Location:https://smartcar.000webhostapp.com/misdatos.php");
		die();
	}else{
		header("Location:https://smartcar.000webhostapp.com/loguinerror.php");
		die();
		
	}

?>