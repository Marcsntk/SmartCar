<?php

error_reporting(0);

$db_name = "id333081_app";
$mysql_user = "id333081_r00tl33t";
$mysql_pass = "z45t90mmk";
$server_name = "localhost";

$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

if(!$con){
	echo '{"message":"Unable to connect to the database."}';
}

?>