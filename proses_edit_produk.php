<?php
session_start();
include 'config.php';

//Get page number from form
$page = $_POST['page'];

// # Code 1
// Create variable as vessel for the data from form
    // match it with the contents from name tag in the form
                //   V
$id = $_POST['id'];
$produk = $_POST['produk'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['foto']['name'];

//Check if there is image uploaded
if($foto != "") {
  $allowed_ext = array('png','jpg','jpeg','svg'); //File ext that is allowed to uploaded 
  $x = explode('.', $foto); //Seperate the img file name with the img ext
  $ext = strtolower(end($x)); //Converts string to lowercase
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $random_num     = rand(1,999);
  $new_foto = $random_num.'-'.$foto; //Combine file name with random number

  //Checks if file ext is among the allowed file ext
  if(in_array($ext, $allowed_ext) === true)  {     
    move_uploaded_file($file_tmp, 'images/'.$new_foto); //Moves the file img into designated folder
      // Run an INSERT query to add data into database. Make sure it is in order 
      //(id will not be necessary as it will be automatically produced)
      $query = "UPDATE data_product SET data_product = '$produk', stok = '$stok', harga = '$harga', deskripsi = '$deskripsi', foto = '$new_foto'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($conn, $query);

      // Check query for error
      //mysqli_errno returns error code in the form error code
      //mysqli_error returns a string description of the error
      if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($conn).
                " - ".mysqli_error($conn));
      } else {
        //Show an alert and redirect to produk_page.php
        // echo "<script>alert('Data berhasil diubah.');window.location='produk_page.php';</script>";
        header('Location: form_edit_produk.php?id='.$id.'&page='.$page.'#konfirmasi');
      }

  } else {     
    //If img file ext is not jpg, jpeg, png, svg. Then this will happen:
      echo "<script>alert('gambar produk yang boleh digunakan hanya jpg, png, jpeg atau svg.');window.location='form_edit_produk.php';</script>";
  }
} else { // If img is not added, then this will happen:
  $query = "UPDATE produk SET produk = '$produk', stok = '$stok', harga = '$harga', deskripsi = '$deskripsi'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($conn, $query);

  // Check query for error
  //mysqli_errno returns error code in the form error code
  //mysqli_error returns a string description of the error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
  } else {
    //Show an alert and redirect to produk_page.php
    // echo "<script>alert('Data berhasil diubah.');window.location='produk_page.php';</script>";
    header('Location: form_edit_produk.php?id='.$id.'&page='.$page.'#konfirmasi');
  }
}
?>