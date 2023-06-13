<?php 
session_start();
if(isset($_GET['logout']) AND $_GET['logout']=='1'){
	unset($_SESSION['login']);
	session_destroy();
}
if (!isset($_SESSION['login']) || empty($_SESSION['login'])){
	header('location:../');
}
?>
<!DOCTYPE HTML>
<html lang="in">
<head>
	<meta charset="UTF-8">
	<title>Sistem Pakar Diagnosa Kerusakan Mobil Suzuki Carry</title>
	<link rel="shortcut icon" href="../img/icon-tab.png"/>
	<link rel="stylesheet" href="../css/main.css"/>
	
</head>
<body onload="show(hal);">
<div id="top">
	<div id="menu">
		<ul>
			<li class="menu-home-admin"><a href="?hal=home"><i class="ico-home"></i></a></li>
			<li><a href="?hal=konsultasi">KONSULTASI</a></li>
			<li><a>BASIS PENGETAHUAN<span class="icon-down"></span></a>
				<ul>
				<div class="icon-up-out"></div>
				<div class="icon-up-in"></div>
					<li><a href="?hal=gejala">GEJALA</a></li>
					<li><a href="?hal=kerusakan">KERUSAKAN</a></li>
					<li><a href="?hal=solusi">SOLUSI</a></li>
					<li><a href="?hal=kesimpulan">KESIMPULAN</a></li>
					<li><a href="?hal=langkah">LANGKAH PERBAIKAN</a></li>
					<li><a href="?hal=pohon">POHON KEPUTUSAN</a></li>
				</ul>
			</li>
			<li><a href="?hal=about">ABOUT</a></li>
		</ul>
		<ul class="menu-login">
			<li><a><i class="ico-user"></i> <?php echo $_SESSION['login']['nm']; ?><span class="icon-down"></span></a>
				<ul>
				<div class="icon-up-out"></div>
				<div class="icon-up-in"></div>
					<li><a href="?hal=editakun">Ubah akun</a></li>
					<li><a href="?logout=1">Keluar</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<div id="konten">
	<div id="hal">
			<div class="loader"></div><div class="txtloader">Loading</div>
		<!-- memanggil form -->
	</div>
</div>
<div id="footer">
	<p>
		Copyright &#169; 2014 Sistem Pakar Diagnosa Kerusakan Mobil Suzuki Carry<br>
		Designed by Edwin Achmad Fahmi | <a href="http://stmikbinapatria.ac.id/home/" target="_blank" title="stmikbinapatria.ac.id">STMIK BIPA MAGELANG</a>
	</p>
</div>
<!-- memanggil berkas javascript -->
<script src="../js/jquery-1.11.1.js"></script>
<script src="../admin/js/admin-ajax-ui.js"></script>
<script src="../js/support.js"></script>
<div id="backdrop"></div>
</body>
</html>