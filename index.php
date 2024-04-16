<?php require("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login StyleMe</title>
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

		#loginform {
			position: relative;
			top: 51px;
			left: 150px;
			height: 581px;
			width: 517px;
			background-color:white;
			/*margin: -550px 180px 0 0;*/
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

		#masuk {
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
			top: 162px;
			margin: 0;
			padding: 0;
		}

		label {
			position: relative;
			font-family: Montserrat Semibold;
			font-size: 16px;
			color: #7F7F7F;
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

		input[type=submit], #button-daftar {
			width: 212px;
			height: 54px;
			color: white;
			border-radius: 30px;
			border: none;
			font-size:20px;
			font-family: montserrat semibold;
			cursor: pointer;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			transition: 0.3s;
		}

		input[type=submit] {
			background-color: #DE0D4F;
			position: relative;
			top: 136px;
		}

		input[type=submit]:hover {
			background-color:white;
			color: #DE0D4F;
			border: 3px solid #DE0D4F;
		}

		hr.belum-daftar {
			width: 76px;
			height:3px;
			border: 2px solid #969696;
			background-color:#969696;
			border-radius:30px;
			position: relative;
			top: 153px;
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

		#button-daftar {
			background-color: #FBB4C6;
			position: relative;
			top: 177px;
		}

		#button-daftar:hover {
			background-color: white;
			color: #FBB4C6;
			border: 3px solid #FBB4C6;
		}

		#lupa-password {
			font-size: 14px;
			font-family: montserrat medium;
			color: red;
			position: absolute;
			margin: 0;
			top: 162px;
			text-align: right;
			right: 51px;
			cursor: pointer;
			transition: 0.3s;
			text-decoration: none;
		}

		#lupa-password:hover {
			text-decoration: underline;
		}

		/* Pop-up */
		.konfirmasi{
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
		.konfirmasi:target {
			display: table;
			position: absolute;
			text-align: center;
		}
		.konfirmasi-invalid{
			background-color: #FFFFFF;
			position: fixed;
			padding: 0;
			outline: 0;
			text-align: center;
			width: 340px;
			height: 294px;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			box-shadow: 0 3px 10px rgba(0, 0, 0, 1.6);
			border-radius: 30px;
			margin: 0;
		}
		
		.button-kembali{
			padding: 10px 20px;
			background-color: #E05B36; 
			border-radius: 30px;
			border: none;
			position: relative;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
			top: 40px;
			color: white;
			transition: 0.3s;
		}
		.button-kembali:hover{
			background-color: #FFFFFF;
			color: #E05B36;
			text-align: center;
			outline: 3px solid #E05B36;
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

			<!-- Tempat Login -->
			<div class="col7" id="loginform">
				<!-- Header -->
				<div class="row" style="position: relative; padding-left: 41px; top: 50px;">
					<h1>Selamat Datang</h1>
					<p id="masuk">Silahkan masukan username dan password</p>
				</div>
				<!-- Form -->
				<form action="login_check.php" method="POST">
					<div style="position: relative; top: 0; padding-left: 41px;">
						<label>Username</label>
						<input type="text" name='username' required>
					</div>
					<div style="position: absolute; top: 86px; padding-left: 41px;">
						<label>Password</label>
						<input type="password" name='password' required>
					</div>

					<!-- Lupa password -->
					<div class="col12">
						<a id="lupa-password" href="lupa_password.php">Lupa Password?</a>
					</div>
					
					<div class="col12">
						<!-- Submit -->
						<input type="submit" value="Masuk" href="home page/home_page.php">

						<!-- Belum punya akun? -->
						<hr class="belum-daftar">
						<p style="font-size: 16px; font-family: montserrat medium; color: #969696; position: relative; top: 159px; margin: 0;">Belum punya akun?</p>

						<!-- Daftar sekarang -->
						<button onclick="location.href='register.php'" type="button" id="button-daftar">Daftar Sekarang</button>
					</div>
				</form>
			</div>
		</div>

		<!-- StyleMe 2022 -->
		<div class="col12" style="position: absolute; bottom: 0;">
			<hr class="StyleMe">
			<p style="color: white; font-size: 16px; font-family: montserrat semibold; margin: 0; padding: 0; position: relative; bottom: 20px;">&copy; StyleMe 2024. Hak Cipta Dilindungi</p>
		</div>

		<!-- Pop-up -->
		<div class="col12">
			<!-- Pop-up box -->
			<div id="konfirmasi" class="konfirmasi">
				<div class="konfirmasi-invalid">
					<img src=login-invalid-pic.svg style='margin: 0 0 0 0; position: relative; top: 10.5px;'>
					<p style="text-align: center; position: relative; top: 15.7px; font-size: 20px; font-family: montserrat semibold; margin: 0; padding: 0;">Informasi Login Invalid</p>
					<button class="button-kembali" onclick="location.href='index.php'">Kembali</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>