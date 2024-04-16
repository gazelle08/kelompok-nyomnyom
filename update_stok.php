<?php
//PHP untuk mengubah stok jika terdapat pesanan baru

//untuk mengakses database
require ('config.php');

//mengambil data dari db pesanan
$query_pesanan_baru = "SELECT * FROM pesanan WHERE status = 1";
$result_pesanan_baru = mysqli_query($conn, $query_pesanan_baru);
$jumlah_pesanan = mysqli_num_rows($result_pesanan_baru);

//mengambil barisan data yang pada kolom stok_update berisi 1 (belum update atau ada pesanan baru yang belum diupdate)
$query_update_pesanan = "SELECT * FROM pesanan WHERE status = 1 AND stok_update = 1";
$result_update_pesanan = mysqli_query($conn, $query_update_pesanan);

//mengambil barisan data yang pada kolom stok_update berisi 0 (sudah update atau tidak ada pesanan baru yang belum diupdate)
$query_jumlah_sebelum_update = "SELECT * FROM pesanan WHERE status = 1 AND stok_update = 0";
$jumlah_sebelum_update = mysqli_num_rows(mysqli_query($conn, $query_jumlah_sebelum_update));

if ($jumlah_pesanan > $jumlah_sebelum_update) {
    while($row = mysqli_fetch_assoc($result_update_pesanan)){
        //inisialisasi $hasil_stok
        $hasil_stok = 0;

        //mengambil nama produk untuk dimasukkan ke dalam variable
        $nama_produk = $row['produk'];

        //mengambil data dari db produk
        $query_stok_produk = "SELECT stok FROM data_product WHERE produk = '$nama_produk'";
        $result_stok_produk = mysqli_query($conn, $query_stok_produk);
        $stok = mysqli_fetch_assoc($result_stok_produk);

        //mengurangi stok
        $hasil_stok = $stok['stok'] - $row['jumlah'];

        //update data db produk
        $query_update_stok = "UPDATE data_product SET stok = '$hasil_stok' WHERE produk = '$nama_produk'";
        $result_query_update_stok = mysqli_query($conn, $query_update_stok);
        
        //update kolom stok_update menjadi 0 (sudah update) di db pesanan
        $query_ubah_stok_update = "UPDATE pesanan SET stok_update = 0";
        $result_query_ubah_stok_update = mysqli_query($conn, $query_ubah_stok_update);
    }
}
?>