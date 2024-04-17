<!-- Autentikasi -->
<?php require('../config.php');
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
	<?php $this_page='laporan-pelanggan'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("../page_template.php"); ?>

		<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content"> <!-- Intinya style dari id="page-content" tapi tanpa padding -->
        <form method="POST" action="input_form_laporan.php">
              <div class="card-body">
                <div class="form-group">
                  <label> Id Pesanan </label>
                  <!-- Gunakan nomor peminjaman yang telah dibuat -->
                  <input type="text" class="form-control" name="id_pesanan" placeholder="Id Pesanan" value="<?php echo $id_pesanan; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Status Laporan</label>
                  <input type name="status_laporan" id="status_laporan"></text>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <text area name="keterangan" id="keterangan"></text>
                </div>
                
              </div> <!-- This closing div was missing -->

              <div class="form-group"> <!-- New div for the button -->
                <div class="card-footer">
                  <input type="submit" name="tambah" value="SIMPAN" class="btn btn-primary">
                </div>
              </div> <!-- This closing div was missing -->      

                  

              </form>
	</div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>

<!-- Autentikasi -->
<?php  } else {
    header('Location: ../index.php');
}