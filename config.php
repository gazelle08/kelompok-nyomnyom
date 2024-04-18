<?php 
$user 		= "root";
$server 	= "localhost";
$password 	= "";
$db			= "styleme1";
$conn 	= mysqli_connect($server, $user, $password, $db);
$_SESSION = "username";

if($conn == false)
{
	echo "Tidak Terkoneksi";
}
?>