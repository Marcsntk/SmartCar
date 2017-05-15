<?php
error_reporting(0);
require "init.php";


$email = $_POST['email'];
$password   = $_POST['password'];
$name = $_POST["name"];
 
$sql = "INSERT INTO `usuario` (`eMail`,`Contrasena`, `Nombre`) VALUES ('".$email."', '".$password."', '".$name."');";
if(!mysqli_query($con, $sql)){
	echo '{"message":"Unable to save the data to the database."}';
}

?>