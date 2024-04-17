<?php
// Termasuk file konfigurasi
include 'config.php';

// Periksa apakah pengguna sudah masuk, jika ya, arahkan ke halaman utama
if(isset($_SESSION['username'])) {
    header('Location: home_page.php');
    exit;
}

// Periksa apakah form login sudah dikirimkan
if(isset($_POST['login'])) {
    // Ambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Pastikan username dan password tidak kosong
    if(!empty($username) && !empty($password)) {
        // Lakukan kueri SQL untuk memeriksa kredensial pengguna
        $sql = mysqli_query($conn, "SELECT username, password FROM pengguna WHERE username = '$username' AND password = '$password'");

        // Periksa jumlah baris yang sesuai dengan kredensial yang ditemukan
        $num_rows = mysqli_num_rows($sql);
        
        if($num_rows > 0){
            // Jika kredensial benar, daftarkan sesi pengguna dan arahkan ke halaman utama
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['username'] = $row['username'];
            header('Location: home_page.php');
            exit;
        } else {
            // Jika kredensial salah, arahkan kembali ke halaman login dengan pesan kesalahan
            header('Location: index.php#konfirmasi');
            exit;
        }
    } else {
        // Jika username atau password kosong, arahkan kembali ke halaman login dengan pesan kesalahan
        header('Location: index.php#konfirmasi');
        exit;
    }
}
?>
