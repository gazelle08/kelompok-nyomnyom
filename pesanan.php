<!-- Autentikasi -->
<?php
	require('../config.php');
    if(is_logged_in()){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project WEB 1</title>
	<style type="text/css">
		#pesanan-user{
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
			padding: 0 0 0 35px;
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

		/* Untuk tombol dropdown */
        #ubah{
			font-size: 16px;
            color: white;
			background-color: #E05B36;
            padding: 10px 20px;
			font-family: montserrat semibold;
			transition: 0.3s;
			cursor: pointer;
            border: none;
            border-radius: 30px;
		}
        .dropdown{
            position: relative;
            display: inline-block;
        }
        .dropdown-pil{
            display: none;
            position: absolute;
            background-color: #FFFFFF;
            min-width: 84px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            z-index: 1;
        }
        .dropdown-pil a{
            color: black;
            font-size: 12px;
            font-family: montserrat semibold;
            padding: 10px 4px;
            text-decoration: none;
            display: block;
        }
        .dropdown-pil a:hover{
            background-color: #F0F0F0;
        }
        .dropdown:hover .dropdown-pil{
            display: block;
        }
        .dropdown:hover #ubah{
            background-color: white;
			color: #E05B36;
            font-family: montserrat semibold;
            outline: 3px solid #E05B36;
            outline-offset: -3px;
        }

        /* CSS untuk penomoran halaman */
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
			color: #E05B36;
		}

	</style>
</head>
<body>
	<?php $this_page='pesanan'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("../page_template.php"); ?>

		<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content">
			<!-- Halo User! -->
			<div class="row">
				<div id="pesanan-user">
					<p style="display: inline; font-family: Montserrat medium; margin: 0;">Pesanan </p>
					<p style="color: #E05B36; display: inline; font-family: montserrat semibold; margin: 0;"><?php echo $_SESSION['username'];?></p>
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
							<th style='width: 122px;'>Pelanggan</th>
							<th style="width: 190px;">Produk</th>
							<th style='width: 87px;'>Jumlah</th>
							<th style='width: 139px;'>Total</th>
							<th style="width: 116px;">Tanggal</th>
                            <th style="width: 21px;"><!-- Tempat kosong diantara kolom --></th>
							<th style='width: 120px;'>Status</th>
                            <th style="width: 96px;"><!-- Kolom tempat tombol dropdown --></th>
						</tr>
						<hr style='width: 908px; position: absolute; border-radius: 5px; border: none; height: 2px; top: 79px; left: 25px; background-color: black; margin: 0; padding: 0;'>
					  	<!--output data of each row -->
						<?php
						//Run query to display all data based on status and date
						$query = "SELECT * FROM pesanan ORDER BY status ASC, tanggal DESC LIMIT $start_from, $per_page_record";
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
						// Query result will be printed with while loop
						while($row = mysqli_fetch_assoc($result)){
							$tambah = $awal + $tambah;
							$awal= 90;
						 ?>
						 	<!-- Sambungan Table -->
							<tr>
						    <td><?php echo $row['pelanggan'];?></td>
							<td><?php echo $row['produk'];?></td>
						    <td><?php echo $row['jumlah'];?></td>
						    <td>Rp. <?php echo $row['total'];?></td>
                            <td><?php echo $row['tanggal'];?></td>
                            <td></td>
                            <td style="color:
                            /* Untuk mengubah warna sesuai dengan status  */
                            <?php
                            if ($row['status']=="Baru") {
                                echo "#E02B58";
                            } elseif ($row['status']=="Siap Dikirim") {
                                echo "#1D3794";
                            } else {
                                echo "#06956A";
                            }?>;"><b><?php echo $row['status'];?><b></td>
                            <td>
                                <div class="dropdown">
                                    <button id="ubah">Ubah</button>
                                    <!-- Form untuk mengubah dropdown-->
							        <form action="update_status.php?id=<?php echo $row['id'];?>" method="POST">
                                        <div class="dropdown-pil">
                                            <!-- Link mengirimkan id dan nomor enum status untuk diproses di update_status.php -->
                                            <a href="update_status.php?id=<?php echo $row['id'];?>&status=1">Baru</a>
                                            <a href="update_status.php?id=<?php echo $row['id'];?>&status=2">Siap Dikirim</a>
                                            <a href="update_status.php?id=<?php echo $row['id'];?>&status=3">Selesai</a>
                                        </div>
                                    </form>
                                </div>
                            </td>
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
                            $query = "SELECT COUNT(*) FROM pesanan";     
                            $rs_result = mysqli_query($conn, $query);     
                            $row = mysqli_fetch_row($rs_result);     
                            $total_records = $row[0];     
                            
                            // echo "</br>";     
                            // Number of pages required.   
                            $total_pages = ceil($total_records / $per_page_record);     
                            // kembali ke halaman sebelumnya
                            if($page >= 2){
                                echo "<a href='pesanan.php?page=".($page-1)."' id='page-num' style='padding: 0 20px 0 0;'>  &lt; </a>";
                            } else {
                                echo "<a href='' id='page-num' style='padding: 0 20px 0 0; color: black'>  &lt; </a>";
                            }
                            ?>

                            <!-- nomor halaman -->
                        <p style="font-size: 20px; font-family: montserrat medium; display: inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;">Page</p> <p style="color: #E05B36; font-size: 20px; display: inline-block; padding: 0; margin: 0; font-family: montserrat medium; position: relative; bottom: 26px;"><?php echo $page; ?></p> <p style="font-size: 20px; font-family: montserrat medium; display:inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;"> of <?php echo $total_pages; ?></p>
                        <?php
                            // ke halaman selanjutnya
                            if($page < $total_pages){
                                echo "<a href='pesanan.php?page=".($page+1)."' id='page-num' style='padding: 0 0 0 20px;'>  &gt; </a>"; 
                            } else {
                                echo "<a href='' id='page-num' style='padding: 0 0 0 20px; color: black'>  &gt; </a>";
                            }
                        ?>
					</div>
				</div>
			</div>
		</div> <!-- Tutup div class:"col12" id="page-content" -->
	 </div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>

<!-- Autentikasi -->
<?php
} else {
    header('Location: ../index.php');
}