<?php
require('../../config.php');
koneksi_on();
// proses menghapus data
if(isset($_POST['dt']) && strlen($_POST['dt']) && isset($_POST['hps']) && strlen($_POST['hps'])){
	// deklarasikan variabel
	$dt = $_POST['dt'];
	$hps = $_POST['hps'];
	// hapus data gejala
	if($dt=='1'){ 
		mysql_query("DELETE FROM tb_gejala WHERE kd_gejala='$hps'");
	// hapus data rusak
	}else if($dt=='2'){
		mysql_query("DELETE FROM tb_rusak WHERE kd_rusak='$hps'");
	// hapus data solusi
	}else if($dt=='3'){
		mysql_query("DELETE FROM tb_solusi WHERE kd_solusi='$hps'");
	// hapus data kesimpulan	
	}else if($dt=='4'){
		mysql_query("DELETE FROM tb_kesimpulan WHERE id_kesimpulan='$hps'");
	// hapus data langkah dan gambar dalam folder project
	}else if($dt=='5'){
		$data_langkah = @mysql_fetch_array(mysql_query("SELECT * FROM tb_langkah WHERE kd_langkah='$hps'"));
		if (mysql_query("DELETE FROM tb_langkah WHERE kd_langkah='$hps'")){
			$urlgambar = '../../img/project/'.$data_langkah['gambar'];
			unlink($urlgambar);
		}
	// hapus data pohon
	}else if($dt=='6'){
		mysql_query("DELETE FROM tb_pohon WHERE kd_pohon='$hps'");
	}
}else if(isset($_POST['kd_gejala']) && strlen($_POST['kd_gejala'])){
	// deklarasikan variabel gejala
	$id = $_POST['id'];
	$kdgejala = $_POST['kd_gejala'];
	$nmgejala = $_POST['nm_gejala'];
	// proses tambah data gejala
	if($id=='0'){
		mysql_query("INSERT INTO tb_gejala VALUES('$kdgejala','$nmgejala')");
	// proses ubah data gejala
	}else{
		mysql_query("UPDATE tb_gejala SET nm_gejala = '$nmgejala' WHERE kd_gejala = '$kdgejala'");
	}
}else if(isset($_POST['kd_rusak']) && strlen($_POST['kd_rusak'])){
	// deklarasikan variabel rusak
	$id = $_POST['id'];
	$kdrusak = $_POST['kd_rusak'];
	$nmrusak = $_POST['nm_rusak'];
	// proses tambah data rusak
	if($id=='0'){
		mysql_query("INSERT INTO tb_rusak VALUES('$kdrusak','$nmrusak')");
	// proses ubah data rusak
	}else{
		mysql_query("UPDATE tb_rusak SET nm_rusak = '$nmrusak' WHERE kd_rusak = '$kdrusak'");
	}
}else if(isset($_POST['kd_solusi']) && strlen($_POST['kd_solusi'])){
	// deklarasikan variabel solusi
	$id = $_POST['id'];
	$kdsolusi = $_POST['kd_solusi'];
	$nmsolusi = $_POST['nm_solusi'];
	// proses tambah data solusi
	if($id=='0'){
		mysql_query("INSERT INTO tb_solusi VALUES('$kdsolusi','$nmsolusi')");
	// proses ubah data solusi
	}else{
		mysql_query("UPDATE tb_solusi SET nm_solusi = '$nmsolusi' WHERE kd_solusi = '$kdsolusi'");
	}
}else if(isset($_POST['kd_pengguna']) && strlen($_POST['kd_pengguna'])){
	// deklarasikan variabel pengguna
	$kdpengguna = $_POST['kd_pengguna'];
	$nm = $_POST['nm_pengguna'];
	$pass = $_POST['password'];
		// enkripsi
		$e_nm = sha1($nm);
		$e_pass = sha1($pass);
	// update akun	
		mysql_query("UPDATE tb_pengguna SET nm_pengguna = '$e_nm', pass_pengguna = '$e_pass' WHERE kd_pengguna = $kdpengguna");
	// ubah session
		session_start();
		$_SESSION['login']['nm'] = $nm;
		$_SESSION['login']['pass'] = $pass;
}else if(isset($_POST['id_kesimpulan']) && strlen($_POST['id_kesimpulan'])){
	// deklarasikan variabel kesimpulan
	$id = $_POST['id'];
	$idkesimpulan = $_POST['id_kesimpulan'];
	$kskdrusak = $_POST['ks_kd_rusak'];
	$kskdsolusi = $_POST['ks_kd_solusi'];
	// proses tambah data kesimpulan
	if($id=='0'){
		mysql_query("INSERT INTO tb_kesimpulan VALUES('','$kskdrusak','$kskdsolusi')");
	// proses ubah data kesimpulan
	}else{
		mysql_query("UPDATE tb_kesimpulan SET kd_rusak = '$kskdrusak' , kd_solusi = '$kskdsolusi' WHERE id_kesimpulan = '$idkesimpulan'");
	}
}else if(isset($_POST['kd_pohon']) && strlen($_POST['kd_pohon'])){
	// deklarasikan variabel pohon
	$id = $_POST['id'];
	$kdpohon = $_POST['kd_pohon'];
	$kdgejala = $_POST['kdgejala'];
	$idchildt = $_POST['idchildt'];
	$idchildf = $_POST['idchildf'];
	// proses tambah data pohon
	if($id=='0'){
		mysql_query("INSERT INTO tb_pohon VALUES('','$kdgejala','$idchildt','$idchildf')");
	// proses ubah data pohon
	}else{
		mysql_query("UPDATE tb_pohon SET kd_gejala = '$kdgejala', id_child_t = '$idchildt', id_child_f = '$idchildf' WHERE kd_pohon = '$kdpohon'");
	}
}else if(isset($_POST['kd_langkah']) && strlen($_POST['kd_langkah'])){
	// deklarasikan variabel langkah
	$id = $_POST['id'];
	$kdlangkah = $_POST['kd_langkah'];
	$urutan = $_POST['urutan'];
	$kdsolusi = $_POST['kdsolusi'];
	$nmlangkah = $_POST['nm_langkah'];
	// proses ubah data langkah
	if($id!='0'){
		mysql_query("UPDATE tb_langkah SET nm_langkah = '$nmlangkah', urutan = '$urutan', kd_solusi = '$kdsolusi' WHERE kd_langkah = '$kdlangkah'");
	}
}
koneksi_off();
?>
