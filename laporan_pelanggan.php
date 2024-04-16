<?php require('config.php');
    if(is_logged_in()){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Lapor</title>
	<style type="text/css">
		#pelaporan-user{
			color: black;
			position: relative;
			text-align: left;
			left: 6px;
			top: 40px;
			font-size: 25px;
			font-family: montserrat semibold;
		}
		#table-box{
			width: 917px;
			height: 529px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			display: inline-block;
			text-align: left;
			top: 90px;
			padding: 0 0 0 25px;
		}
		table{
			border-collapse: collapse;
			padding: 0;
			margin: 0;
			position: relative;
			top: 55px;
			padding: 0;
			margin: 0;
		}
		th{
			font-size: 20px;
			font-family: montserrat semibold;
			height: 44px;
			width: 234px;
			padding: 0 0 0 5px;
		}
		td{
			font-size: 16px;
			font-family: Montserrat medium;
			height: 44px;
			width: 360px;
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
			left: 259px;
			border: none;
		}
		textarea{
			width: 300px;
			height: 100px;
			border-radius: 20px;
			border: 2px solid #BBBBBB;
			font-size: 16;
			font-family: montserrat;
			resize: none;
			padding: 10px 10px;
			margin: 0;
		}

		/* Button */
		button{
			background-color: #E05B36;
			border: none;
			color: white;
			transition: 0.3s;
		}
		button:hover{
			background-color: #FFFFFF;
			color: #E05B36;
			text-align: center;
			outline: 3px solid #E05B36;
			outline-offset: -3px;
			cursor: pointer;
		}
		.button-lapor{
			padding: 10px 20px;
			background-color: #E05B36; 
			border-radius: 30px;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
		}
		.link-batal{
			color: #E05B36;
			font-family: montserrat semibold;
			font-size: 20px;
			text-decoration: none;
			display: inline-block;
			cursor: pointer;
			transition: 0.3s;
		}
		.link-batal:hover {
			text-decoration: underline;
		}

		.button-iyakirim{
			padding: 10px 20px;
			background-color: #E05B36; 
			border-radius: 30px;
			position: relative;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
			top: 50px;
			left: 30px;
		}
		.button-ok{
			padding: 10px 20px;
			background-color: #E05B36; 
			border-radius: 30px;
			position: relative;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
			top: 40px;
			color: white;
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
	</style>
</head>
<body>
	<?php $this_page='pelaporan'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("/page_template.php"); ?>

		<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content"> <!-- Intinya style dari id="page-content" tapi tanpa padding -->
			<div class="row">
				<div id="pelaporan-user">
					<p style="display: inline; font-family: montserrat medium; margin: 0;">Pelaporan </p><p style="color: #E05B36; display: inline; margin: 0;"><?php echo $_SESSION['username'];?></p>
				</div>

				<!-- Tabel -->
				<div class="col12" style="position: absolute; top: 0; text-align: left;">
					<div id="table-box">
						<p style="position: relative; top: 30px; left: 5px; margin: 0; padding: 0; font-family: montserrat medium; font-size: 20px;">Kenapa pelanggan ini bermasalah?</p>
						<hr style='width: 867px; position: absolute; border-radius: 5px; height: 2px; top: 65px; left: 25px; background-color: black; padding: 0; margin: 0; border: none;'>
						<?php
							require 'koneksi.php';
							if(isset($_GET['pelanggan'])){
						        $pelanggan =$_GET['pelanggan'];
						    }
						    else {
						        die("Datanya tidak ada");
						    }
						    $data = mysqli_query($conn, "SELECT * FROM ulasan WHERE pelanggan='$pelanggan'");
						    $hasil =mysqli_fetch_array($data);
						?>
						<table>
							<tr>
								<th>Nama pelanggan</td>
								<td><?php echo $hasil['pelanggan']?></td>
							</tr>
							<tr>
								<th>Produk yang dibeli</td>
								<td><?php echo $hasil['produk']?></td>
							</tr>
							<tr>
								<th>Tanggal pembelian </td>
								<td><?php echo $hasil['tanggal']?></td>
							</tr>
							<tr>
								<th>Rating</td>
								<td style='color: #E0D74C;'><img src=../star.svg style='margin: 0 5px 0 0; position: relative; top: 3px;'><?php echo $hasil['rating']?></td>
							</tr>
							<tr>
								<th>Komentar</td>
								<td><?php echo $hasil['komentar']?></td>
							</tr>
							<tr>
								<th>Alasan</td>
								<td><textarea name="alasan" id="alasan" rows="4" cols="50"> </textarea></td>
							</tr>
						</table>

						<!-- Garis tengah -->
						<div class="line"></div>

						<!-- Button Lapor & Batal -->
						<div style="position: relative; top: 68px; left: 307px;">
							<button class="button-lapor" onclick="location.href='#lapor'">Lapor</button>
							<a href="pelaporan.php" class="link-batal" style="margin-left: 40px;">Batal</a>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Pop-up -->
			<div class="col12">
				<!-- Pop-up Konfirmasi -->
				<div id="lapor" class="konfirmasi">
					<div class="konfirmasi-lapor">
						<p style="font-size: 20px; font-family: montserrat semibold; padding: 40px 0 0 30px; text-align: left; margin: 0;">Kirim laporan anda?</p>
						<a onclick="location.href=''" class='link-batal' style="display: inline-block; margin: 0; padding: 0; position: relative; top: 50px;">Batal</a>
						<button class="button-iyakirim" onclick="location.href='#kirim-lapor'">Iya, Kirim</button>
					</div>
				</div>

				<!-- Pop-up sudah terkonfirmasi -->
				<div id="kirim-lapor" class="konfirmasi">
					<div class="konfirmasi-lapor" id="berhasil">
						<img src=confirmpic.svg style='margin: 0 0 0 0; position: relative; top: 10.5px;'>
						<p style="text-align: center; position: relative; top: 15.7px; font-size: 20px; font-family: montserrat semibold; margin: 0; padding: 0;">Laporan anda sudah terkirim!</p>
						<button class="button-ok" onclick="location.href='pelaporan.php'">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>

<!-- Autentikasi -->
<?php  } else {
    header('Location: ../index.php');
}