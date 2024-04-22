<?php
session_start();
include 'config.php';
//Untuk mengambil nomor halaman yang dikirim
$page = $_GET['page'];

//Mengambil id yang dikirim
$id = $_GET['id'];

// Query untuk menampilkan data pelanggan berdasarkan ID yang dikirim
$query_foto = "SELECT * FROM data_product WHERE id='$id'";
$result_foto = mysqli_fetch_assoc(mysqli_query($conn,$query_foto));
$foto = $result_foto['foto'];

 // Check if photo exists
if(is_file('images/'.$foto)){
  unlink("images/".$foto); // Delete photo from images folder
  $query = "DELETE FROM data_product WHERE id='$id' ";
  $hasil_query = mysqli_query($conn, $query);
}
else {     
      echo "<script>alert('Data tidak dapat ditemukan');
      window.location='produk_page.php';</script>";
}

//Check query for error
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($conn).
    " - ".mysqli_error($conn));
} else {
  // echo "<script>alert('Data berhasil dihapus.');window.location='produk_page.php';</script>";
  header('Location: produk_page.php');
}
?>
