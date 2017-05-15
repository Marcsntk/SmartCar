<?php
$servername = "localhost";
$username = "id333081_r00tl33t";
$password = "z45t90mmk";
$dbname = "id333081_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$var1 = ''; //ID
$var2 = $_POST['email']; //EMAIL
$var3 = $_POST['gTime']; //GPS Time
$var4 = $_POST['dTime']; //Device Time
$var5 = $_POST['lon']; //Longitude
$var6 = $_POST['lat']; //Latitude
$var7 = $_POST['gSpeed']; //GPS Speed
$var8 = $_POST['hds']; //Horizontal Dilution of Precision
$var9 = $_POST['alt']; //Altitude
$var10 = $_POST['bear']; //Bearing
$var11 = $_POST['gX']; //G(X)
$var12 = $_POST['gY']; //G(Y)
$var13 = $_POST['gZ']; //G(Z)
$var14 = $_POST['gC']; //G(Calibrate)
$var15 = $_POST['tDist']; //Trip Distance
$var16 = $_POST['tLitres']; //Trip Litres per 100 KM
$var17 = $_POST['litres']; //Litres per 100 KM
$var18 = $_POST['fuel']; //Fuel Cost
$var19 = $_POST['temp']; //Engine temperature
$var20 = $_POST['speed']; //SpeedOBD
$var21 = $_POST['row']; //Row of the file

if($var21==1){
	$sql = "INSERT INTO torque (IDFile, Row, eMail, GPS_Time, Device_Time, Longitude, Latitude, GPS_Speed, HDS, Altitude, Bearing, Gx, Gy, Gz, Gc, Trip_Distance, TripLpHKm, LpHKm, Fuel, Engine_Temp, Speed_OBD)
	VALUES ('".$var1."', '".$var21."', '".$var2."', '".$var3."', '".$var4."', '".$var5."', '".$var6."', '".$var7."', '".$var8."', '".$var9."', '".$var10."', '".$var11."', '".$var12."', '".$var13."', '".$var14."', '".$var15."', '".$var16."', '".$var17."', '".$var18."', '".$var19."', '".$var20."')";
}
else{
	$sql2 ="SELECT MAX(IDFile) FROM `torque` WHERE eMail = '".$var2."'";
	$result = mysqli_query($conn, $sql2);
	while($row = mysqli_fetch_array($result)){
		$var1=$row[0];
	}
	$sql = "INSERT INTO torque (IDFile, Row, eMail, GPS_Time, Device_Time, Longitude, Latitude, GPS_Speed, HDS, Altitude, Bearing, Gx, Gy, Gz, Gc, Trip_Distance, TripLpHKm, LpHKm, Fuel, Engine_Temp, Speed_OBD)
	VALUES ('".$var1."', '".$var21."', '".$var2."', '".$var3."', '".$var4."', '".$var5."', '".$var6."', '".$var7."', '".$var8."', '".$var9."', '".$var10."', '".$var11."', '".$var12."', '".$var13."', '".$var14."', '".$var15."', '".$var16."', '".$var17."', '".$var18."', '".$var19."', '".$var20."')";
}


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

die();
?>