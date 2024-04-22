<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project WEB 1</title>
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
		
		#table-box{
			width: 958px; /* sudah revisi */
			height: 529px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			display: inline-block;
			text-align: center;
			top: 90px;
			padding: 0 0 0 27px;
		}

		a {
			text-decoration: none;
		}

		#table-box table {
			border-collapse: collapse;
			padding: 0;
			margin: 0;
		}

		td{
			font-size: 16px;
			font-family: Montserrat medium;
			height: 90px;
			padding: 0 5px;
			margin: 0;
		}
		th{
			font-size: 20px;
			font-family: montserrat semibold;
			padding-top: 45px;
		}

		#garis{
			border: none;
			background-color: #DADADA;
			height: 1px;
			width: 898px;
			position: absolute;
			margin: 0;
			padding: 0;
			border-radius: 5px;
			left: 30px;
		}

		/* Untuk tombol ubah dan hapus produk */
		#ubah{
			font-size: 20px;
			color: #FBB4C6;
			font-family: montserrat semibold;
			text-decoration: none;
			transition: 0.3s;
			cursor: pointer;
		}
		#ubah:hover{
			text-decoration: underline;
		}
		
		#hapus{
			font-size: 20px;
			color: red;
			font-family: montserrat semibold;
			text-decoration: none;
			transition: 0.3s;
			cursor: pointer;
		}
		#hapus:hover{
			text-decoration: underline;
		}
		
		#button-tambah{
			background-color: #DE0D4F;
			color: white;
			font-family: montserrat semibold;
			text-decoration: none;
			font-size: 20px;
			padding: 5px 10px;
			border-radius: 30px;
			position: relative;
			top: 0;
			border: none;
			transition: 0.3s;
		}

		#button-tambah:hover {
			background-color: #FFFFFF;
			color: #DE0D4F;
			text-align: center;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
		}

		#page{
			position: absolute;
			top: 580px;
			font-family: montserrat medium;
			text-align: center;
		}
		#page-num{
			position: relative;
			bottom: 20px;
			text-align: center;
			font-size: 37px;
			font-family: montserrat medium;
			display: inline-block;
			color: #DE0D4F;
		}

		/*Tombol Pop-up */
		button{
			background-color: #DE0D4F;
			border: none;
			color: white;
			transition: 0.3s;
		}
		button:hover{
			background-color: #FFFFFF;
			color: #DE0D4F;
			text-align: center;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
		}
		.link-batal{
			color: #DE0D4F;
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

		.button-iyahapus{
			padding: 10px 20px;
			background-color: #DE0D4F; 
			border-radius: 30px;
			position: relative;
			display: inline-block;
			font-size: 20px;
			font-family: montserrat semibold;
			top: 50px;
			left: 30px;
			border: none;
			color: white;
			transition: 0.3s;
		}
		.button-iyahapus:hover{
			background-color: #FFFFFF;
			color: #DE0D4F;
			text-align: center;
			outline: 3px solid #DE0D4F;
			outline-offset: -3px;
			cursor: pointer;
		}
		.button-ok{
			padding: 10px 20px;
			background-color: #DE0D4F; 
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
		.konfirmasi-batal{
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
	<?php $this_page='produk'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("page_template.php"); ?>

		<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content">
			<!-- Halo User! -->
			<div class="row">
				<div id="produk-user">
					<p style="display: inline; font-family: Montserrat medium; margin: 0;">Produk </p>
					<p style="color: #DE0D4F; display: inline; font-family: montserrat semibold; margin: 0;"><?php echo $_SESSION['username'];?></p>
				</div>
			</div>

			<!-- Tabel -->
			<div class="col12" style="position: absolute; top: 0; text-align: left;">
				<div id="table-box">
					<!-- Pagination -->
					<?php
						// Connect to database
						include('config.php');
						$per_page_record = 5;
							if (isset($_GET["page"])) {    
								$page  = $_GET["page"];    
							}    
							else {    
							$page=1;    
							}    
						
						$start_from = ($page-1) * $per_page_record;
					?>
					<table>
						<tr style="height: 79px;">
							<th style='width: 100px;'>Foto</th>
							<th style="width: 21px;"></th>
							<th style='width: 210px;'>Nama Produk</th>
							<th style='width: 115px;'>Stok (Pcs)</th>
							<th style="width: 122px;">Harga</th>
							<th style='width: 170px;'>Deskripsi</th>
							<th style='width: 175px; padding-top: 40px;' colspan='2'><button id='button-tambah' onclick="location.href='form_tambah_produk.php'">Tambah +</button></th>
						</tr>
						<hr style='width: 908px; position: absolute; border-radius: 5px; border: none; height: 2px; top: 79px; left: 25px; background-color: black; margin: 0; padding: 0;'>
					  	<!--output data of each row -->
						<?php
						//Run query to display all data based on id 
						$query = "SELECT * FROM data_product ORDER BY id ASC LIMIT $start_from, $per_page_record";
						$result = mysqli_query($conn, $query);
						
						// Check if there is error when running query
						if(!$result){
						die ("Query Error: ".mysqli_errno($conn).
						" - ".mysqli_error($conn));
						}

						// Untuk penempatan garis
						$awal = 169;
						$tambah = 0;
						$jlh_garis = 0;

						// untuk update stok
						include('update_stok.php');

						// Query result will be printed with while loop
						while($row = mysqli_fetch_assoc($result)){
							$tambah = $awal + $tambah;
							$awal= 90;
						 ?>
						 	<!-- Sambungan Table -->
							<tr>
						    <td><img src="images/<?php echo $row['foto']; ?>" style="width: 70px; height: 70px; margin: 5px 0 0 0;"></td>
							<td></td>
						    <td><?php echo $row['produk']; ?></td>
						    <td><?php echo $row['stok']; ?></td>
							<td style="padding: 0;">Rp. <?php echo $row['harga'];?></td>
						    <td><?php echo $row['deskripsi']; ?></td>
							<!-- Form untuk memunculkan popup untuk penghapusan dan pengeditan-->
							<form action="produk_page.php?id=<?php echo $row['id'];?>#tanya-batal" method="POST">
								<td><a id="ubah" href="form_edit_produk.php?id=<?php echo $row['id'];?>&page=<?php echo $page;?>">Ubah</a></td>
								<td><input type="hidden" value="hapus"><a id="hapus" href="produk_page.php?id=<?php echo $row['id'];?>&page=<?php echo $page;?>#tanya-batal">Hapus</a></td>
							</form> 
						    </tr>
						<!-- Tutup While -->
						<?php
							$jlh_garis++;
							if ($jlh_garis < 5) {
								echo "<hr style='top: " . $tambah . "px;' id='garis'>";
							} 
						}
						?>
					</table>	

					<div class="col12" id="page">
							<?php  
								$query = "SELECT COUNT(*) FROM data_product";     
								$rs_result = mysqli_query($conn, $query);     
								$row = mysqli_fetch_row($rs_result);     
								$total_records = $row[0];     
								
								// echo "</br>";     
								// Number of pages required.   
								$total_pages = ceil($total_records / $per_page_record);     
								// kembali ke halaman sebelumnya
								if($page >= 2){
									echo "<a href='produk_page.php?page=".($page-1)."' id='page-num' style='padding: 0 20px 0 0;'>  &lt; </a>";
								} else {
									echo "<a href='' id='page-num' style='padding: 0 20px 0 0; color: black'>  &lt; </a>";
								}
								?>

								<!-- nomor halaman -->
							<p style="font-size: 20px; font-family: montserrat medium; display: inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;">Page</p> <p style="color: #DE0D4F; font-size: 20px; display: inline-block; padding: 0; margin: 0; font-family: montserrat medium; position: relative; bottom: 26px;"><?php echo $page; ?></p> <p style="font-size: 20px; font-family: montserrat medium; display:inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;"> of <?php echo $total_pages; ?></p>
							<?php
								// ke halaman selanjutnya
								if($page < $total_pages){
									echo "<a href='produk_page.php?page=".($page+1)."' id='page-num' style='padding: 0 0 0 20px;'>  &gt; </a>"; 
								} else {
									echo "<a href='' id='page-num' style='padding: 0 0 0 20px; color: black'>  &gt; </a>";
								}
							?>
					</div>
				</div>
			</div>

			<!-- Pop-up penghapusan -->
			<div class="col12">
				<!-- Pop-up Konfirmasi -->
				<div id="tanya-batal" class="konfirmasi">
					<div class="konfirmasi-batal">
						<p style="font-size: 20px; font-family: montserrat semibold; padding: 40px 0 0 30px; text-align: left; margin: 0;">Hapus produk?</p>
						<a href='' class='link-batal' style="display: inline-block; margin: 0; padding: 0; position: relative; top: 50px;">Batal</a>
						<!-- Menghapus produk dengan mengambil id dari input hapus -->
						<a class="button-iyahapus" href="proses_hapus_produk.php?id=<?php echo $_GET['id'];?>&page=<?php echo $page;?>">Iya, Hapus</a>

					</div>
				</div>

				<!-- Pop-up sudah terkonfirmasi -->
				<div id="iya-batal" class="konfirmasi">
					<div class="konfirmasi-batal" id="berhasil">
						<img src=confirmpic.svg style='margin: 0 0 0 0; position: relative; top: 10.5px;'>
						<p style="text-align: center; position: relative; top: 15.7px; font-size: 20px; font-family: montserrat semibold; margin: 0; padding: 0;">Produk anda sudah dihapus!</p>
						<button class="button-ok" onclick="location.href='produk_page.php?page=<?php echo $page;?>'">OK</button>
					</div>
				</div>
			</div>
		</div> <!-- Tutup div class:"col12" id="page-content" -->
	 </div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>
