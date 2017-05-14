<?php
	error_reporting(0);
	require "init.php";


	$email = $_POST['email'];
	$passwordn   = $_POST['password'];
	$passwordnr = $_POST['passwordr'];
	if($passwordn!=$passwordnr){
		header("Location:smartcar.hol.es/registro.php");
		die();
	}
	$password = md5($passwordn);
	$name = $_POST["name"];
	 
	$sql = "INSERT INTO `usuario` (`eMail`,`Contrasena`, `Nombre`) VALUES ('".$email."', '".$password."', '".$name."');";
	if(!mysqli_query($con, $sql)){
		?>
		<html>
			<head>
			</head>
			<body>
				<p>Error al Registrar</p>
			</body>
		</html>
		<?php 
		//echo '{"message":"Unable to save the data to the database."}';
	}else{
		session_start();
		$_SESSION['idUsuario']=$email;
		$_SESSION["nombre"] = $name;
		header("Location:https://smartcar.000webhostapp.com/registrado.php");
		die();
	}

?>