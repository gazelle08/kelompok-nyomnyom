<?php
$user 		= "root";
$server 	= "localhost";
$password 	= "";
$db			= "styleme";
$koneksi 	= mysqli_connect($server, $user, $password, $db);
function is_logged_in() {}

if($koneksi == false)
{
	echo "Tidak Terkoneksi";
}
?>