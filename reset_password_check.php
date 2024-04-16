<!-- PHP untuk reset password -->
<?php
require ('config.php');

if ($_POST['submit_password']){
    $username = $_POST['username'];
    $no_hp = $_POST['no_handphone'];

    $password = strip_tags($_POST['password']);
    $confirm_password = strip_tags($_POST['confirm_password']);

    if($password == $confirm_password){
        $password = sha1($password);
        $confirm_password = sha1($confirm_password);
        $update_password = "UPDATE pengguna SET password = '$password' WHERE username = '$username' AND no_hp = '$no_hp'";
        $result_password = mysqli_query($conn, $update_password);

        if ($result_password){
            // Pop-up versi CSS
            header('Location: reset_password.php#passberhasil');
            // Pop-up versi javascript
            // echo "<script> alert ('Password berhasil diubah!');
            // window.location='index.php';</script>";
        } else {
            // Pop-up versi CSS
            header('Location: reset_password.php#passgagal');
		    // Pop-up versi javascript
            // echo "<script> alert ('Password tidak berhasil diubah!');
            // window.location='lupa_password.php';</script>";
        }
    } else {
        //Jika password dan konfirmasi password tidak sama, maka dikembalikan ke halaman lupa_password.php setelah pop-up
        // Pop-up versi CSS
        header('Location: reset_password.php#passconerror');
		// Pop-up versi javascript
        // echo "<script> alert ('Password dan Konfirmasi Password tidak sama!');
        // window.location='lupa_password.php';</script>";
    }
}
?>