<?php
require("config.php");

if(isset($_POST['tambah']))
{

$ambil_id_pesanan 	= $_POST['id_pesanan'];
$ambil_status_laporan 			= $_POST['status_laporan'];
$ambil_keterangan 			= $_POST['keterangan'];
	
mysqli_query ($koneksi, "INSERT INTO laporan-pelanggan
			(id_pesanan,status_laporan, keterangan)
			VALUES
			('$ambil_id_pesanan', '$ambil_status_laporan', '$ambil_keterangan')");


header ("location: laporan-pelanggan.php");

}
?>
