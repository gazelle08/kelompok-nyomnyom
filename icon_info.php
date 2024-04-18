<?php
// Untuk mengakses database
require('config.php');

//memasukkan data kedalam database untuk dimasukkan ke dalam summary di homepage
$username = $_SESSION['username']; //username dari session

//Icon pesanan baru
//jumlah pesanan baru dari db pesanan
$pesanan_baru_query = "SELECT * FROM pesanan WHERE status = 1";
$pesanan_baru_result = mysqli_query($conn, $pesanan_baru_query);
$pesanan_baru = mysqli_num_rows($pesanan_baru_result);

//jumlah pesanan baru dari db user
$pesanan_baru_user_query = "SELECT * FROM user WHERE username = '$username'";
$pesanan_baru_user_result = mysqli_query($conn, $pesanan_baru_user_query);
$pesanan_baru_user = mysqli_fetch_assoc($pesanan_baru_user_result);
$pesanan_baru_user = $pesanan_baru_user['pesanan_baru'];

if ($pesanan_baru != $pesanan_baru_user) {
    $update_pesanan_baru_query = "UPDATE user SET pesanan_baru = '$pesanan_baru' WHERE username = '$username'";
    $update_pesanan_baru_result = mysqli_query($conn, $update_pesanan_baru_query);
    if ($update_pesanan_baru_result){
        ;
    } else {
        echo "Pesanan Baru tidak terupdate!";
    }
}

//Icon Pesanan Siap Kirim
//jumlah pesanan siap kirim dari db pesanan
$pesanan_siapkirim_query = "SELECT * FROM pesanan WHERE status = 2";
$pesanan_siapkirim_result = mysqli_query($conn, $pesanan_siapkirim_query);
$pesanan_siapkirim = mysqli_num_rows($pesanan_siapkirim_result);

//jumlah pesanan siap kirim dari db user
$pesanan_siapkirim_user_query = "SELECT * FROM user WHERE username = '$username'";
$pesanan_siapkirim_user_result = mysqli_query($conn, $pesanan_siapkirim_user_query);
$pesanan_siapkirim_user = mysqli_fetch_assoc($pesanan_siapkirim_user_result);
$pesanan_siapkirim_user = $pesanan_siapkirim_user['pesanan_siapkirim'];

if ($pesanan_siapkirim != $pesanan_siapkirim_user) {
    $update_pesanan_siapkirim_query = "UPDATE user SET pesanan_siapkirim = '$pesanan_siapkirim' WHERE username = '$username'";
    $update_pesanan_siapkirim_result = mysqli_query($conn, $update_pesanan_siapkirim_query);
    if ($update_pesanan_siapkirim_result){
        ;
    } else {
        echo "Pesanan Siap Kirim tidak terupdate!";
    }
}

//Icon Pesanan Selesai
//jumlah pesanan selesai dari db pesanan
$pesanan_selesai_query = "SELECT * FROM pesanan WHERE status = 3";
$pesanan_selesai_result = mysqli_query($conn, $pesanan_selesai_query);
$pesanan_selesai = mysqli_num_rows($pesanan_selesai_result);

//jumlah pesanan selesai dari db user
$pesanan_selesai_user_query = "SELECT * FROM user WHERE username = '$username'";
$pesanan_selesai_user_result = mysqli_query($conn, $pesanan_selesai_user_query);
$pesanan_selesai_user = mysqli_fetch_assoc($pesanan_selesai_user_result);
$pesanan_selesai_user = $pesanan_selesai_user['pesanan_selesai'];

if ($pesanan_selesai != $pesanan_selesai_user) {
    $update_pesanan_selesai_query = "UPDATE user SET pesanan_selesai = '$pesanan_selesai' WHERE username = '$username'";
    $update_pesanan_selesai_result = mysqli_query($conn, $update_pesanan_selesai_query);
    if ($update_pesanan_selesai_result){
        ;
    } else {
        echo "Pesanan Selesai tidak terupdate!";
    }
}

//Icon Ulasan Baru
//jumlah ulasan dari db ulasan
$ulasan_baru_query = "SELECT * FROM ulasan";
$ulasan_baru_result = mysqli_query($conn, $ulasan_baru_query);
$ulasan_baru = mysqli_num_rows($ulasan_baru_result);

//jumlah ulasan baru dari db user
$ulasan_baru_user_query = "SELECT * FROM user WHERE username = '$username'";
$ulasan_baru_user_result = mysqli_query($conn, $ulasan_baru_user_query);
$ulasan_baru_user = mysqli_fetch_assoc($ulasan_baru_user_result);
$ulasan_baru_user = $ulasan_baru_user['ulasan_baru'];

if ($ulasan_baru != $ulasan_baru_user) {
    $update_ulasan_baru_query = "UPDATE user SET ulasan_baru = '$ulasan_baru' WHERE username = '$username'";
    $update_ulasan_baru_result = mysqli_query($conn, $update_ulasan_baru_query);
    if ($update_ulasan_baru_result){
        ;
    } else {
        echo "Ulasan Baru tidak terupdate!";
    }
}

//Icon Produk Terjual
//jumlah produk terjual dari db pesanan_selesai dan ulasan
//mengambil data produk terjual dari db pesanan
$produk_terjual_pesanan_query = "SELECT * FROM pesanan WHERE status = 3";
$produk_terjual_pesanan_result = mysqli_query($conn, $produk_terjual_pesanan_query);

//mengambil data produk terjual dari db ulasan
$produk_terjual_ulasan_query = "SELECT * FROM ulasan WHERE pelanggan NOT IN (SELECT pelanggan FROM pesanan)";
$produk_terjual_ulasan_result = mysqli_query($conn, $produk_terjual_ulasan_query);

//menggabungkan hasil dari kedua pengambilan data diatas
$produk_terjual = mysqli_num_rows($produk_terjual_pesanan_result) + mysqli_num_rows($produk_terjual_ulasan_result);

//jumlah produk terjual dari db user
$produk_terjual_user_query = "SELECT * FROM user WHERE username = '$username'";
$produk_terjual_user_result = mysqli_query($conn, $produk_terjual_user_query);
$produk_terjual_user = mysqli_fetch_assoc($produk_terjual_user_result);
$produk_terjual_user = $produk_terjual_user['produk_terjual'];

if ($produk_terjual != $produk_terjual_user) {
    $update_produk_terjual_query = "UPDATE user SET produk_terjual = '$produk_terjual' WHERE username = '$username'";
    $update_produk_terjual_result = mysqli_query($conn, $update_produk_terjual_query);
    if ($update_produk_terjual_result){
        ;
    } else {
        echo "Produk Terjual tidak terupdate!";
    }
}

//Icon Jumlah Pelanggan
//jumlah pelanggan dari db pesanan dan ulasan
//mengambil data jumlah pelanggan dari db pesanan
$jumlah_pelanggan_pesanan_query = "SELECT * FROM pesanan";
$jumlah_pelanggan_pesanan_result = mysqli_query($conn, $jumlah_pelanggan_pesanan_query);

//mengambil data jumlah pelanggan dari db ulasan
$jumlah_pelanggan_ulasan_query = "SELECT * FROM ulasan WHERE pelanggan NOT IN (SELECT pelanggan FROM pesanan)";
$jumlah_pelanggan_ulasan_result = mysqli_query($conn, $jumlah_pelanggan_ulasan_query);

//menggabungkan hasil dari kedua pengambilan data diatas
$jumlah_pelanggan = mysqli_num_rows($jumlah_pelanggan_pesanan_result) + mysqli_num_rows($jumlah_pelanggan_ulasan_result);

//jumlah pelanggan dari db user
$jumlah_pelanggan_user_query = "SELECT * FROM user WHERE username = '$username'";
$jumlah_pelanggan_user_result = mysqli_query($conn, $jumlah_pelanggan_user_query);
$jumlah_pelanggan_user = mysqli_fetch_assoc($jumlah_pelanggan_user_result);
$jumlah_pelanggan_user = $jumlah_pelanggan_user['jumlah_pelanggan'];

if ($jumlah_pelanggan != $jumlah_pelanggan_user) {
    $update_jumlah_pelanggan_query = "UPDATE user SET jumlah_pelanggan = '$jumlah_pelanggan' WHERE username = '$username'";
    $update_jumlah_pelanggan_result = mysqli_query($conn, $update_jumlah_pelanggan_query);
    if ($update_jumlah_pelanggan_result){
        ;
    } else {
        echo "Jumlah pelanggan tidak terupdate!";
    }
}
?>