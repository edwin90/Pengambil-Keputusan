<?php
require('../../config.php');
koneksi_on();

if(isset($_POST['cek']) && strlen($_POST['cek'])){
	$cek = $_POST['cek'];
	if ($cek==01){
	$cekrusak = $_POST['cek_kd_rusak'];
	$query_rusak = @mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak like '$cekrusak'");
	$ketemu_rusak = @mysql_num_rows($query_rusak);
		if ($ketemu_rusak>0){
			$data_rusak = @mysql_fetch_array($query_rusak);
			echo $data_rusak['nm_rusak'];
		}else{
			echo 'Data tidak ditemukan... !!!';
		}
	}else if ($cek==02){
	$ceksolusi = $_POST['cek_kd_solusi'];
	$query_solusi = @mysql_query("SELECT * FROM tb_solusi WHERE kd_solusi like '$ceksolusi'");
	$ketemu_solusi = @mysql_num_rows($query_solusi);
		if ($ketemu_solusi>0){
			$data_solusi = @mysql_fetch_array($query_solusi);
			echo $data_solusi['nm_solusi'];
		}else{
			echo 'Data tidak ditemukan... !!!';
		}
	}else if ($cek==03){
	$cekrusak = $_POST['cek_kd_rusak'];
	$query_ks = @mysql_query("SELECT * FROM tb_kesimpulan WHERE kd_rusak like '$cekrusak'");
	$ketemu_ks = @mysql_num_rows($query_ks);
		if ($ketemu_ks>0){
			echo 'dataketemu';
		}else{
			echo 'datatidakketemu';
		}
	}
}

koneksi_off();
?>
