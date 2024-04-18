<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ulasan Pelanggan</title>
	<style type="text/css">
		#ulasan-user{
			color: black;
			position: relative;
			text-align: left;
			left: 6px;
			top: 40px;
			font-size: 25px;
			font-family: montserrat semibold;
		}
		#table-box{
			width: 958px;
			height: 529px;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.16);
			border-radius: 30px;
			background-color: white;
			position: relative;
			display: inline-block;
			text-align: center;
			top: 90px;
			padding: 0 0 0 30px;
		}
		a{
			font-size: 20px; 
			font-family: montserrat semibold; 
			color: #E05B36;
			text-decoration: none;
		}
		table{
			border-collapse: collapse;
			margin: 0;
			padding: 0;
		}
		td{
			font-size: 16px;
			font-family: montserrat medium;
			height: 90px;
			padding: 0 5px;
			margin: 0;
		}
		th{
			font-size: 20px;
			font-family: montserrat semibold;
			height: 37px;
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
		}
	</style>
</head>
<body>
	<?php $this_page='ulasan'; ?> <!-- Ini nama pagenya supaya bisa active di navbar -->
	<!-- Untuk sidebar, header dan content disambung mulai dari sini. -->
	<?php require("page_template.php"); ?>

		<!--Sambungan dari div class:"content" dari page_template dan tutupnya juga disini-->
		<div class="col12" id="page-content"> <!-- Intinya style dari id="page-content" tapi tanpa padding -->
			<div class="row">
				<div id="ulasan-user">
					<p style="display: inline; font-family: montserrat medium; margin: 0;">Ulasan </p><p style="color: #E05B36; display: inline; margin: 0;"><?php echo $_SESSION['username'];?></p>
				</div>
				<div class="col12" style="position: absolute; top: 0; text-align: left;">
					<div id="table-box">
						<?php
						require 'config.php';
						$per_page_record = 5;
						if (isset($_GET["page"])) {
				            $page  = $_GET["page"];    
				        }    
				        else {    
				          $page=1;    
				        }    
				    
				        $start_from = ($page-1) * $per_page_record;     
				    
				        $query = "SELECT pelanggan, produk, jumlah, total, rating, tanggal, komentar FROM ulasan LIMIT $start_from, $per_page_record";     
				        $rs_result = mysqli_query ($conn, $query);
						echo "<table>
								<tr style='height: 79px;'>
									<th style='width: 132px;'>Pelanggan</th>
									<th style='width: 144px;'>Produk</th>
									<th style='width: 87px;'>Jumlah</th>
									<th style='width: 154px;'>Total</th>
									<th style='width: 79px;'>Rating</th>
									<th style='width: 116px;'>Tanggal</th>
									<th style='width: 198px;'>Komentar</th>
								</tr>
								<hr style='width: 908px; position: absolute; border-radius: 5px; border: 1px solid black; top: 79px; left: 25px; background-color: black; margin: 0; padding: 0;'>";
						  // output data of each row
						$awal = 169;
						$tambah = 0;
						$jlh_garis = 0;
						while($row = mysqli_fetch_array($rs_result)) {
							$tambah = $awal + $tambah;
							$awal= 90;
						    echo "<tr>
						    		<td>".$row["pelanggan"]. "</td>
						    		<td>".$row["produk"]. "</td>
									<td>".$row["jumlah"]. "</td>
									<td>Rp. ".$row["total"]. "</td>
						    		<td style='color: #E0D74C;'><img src=star.svg style='margin: 0 5px 0 0; position: relative; top: 3px;'>".$row["rating"]. "</td>
						    		<td>".$row["tanggal"]. "</td>
						    		<td>".$row["komentar"]. "</td>
						    	  </tr>";
							$jlh_garis++;
							if ($jlh_garis < 5) {
								echo "<hr style='top: " . $tambah . "px;' id='garis'>";
							}
						    	
						}
						echo "</table>";
						?>
						<div class="col12" id="page">
							<?php  
								$query = "SELECT COUNT(*) FROM ulasan";     
								$rs_result = mysqli_query($conn, $query);     
								$row = mysqli_fetch_row($rs_result);     
								$total_records = $row[0];     
								
								// echo "</br>";     
								// Number of pages required.   
								$total_pages = ceil($total_records / $per_page_record);     
								// kembali ke halaman sebelumnya
								if($page >= 2){
									echo "<a href='ulasan.php?page=".($page-1)."' id='page-num' style='padding: 0 20px 0 0;'>  &lt; </a>";
								} else {
									echo "<a href='' id='page-num' style='padding: 0 20px 0 0; color: black'>  &lt; </a>";
								}
								?>

								<!-- nomor halaman -->
							<p style="font-size: 20px; font-family: montserrat medium; display: inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;">Page</p> <p style="color: #E05B36; font-size: 20px; display: inline-block; padding: 0; margin: 0; font-family: montserrat medium; position: relative; bottom: 26px;"><?php echo $page; ?></p> <p style="font-size: 20px; font-family: montserrat medium; display:inline-block; padding: 0; margin: 0; position: relative; bottom: 26px;"> of <?php echo $total_pages; ?></p>
							<?php
								// ke halaman selanjutnya
								if($page < $total_pages){
									echo "<a href='ulasan.php?page=".($page+1)."' id='page-num' style='padding: 0 0 0 20px;'>  &gt; </a>"; 
								} else {
									echo "<a href='' id='page-num' style='padding: 0 0 0 20px; color: black'>  &gt; </a>";
								}
							?>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div> <!-- Ini tutupnya div class:"content" sambungan dari page_template.php dan JANGAN DIHAPUS -->
</body>
</html>

