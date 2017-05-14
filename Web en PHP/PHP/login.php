<?php 
error_reporting(0);
require "init.php";

$email = $_POST['email'];
$password   = $_POST['password'];
  

$sql = "SELECT * FROM `usuario` WHERE `eMail`='".$email."' AND `Contrasena`='".$password."';";

$result = mysqli_query($con, $sql);

$response = array();

while($row = mysqli_fetch_array($result)){
	$response = array("name"=>$row[2],"password"=>$row[1],"email"=>$row[0]);
}

echo json_encode(array("usuario"=>$response));


?>