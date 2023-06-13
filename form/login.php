<?php
require('../config.php');
koneksi_on();
session_start();

if(isset($_POST['var_nm']) and isset($_POST['var_pass'])){
	// proteksi SQL Injection
	$nm = addslashes($_POST['var_nm']);
	$pass = addslashes($_POST['var_pass']);
		// enkripsi sha1 pada username dan password
		$e_nm = sha1($nm);
		$e_pass = sha1($pass);
		if($nm=="" && $pass==""){
			echo 'User akun tidak berlaku !';	
		}else{
			$check = mysql_query("SELECT * FROM tb_pengguna WHERE nm_pengguna='$e_nm' AND pass_pengguna='$e_pass'");
			if( @mysql_num_rows($check) == 0 ){
				echo 'Nama pengguna atau kata sandi salah !';
			}else{
				$_SESSION['login']['nm'] = $nm;
				$_SESSION['login']['pass'] = $pass;
				echo '089-675-323-292';
			}
		}
}else{
	echo 'Are you kidding me ?';
}

koneksi_off();
?>