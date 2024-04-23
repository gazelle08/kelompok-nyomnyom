<?php
include 'config.php';
session_start();

?>

<!-- Connect to database -->
<?php include('config.php') ?>

<!DOCTYPE html>
<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="jquery.maskMoney.js" type="text/javascript"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Tambah Produk</title>
	<style type="text/css">
		
		#produk-user{
			color: black;
			position: relative;
			text-align: left;
			left: 6px;
			top: 40px;
			font-size: 25px;
			font-family: montserrat semibold;
		}
		
		#form{
			width: 958px;
			height: 529px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			display: inline-block;
			text-align: left;
			top: 90px;
			padding: 30px 25px 0 25px;
		}

		table{
			border-collapse: collapse;
			padding: 0;
			margin: 0;
			position: relative;
			top: 42px;
			padding: 0;
			margin: 0;
		}

		th{
			font-size: 20px;
			font-family: montserrat semibold;
			height: 48px;
			width: 136px;
			padding: 0 0 0 5px;
		}
		td{
			font-size: 16px;
			font-family: Montserrat medium;
			height: 48px;
			width: 310px;
			padding: 0 0 0 30px;
			margin: 0;
		}
		.line{
			height: 450px;
			width: 1px;
			background-color: #969696;
			display: inline-block;
			position: absolute;
			top: 66px;
			left: 161px;
			border: none;
		}
		
		#form-input{
			border-radius: 20px;
			width: 231px;
			height: 33px;
			border: 1px solid #BBBBBB;
			padding: 0 10px;
			text-align: left;
			font-size: 16px;
			font-family: montserrat;
		}
		#currency{
			border-radius: 20px;
			width: 231px;
			height: 33px;
			border: 1px solid #BBBBBB;
			padding: 0 10px;
			text-align: left;
			font-size: 16px;
			font-family: montserrat;
		}

		#form-input-desc{
			border-radius: 20px;
			width: 231px;
			height: 89px;
			border: 1px solid #BBBBBB;
			text-align: justify;
			resize: none;
			padding: 10px;
			text-align: left;
			font-size: 16px;
			font-family: montserrat;
		}

		/* Untuk tombol select file */
		input[type=file]::file-selector-button {
			border: none;
			padding: 5px 10px;
			border-radius: 30px;
			background-color: #DE0D4F;
			transition: 0.3s;
			/* Untuk tulisan dalam button */
			font-size: 16px;
			font-family: montserrat medium;
			color: white;
		}

		input[type=file]::file-selector-button:hover {
			background-color: white;
			color: #DE0D4F;
			outline: 2px solid #DE0D4F;
			outline-offset: -2px;
		}
		
		/* Tombol Tambah Produk */
		#button-submit{
			background-color: #DE0D4F;
			color: white;
			font-family: montserrat semibold;
			font-size: 20px;
			padding: 10px 20px;
			border-radius: 30px;
			position: relative;
			top: 62px;
			left: 174px;
			border: none;
			transition: 0.3s;
		}

		#button-submit:hover {
			color: #DE0D4F;
			background-color: #FFFFFF;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
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
		.konfirmasi-lapor{
			background-color: #FFFFFF;
			position: fixed;
			padding: 0;
			outline: 0;
			text-align: center;
			width: 340px;
			height: 188px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 1.6);
			left: 50%;
			top: 40%;
			border-radius: 30px;
			margin: 0;
		}
		#berhasil{
			text-align: center;
			width: 340px;
			height: 294px;
			left: 50%;
			top: 30%;
		}
		#berhasil img {
    		width: 150px; /* Sesuaikan lebar yang diinginkan */
    		height: 180px; /* Sesuaikan tinggi yang diinginkan */
    		margin: 0 auto; /* Menengahkan gambar */
    		display: block; /* Membuat gambar menjadi elemen blok agar dapat diatur margin secara otomatis */
		}


		
		.button-ok{
			padding: 10px 20px;
			background-color: #DE0D4F; 
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
		.button-ok:hover{
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
	<?php $this_page='produk'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("page_template.php"); ?>

	<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content">
			<!-- Halo User! -->
			<!-- Halo User! -->
		<div class="row">
			<div id="produk-user">
				<p style="display: inline; font-family: Montserrat medium;">Tambah Produk</p>
				<p style="color: #DE0D4F; display: inline;"><?php echo $_SESSION['username'];?></p>
			</div>
		</div>

		<!-- Container -->
		<div class="col12" style="position: absolute; top: 0; text-align: left;">
			<!-- Form -->
			<div id="form">
				<p style="position: relative; top: 0; left: 5px; margin: 0; padding: 0; font-family: montserrat medium; font-size: 20px;">Mohon masukkan data untuk produk baru</p>
				<hr style='width: 867px; position: absolute; border-radius: 5px; height: 2px; top: 65px; left: 25px; background-color: black; padding: 0; margin: 0; border: none;'>

				<!-- Form Tambah -->
				<form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
					<table>
						<!-- Upload Foto -->
						<tr>
							<th>Foto</th>
							<td><input type="file" name = "foto" required></td>
						</tr>

						<!-- Tempat kosong -->
						<tr style="height: 18px;"></tr>

						<!-- Nama Produk -->
						<tr>
							<th>Produk</th>
							<td><input id="form-input" type="text" name="produk" required></td>
						</tr>

						<!-- Stok Produk -->
						<tr>
							<th>Stok (pcs)</th>
							<td><input id="form-input" type="number" name="stok" required></td>
						</tr>

						<!-- Harga -->
						<tr>
							<th>Harga</th>
							<td><input id="currency" type="text" name="harga" required></td>
						</tr>

						<!-- Deskripsi Produk -->
						<tr>
							<th>Deskripsi</th>
							<td style="padding-top: 8px;"><textarea rows="4" cols="50" id="form-input-desc" name="deskripsi"></textarea></td>
						</tr>
					</table>

					<!-- Garis tengah -->
					<div class="line"></div>

					<!-- Button Tambah Produk-->
					<input id="button-submit" type="submit" value="Tambah Produk">
				</form>	
				<!-- End of form -->
			</div>
		</div>
		
		<!-- Pop-up -->
		<div class="col12">
			<!-- Pop-up sudah terkonfirmasi -->
			<div id="konfirmasi" class="konfirmasi">
				<div class="konfirmasi-lapor" id="berhasil">
					<img src="confirmpic1.svg">
					<p style="text-align: center; position: relative; top: 15.7px; font-size: 20px; font-family: montserrat semibold; margin: 0; padding: 0;">Produk anda sudah ditambah!</p>
					<button class="button-ok" onclick="location.href='produk_page.php'">OK</button>
				</div>
			</div>
		</div>
	</div> <!-- Tutup div class:"col12" id="page-content" -->
</body>
<script>
  $(function() {
    $('#currency').maskMoney({
      thousands: '.',
      decimal: ',',
      precision: 0
    });
  })
</script>
</html>