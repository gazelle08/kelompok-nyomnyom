<!-- Autentikasi -->
<?php require('config.php');
session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SyleMe</title>
	<style type="text/css">
		/*CSS for icons in content*/
		#halo-user{
			font-family: montserrat semibold;
			color: black;
			position: relative;
			text-align: left;
			left: 6px;
			top: 40px;
			font-size: 25px;
		}
		#date{
			position: relative;
			text-align: left;
			top: 30px;
			left: 6px;
			font-size: 16px;
		}
		#wallet{
			top: 40px;
			position: relative;
			width: 300px;
			height: 161px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
		}
		#saldo{
			position: absolute;
		}
		#icon{
			width: 120px;
			height: 140px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			top: 20px;
			font-family: montserrat semibold;
			margin-right: 20px;
		}

		/*CSS for ads*/
		#ad-icon{
			width: 390px;
			height: 160px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			top: 10px;
		}
		#button{
			background-color: #DE0D4F;
			color: white;
			font-family: montserrat semibold;
			font-size: 16px;
			padding: 10px 20px;
			border-radius: 30px;
			position: relative;
			top: 20px;
			border: none;
		}
		#button:hover {
			color: #DE0D4F;
			background-color: #FFFFFF;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php $this_page='beranda'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("page_template.php"); ?>

	<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content">
			<!-- Halo User! -->
			<div class="row">
				<div id="halo-user">
					<p style="display: inline;">Halo </p><p style="color: #E05B36; display: inline;"><?php echo $_SESSION['username'];?></p><p style="display: inline;">!</p>
				</div>

				<!-- Date -->
				<p id="date">
					<?php
						function tanggal_indonesia($tanggal){
						      $bulan = array (
						      1 =>   'Januari',
						      'Februari',
						      'Maret',
						      'April',
						      'Mei',
						      'Juni',
						      'Juli',
						      'Agustus',
						      'September',
						      'Oktober',
						      'November',
						      'Desember'
						      );
						        
						      $pecahkan = explode('-', $tanggal);         
						      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
						}

						echo tanggal_indonesia(date("Y-m-d")) . "<br>";
					?>
				</p>
			</div>

			<!-- Wallet and image -->
			<div class="row" style="position: relative; top: 0;">
				<!-- Wallet -->
				<div class="col6" id="wallet">
					<p id="saldo" style="font-family: montserrat medium; font-size: 20px; top: 29px; left: 23px; margin: 0; color:#6C6A6A;">Saldo</p>
					<p id="saldo" style="font-family: montserrat semibold; font-size: 25px; top: 68px; left: 51px; margin: 0;">Rp. 32.500.000,00</p>
					<p id="saldo" style="font-family: montserrat semibold; font-size: 20px; top: 108px; left: 93px; margin: 0; color: #18AD2D;">+ Rp. 1.500.000,00</p>
				</div>
				<!-- Image -->
				<div class="col6"><img src="wallet-image.svg" style="position: relative; left: 40px;"></div>
			</div>
			
			<!-- Icons -->
			<!-- dengan php untuk mengambil data dari database user-->
			<?php
			include ("icon_info.php");
			
			$username = $_SESSION['username'];

			$query = "SELECT * FROM user WHERE username ='$username'";
			$result = mysqli_query($conn, $query);

			// Memasukkan data yang diambil ke dalam variable
			$row = mysqli_fetch_assoc($result);
			?>
			<div class="row">

				<div class="row" style="margin-top: 40px; margin-right: 80px">
					<div class="col12" id="icons-container" style="display: flex; flex-wrap: wrap; justify-content: space-around;">

						<div class="col1" id="icon">
							<p style="color: #FF7A57; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['pesanan_baru'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Pesanan<br>Baru</p>
						</div>
						<div class="col1" id="icon">
							<p style="color: #E09240; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['pesanan_siapkirim'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Pesanan<br>Siap Kirim</p>
						</div>
						<div class="col1" id="icon">
							<p style="color: #E0481F; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['pesanan_selesai'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Pesanan<br>Selesai</p>
						</div>
						<div class="col1" id="icon">
							<p style="color: #E0481F; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['ulasan_baru'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Ulasan<br>Baru</p>
						</div>
						<div class="col1" id="icon">
							<p style="color: #E09240; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['produk_terjual'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Produk<br>Terjual</p>
						</div>
						<div class="col1" id="icon">
							<p style="color: #FF7A57; font-size: 48.83px; position: relative; top: 19px; margin: 0;"><?php echo $row['jumlah_pelanggan'];?></p>
							<p style="font-size: 16px; position: relative; top: 5px;">Jumlah<br>Pelanggan</p>
						</div>

					</div>
				</div>

			</div>

			<!-- Ad -->
			<div class="row" style="position: relative; top: 31px;">
				<div class="col12">
				</div>
				<!-- Ad icons -->
				<div class="col3" id="ad-icon" style="left: 30px;">
					<img src="ad-fav.svg" style="position: relative; top: 16.8px;">
					<button id="button" style="top: 27px;" onclick="location.href='form_tambah_produk.php';">Tambah Produk</button>
				</div>
			</div>
		</div>
	</div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->

</body>
</html>
