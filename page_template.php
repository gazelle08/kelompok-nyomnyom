<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			font-family: Montserrat;
		}

		/*CSS for responsive grid*/
		* {
			box-sizing: border-box;
		}
		
		.row::after {
			content: "";
			clear: both;
			display: block;
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

		/* Use a media query to add a breakpoint at 700px: */
		@media screen and (max-width: 700px) {
			.sidebar {
				width: 100%;
				position: relative;
			}
			.sidebar a{
				text-align: center;
				float: none;
			}
			div.content{
				margin-left: 0;
			}
			[class*="col"] {
				width: 100%; /* The width is 100%, when the viewport is 700px or smaller */
			}
		}

		/*CSS for sidebar*/
		.sidebar{
			margin: 0;
			padding: 0;
			width: 356px;
			background-color: #E05B36;
		  	position: fixed;
		  	height: 100%;
		  	overflow: hidden;
		  	color: white;
		}
		.sidebar a {
			font-family: montserrat medium;
			font-size: 20px;
			display: block;
			color: white;
			padding: 8px 0 8px 20px;
			text-decoration: none;
		}
		.sidebar a.active {
			background-color:white;
			color: #E05B36;
		}
		.sidebar a:hover:not(.active) {
			background-color:white;
			color: #E05B36;
		}

		/*CSS for footer*/
		footer {
			position: fixed;
			width: 356px;
			bottom: 20px;
		}

		/*CSS for content*/
		div.content {
			padding-left: 356px;
			width: 100%;
			height: 100%;
			position: absolute;
			left: 0;
			z-index: -1;
		}

		/*CSS for icons in header*/
		#header{
			position: sticky;
			top: 0 ;
			background-color: white;
			height: 61px;
			z-index: 1;
		}
		#user-icon{
			background-color: #E05B36;
			border-radius: 46px;
			padding: 8px 12px;
			float: right;
			position: relative;
			top: 10px;
			right: 60px;
		}
		#profile {
			width: 25px;
			height: 25px;
			border-radius: 50%;
			display: inline-block;
			vertical-align: middle;
			margin-right: 8px;
			background-color: white;
		}
		#username{
			display: inline-block;
			padding: 0;
			margin: 0;
			vertical-align: middle;
			font-family: montserrat medium;
			font-size: 20px;
			color: white;
		}
		#logout{
			padding-top: 17.4px;
			position: relative;
			top: 0;
			right: 38.4px;
			float: right;
		}

		/*CSS for content page
		Ingat pakai ini untuk warna background halaman dan padding kiri 32px untuk kemudahan layout
		Ingat juga dipakai setelah header seperti di home page
		Untuk tahu letak paddingnya, bisa dicek di halamannya langsung dengan klik kanan dan pilih inspect lalu cursornya diletakkan di line yg ingin dilihat
		Padding berwarna hijau dan Margin berwarna oranye*/
		#page-content{
			background-color: #FAFAFA;
			height: 100%;
			margin: 0;
			padding: 0 0 0 32px;
			position: relative;
		}
	</style>
</head>
<body style="padding: 0; margin: 0; overflow-x: hidden;">
	<div class="sidebar">
		<p style="font-size: 39.06px; text-align: left; padding-left: 20px;"><b>Goket</b></p>
		<hr style="width: 57px; border: 3px solid white; background-color: white; margin : -30px 0 72px 24px; border-radius: 5px;">
		<a class="<?php if($this_page=='beranda'){
                     echo 'active';}?>" href="../home page/home_page.php">Beranda</a>
		<a class="<?php 
                if($this_page=='produk'){
                     echo 'active';
                }
          ?>" href="../produk/produk_page.php">Produk</a>
		<a class="<?php 
                if($this_page=='chat'){
                     echo 'active';
                }
          ?>" href="../chat/chat.php">Chat</a>
		<a class="<?php 
                if($this_page=='pesanan'){
                     echo 'active';
                }
          ?>" href="../pesanan/pesanan.php">Pesanan</a>
		<a class="<?php 
                if($this_page=='ulasan'){
                     echo 'active';
                }
          ?>" href="../ulasan/ulasan.php">Ulasan Pelanggan</a>
		<a class="<?php 
                if($this_page=='pelaporan'){
                     echo 'active';
                }
          ?>" href="../pelaporan/pelaporan.php">Pelaporan</a>
		<a class="<?php 
                if($this_page=='tentang-goket'){
                     echo 'active';
                }
          ?>" href="../about goket/tentang_goket.php">Tentang Goket</a>

		<!-- Footer -->
		<footer>
			<hr style="width: 259px; border: 1px solid white; background-color: white; margin : 0 0 20px 48.5px; border-radius: 5px;">
			<p style="color: white; font-size: 16px; font-family: montserrat semibold; margin: 0px 0px 0 33px;">&copy; Goket 2022. Hak Cipta Dilindungi</p>
		</footer>
	</div>

	<div class="content">
		<!-- Header -->
		<div class="col12" id="header">
			<a href="../logout.php" id="logout"><img src="../logout.svg"></a>
			<div id="user-icon">
				<div id="profile"> </div>
				<p id="username"><?php echo $_SESSION['username'];?></p>
			</div>
		</div>
		<!-- Nanti jangan lupa ditutup div nya di page yang menggunakan div class:"content" -->
		<!-- Jangan lupa juga untuk pakai div class: "page-content" di halaman selain tentang goket untuk warna background serta padding kiri 32px untuk kemudahan layout. -->
</body>
</html>
