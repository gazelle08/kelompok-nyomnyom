<!-- Autentikasi -->
<?php
session_start();
include 'config.php';
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    // Displays data from database based on id
    $query = "SELECT * FROM data_product WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    // If data couldn't be shown, then this error will occur:
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // Collects data from database
    $data = mysqli_fetch_assoc($result);
      // If data doesn't exist in database, it will print this:
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='produk_page';</script>";
       }
  } else {
    // If there is no data from GET 'id', redirect to produk_page
    echo "<script>alert('Masukkan data id.');window.location='produk_page';</script>";
  }         
  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Edit Produk</title>
	<style type="text/css">
		/*CSS for icons in content*/
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
			top: 31px;
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
			width: 400px;
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
		
		/* Tombol ubah produk */
		.button-ubahbatal{
			position: relative;
			top: 62px;
			left: 162px;
		}

		#button-submit{
			background-color: #DE0D4F;
			color: white;
			font-family: montserrat semibold;
			font-size: 20px;
			padding: 10px 20px;
			border-radius: 30px;
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

		#link-batal{
			color: #DE0D4F;
			font-family: montserrat semibold;
			font-size: 20px;
			margin-left: 25px;
			transition: 0.3s;
			cursor: pointer;
			text-decoration: none;
		}

		#link-batal:hover {
			text-decoration: underline;
			border-radius: 30px;
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
		.konfirmasi-edit{
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
			<div class="row">
				<div id="produk-user">
					<p style="display: inline; font-family: Montserrat medium;">Ubah Produk</p>
					<p style="color: #DE0D4F; display: inline;"><?php echo $_SESSION['username'];?></p>
				</div>
			</div>

			<!-- Container -->
			<div class="col12" style="position: absolute; top: 0; text-align: left;">
				<!-- Form -->
				<div id="form">
					<p style="position: relative; top: 0; left: 5px; margin: 0; padding: 0; font-family: montserrat medium; font-size: 20px;">Mohon masukkan data untuk produk yang ingin diubah</p>
					<hr style='width: 867px; position: absolute; border-radius: 5px; height: 2px; top: 65px; left: 25px; background-color: black; padding: 0; margin: 0; border: none;'>

					<!-- Form Ubah -->
					<form action="proses_edit_produk.php" method="POST" enctype="multipart/form-data">
						<!-- Mengirimkan variable page ke proses_edit_produk.php -->
						<?php
						$page = $_GET['page'];
						?>
						<input type="hidden" name="page" id="page" value="<?php echo $page;?>">

						<table>
							<!-- Upload Foto -->
							<tr>
								<th>Foto</th>
								<td>
									<img src="images/<?php echo $data['foto']; ?>" style="width: 70px; height: 70px; display: inline-block; vertical-align: middle; margin-right: 30px;">
									<input style="display: inline-block; vertical-align: middle;" type="file" name= "foto" value="Upload foto">
								</td>
							</tr>

							<!-- Tempat kosong -->
							<tr style="height: 7px;"></tr>

							<!-- Nama Produk -->
							<tr>
								<th>Produk</th>
								<td><input id="form-input" type="text" name="produk" value="<?php echo $data['produk']; ?>"></td>
								<!-- id value output -->
								<!-- IMPORTANT!!  -->
								<input name="id" value="<?php echo $data['id']; ?>"  hidden />
							</tr>

							<!-- Stok Produk -->
							<tr>
								<th>Stok (pcs)</th>
								<td><input id="form-input" type="text" name="stok" value="<?php echo $data['stok']; ?>"></td>
							</tr>

							<!-- Harga -->
							<tr>
								<th>Harga</th>
								<td><input id="currency" type="text" name = "harga" value="<?php echo $data['harga'];?>"></td>
							</tr>

							<!-- Deskripsi Produk -->
							<tr>
								<th>Deskripsi</th>
								<td style="padding-top: 8px;"><textarea rows="4" cols="50" id="form-input-desc" name="deskripsi"><?php echo $data['deskripsi']; ?></textarea></td>
							</tr>
						</table>

						<!-- Garis tengah -->
						<div class="line"></div>
						
						<!-- Submit Form -->
						<div class="button-ubahbatal">
							<input id="button-submit" type="submit" value="Konfirmasi" >
							<a id="link-batal" href="produk_page.php?page=<?php echo $page;?>">Batal</a>
						</div>
					</form>	
					<!-- End of form -->
				</div>
			</div>
			
			<!-- Pop-up -->
			<div class="col12">
				<!-- Pop-up sudah terkonfirmasi -->
				<div id="konfirmasi" class="konfirmasi">
					<div class="konfirmasi-edit" id="berhasil">
						<img src="confirmpic.svg">
						<p style="text-align: center; position: relative; top: 15.7px; font-size: 20px; font-family: montserrat semibold; margin: 0; padding: 0;">Produk anda sudah diubah!</p>
						<button class="button-ok" onclick="location.href='produk_page.php?page=<?php echo $page;?>'">OK</button>
					</div>
				</div>
			</div>
		</div> <!-- Tutup div class:"col12" id="page-content" -->
	</div> 
	<script>
  $(function() {
    $('#currency').maskMoney({
      thousands: '.',
      decimal: ',',
      precision: 0
    });
  })
</script><!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>