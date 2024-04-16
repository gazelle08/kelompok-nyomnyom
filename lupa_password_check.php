<?php
    require("config.php");
?>

<?php
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];

        $query="SELECT * FROM user WHERE username = '$username' AND no_hp = '$email'";
        $result = mysqli_num_rows(mysqli_query($conn, $query));

        if($result > 0){
?>

<!-- Form untuk mengirimkan variable username dan no_hp ke file reset_password.php dan juga redirect ke reset_password.php -->
<form id="sendvar" action="reset_password.php" method="POST">
    <input type="hidden" name='username' id='username' value="<?php echo $username;?>">
    <input type="hidden" name='no_hp' id='no_hp' value="<?php echo $email;?>">
  </form>
  <script type="text/javascript">
  document.getElementById("sendvar").submit();
  </script>

<?php
        }
        else{
            header('Location: lupa_password.php#data-unavailable');
        }
    } else {
        header('Location: index.php');
    }
?>
