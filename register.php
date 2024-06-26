<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Daftar StyleMe</title>
	<style type="text/css">
		body {
			font-family: Montserrat;
			background-color: #DE0D4F;
			margin: 0;
			overflow-x: hidden;
		}

		[class*="col"] {
			float: left;
			padding: 0;
			margin: 0;
			text-align: center;
		}
		.col1 {
			width: 8.33%;
		}
		.col2 {
			width: 16.66%;
		}
		.col3 {
			width: 25%;
		}
		.col4 {
			width: 33.33%;
		}
		.col5 {
			width: 41.66%;
		}
		.col6 {
			width: 50%;
		}
		.col7 {
			width: 58.33%;
		}
		.col8 {
			width: 66.66%;
		}
		.col9 {
			width: 75%;		
		}
		.col10 {
			width: 83.33%;
		}
		.col11 {
			width: 91.66%;
		}
		.col12 {
			width: 100%;
		}

		#styleme {
			color: white;
			font-size: 80px;
			font-weight: bold;
			position: relative;
			top: 0;
			right: 71.5px;
			margin: 0;
		}

		#registerform {
			position: relative;
			top: 51px;
			left: 150px;
			height: 581px;
			width: 517px;
			background-color:white;
			border-radius: 30px;
			box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.25);
		}

		h1 {
			text-align: left;
			color: black;
			font-size: 39.06px;
			padding: 0;
			margin: 0;
			position: relative;
			top: 0;
		}

		#daftar {
			text-align: left;
			color: #7F7F7F;
			font-size: 20px;
			padding: 0;
			margin: 0;
			position: relative;
			top: 10px;
			font-family: montserrat medium;
		}

		form {
			position: absolute;
			text-align: left;
			top: 152px;
			margin: 0;
			padding: 0;
		}

		label {
			position: relative;
			font-family: Montserrat Semibold;
			font-size: 16px;
			margin: 0;
			top: 0;
		}

		input {
			position: relative;
			border-radius: 30px;
			width: 415px;
			height: 37px;
			padding: 0 10px;
			top: 10px;
		}

		input[type=password], 
		input[type=text] {
			border: 1px solid #969696;
			font-size:16px;
		}

		input[type=submit]{
			width: 212px;
			height: 54px;
			color: white;
			border-radius: 30px;
			border: none;
			font-size: 20px;
			font-family: montserrat semibold;
			cursor: pointer;
			position: relative;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			background-color: #DE0D4F;
			transition: 0.3s;
			display: inline-block;
			vertical-align: middle;
		}

		input[type=submit]:hover {
			background-color: white;
			color: #DE0D4F;
			border: 3px solid #DE0D4F;
		}

		#link-kembali{
			color: #DE0D4F;
			font-family: montserrat semibold;
			font-size: 20px;
			height: 54px;
			text-decoration: none;
			display: inline-block;
			vertical-align: middle;
			cursor: pointer;
			transition: 0.3s;
			margin-right: 50px;
			position: relative;
			top: 25px;
		}
		#link-kembali:hover {
			text-decoration: underline;
		}

		hr.styleme{
			width: 259px;
			height: 0;
			background-color: white;
			border: 1px solid white;
			padding: 0;
			margin: 0;
			position: absolute;
			right:25%;
			left:50%;
			margin-left:-129.5px;
			bottom: 59px;
		}

		/* Pop-up */
		.popup {
		  	display: none;
			position: relative;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.7);
			padding: 0;
			margin: 0;
		}
		.popup:target {
			display: table;
			position: absolute;
			text-align: center;
		}

		/* Pop-up Box*/
		.popupbox{
			background-color: #FFFFFF;
			position: fixed;
			padding: 0;
			outline: 0;
			text-align: center;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 1.6);
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			border-radius: 30px;
			margin: 0;
		}
		
		/* CSS untuk pop-up Password & Konfirmasi Password tidak sama */
		#passcon{
			text-align: center;
			width: 468px;
			height: 192px;
		}
		
		/* CSS untuk pop-up Username sudah terpakai */
		#usernameused{
			text-align: center;
			width: 340px;
			height: 188px;
		}

		/* CSS untuk pop-up Username sudah terpakai */
		#regisberhasil{
			text-align: center;
			width: 340px;
			height: 188px;
		}

		.button-kembali{
			padding: 10px 20px;
			background-color: #DE0D4F; 
			border-radius: 30px;
			border: none;
			position: relative;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
			top: 30px;
			color: white;
			transition: 0.3s;
		}
		.button-kembali:hover{
			background-color: #FFFFFF;
			color: #DE0D4F;
			text-align: center;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<div style="width: 100%; height: 100%; position: absolute;">
		<div class="col12">
      	<div class="col5" style="position: relative; top: 50px; text-align: right;">
        <p id="styleme">StyleMe</p>
        <img src="styleme.png" style="width: 62%; height: auto; position: relative; top: -20px;">
      </div>
			<!-- Tempat Form Daftar -->
			<div class="col7" id="registerform">
				<!-- Header -->
				<div class="row" style="position: relative; padding-left: 41px; top: 50px;">
					<h1>Selamat Datang</h1>
					<p id="daftar">Isi data diri Anda untuk mendaftar</p>
				</div>
				<!-- Form -->
				<form action="register_check.php" method="POST">
					<!-- Username -->
					<div style="position: relative; top: 0; padding-left: 41px;">
						<label style="color: #7F7F7F;">Username</label>
						<input type="text" name='username' required>
					</div>

					<!-- No.Handphone -->
					<div style="position: absolute; top: 81px; padding-left: 41px;">
						<label style="color: #7F7F7F;">No. Handphone</label>
						<input type="text" name='no_handphone' required>
					</div>

					<!-- Password -->
					<div style="position: absolute; top: 162px; padding-left: 41px;">
						<label style="color: #7F7F7F;">Password</label>
						<input type="password" name='password' required>
					</div>

					<!-- Re-check Password -->
					<div style="position: absolute; top: 243px; padding-left: 41px;">
						<label style="color: #7F7F7F;">Konfirmasi Password</label>
						<input type="password" name='confirm_password' required>
					</div>
					
					<div class="col12" style="position: relative; top: 274px; vertical-align: middle;">
						<!-- Kembali ke Login -->
						<a id="link-kembali" href="index.php">Kembali</a>
						<!-- Submit -->
						<input type="submit" value="Daftar" href="index.php">
					</div>
				</form>
			</div>
		</div>

		<!-- styleme 2024 -->
		<div class="col12" style="position: absolute; bottom: 0;">
			<hr class="styleme">
			<p style="color: white; font-size: 16px; font-family: montserrat semibold; margin: 0; padding: 0; position: relative; bottom: 20px;">&copy; StyleMe 2024. Hak Cipta Dilindungi</p>
		</div>

		<!-- Pop-up Password & Konfirmasi Password Tidak Sama-->
		<div class="col12">
			<!-- Pop-up box -->
			<div id="passconerror" class="popup">
				<div class="popupbox" id="passcon">
					<p style="font-size: 20px; font-family: montserrat semibold; padding: 40px 0 0 0; text-align: center; margin: 0;">Password dan Konfirmasi Password<br>Tidak Sama!</p>
					<button class="button-kembali" onclick="location.href='register.php'">Kembali</button>
				</div>
			</div>
		</div>

		<!-- Pop-up Username Sudah Terpakai-->
		<div class="col12">
			<!-- Pop-up box -->
			<div id="usernameusederror" class="popup">
				<div class="popupbox" id="usernameused">
					<p style="font-size: 20px; font-family: montserrat semibold; padding: 40px 0 0 0; text-align: center; margin: 0;">Username sudah terpakai!</p>
					<p style="font-size: 16px; font-family: montserrat medium; padding: 5px 0 0 0; text-align: center; margin: 0;">Mohon pilih username lain</p>
					<button class="button-kembali" style="top: 26px;" onclick="location.href='register.php'">Kembali</button>
				</div>
			</div>
		</div>

		<!-- Pop-up Registrasi Berhasil-->
		<div class="col12">
			<!-- Pop-up box -->
			<div id="regissuccess" class="popup">
				<div class="popupbox" id="regisberhasil">
					<p style="font-size: 20px; font-family: montserrat semibold; padding: 40px 0 0 0; text-align: center; margin: 0;">Registrasi Berhasil!</p>
					<p style="font-size: 16px; font-family: montserrat medium; padding: 5px 0 0 0; text-align: center; margin: 0;">Silahkan login dengan akun baru anda</p>
					<button class="button-kembali" style="top: 26px;" onclick="location.href='index.php'">OK</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>