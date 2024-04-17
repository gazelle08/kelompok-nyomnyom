<?php
include 'config.php';

// ubah menjadi variable
$id = $_GET['id'];
$status = $_GET['status'];
// Mengubah tipe data $status menjadi int
settype($status, "integer");

// Update kedalam table
$status_query = "UPDATE pesanan SET status = '$status' WHERE id = '$id'";
$status_result = mysqli_query($conn, $status_query);

if($status_result){
    header('Location: pesanan.php');
} else {
    echo "<script>alert('Tidak dapat mengubah status!'); window.location('pesanan.php');</script>";
}
?>