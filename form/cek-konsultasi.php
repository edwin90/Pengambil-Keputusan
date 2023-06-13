<?php
require('../config.php');

koneksi_on();
// awal
if(isset($_POST['bagian']) && strlen($_POST['bagian'])){
	// deklarasikan variabel
	$bagian = $_POST['bagian'];
	$data_bgn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_bagian WHERE kd_bagian='$bagian'"));
	$gjl_utama = $data_bgn['kd_gejala_utama'];
	$data_gjl = @mysql_fetch_array(mysql_query("SELECT * FROM tb_gejala WHERE kd_gejala='$gjl_utama'"));
	$nm_gjl_utama = $data_gjl['nm_gejala'];
	echo '<input id="kd-gjl" value="'.$gjl_utama.'" hidden="true" style="display:none;"></input>'.$nm_gjl_utama.' <i class="ico-question-sign" title="Pilih jawaban Ya atau Tidak, &#13;dengan klik tombol dibawah."></i>';
}
// setelah klik tombol
if(isset($_POST['jawab']) && strlen($_POST['jawab'])){
	// deklarasikan variabel
	$kd_gjl = $_POST['jawab'];
	$id = $_POST['id'];
	if($id=='1'){// tombol ya
		if($data_phn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_pohon WHERE kd_gejala='$kd_gjl'"))){
			$child_true = $data_phn['id_child_t'];
			if($child_true=='0'){
				echo 'end';
			}else if($data_gjl = @mysql_fetch_array(mysql_query("SELECT * FROM tb_gejala WHERE kd_gejala='$child_true'"))){
				$nm_gjl_utama = $data_gjl['nm_gejala'];
				echo '<input id="kd-gjl" value="'.$child_true.'" hidden="true" style="display:none;"></input>'.$nm_gjl_utama.' <i class="ico-question-sign" title="Pilih jawaban Ya atau Tidak"></i>';
			}else if($data_rsk = @mysql_fetch_array(mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak='$child_true'"))){
				echo $child_true;
			}else if($data_bgn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_bagian WHERE kd_bagian='$child_true'"))){
				echo $child_true;
			}
		}else{
			echo 'kosong';
		}
	}else if($id=='0'){// tombol tidak
		if($data_phn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_pohon WHERE kd_gejala='$kd_gjl'"))){
			$child_false = $data_phn['id_child_f'];
			if($child_false=='0'){
				echo 'end';
			}else if($data_gjl = @mysql_fetch_array(mysql_query("SELECT * FROM tb_gejala WHERE kd_gejala='$child_false'"))){
				$nm_gjl_utama = $data_gjl['nm_gejala'];
				echo '<input id="kd-gjl" value="'.$child_false.'" hidden="true" style="display:none;"></input>'.$nm_gjl_utama.' <i class="ico-question-sign" title="Pilih jawaban Ya atau Tidak"></i>';
			}else if($data_rsk = @mysql_fetch_array(mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak='$child_false'"))){
				echo $child_false;
			}else if($data_bgn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_bagian WHERE kd_bagian='$child_false'"))){
				echo $child_false;
			}
		}else {
			echo 'kosong';
		}
	}else if($id=='2'){// tombol kembali
		$data_gjl = @mysql_fetch_array(mysql_query("SELECT * FROM tb_gejala WHERE kd_gejala='$kd_gjl'"));
			$nm_gjl_utama = $data_gjl['nm_gejala'];
			echo '<input id="kd-gjl" value="'.$kd_gjl.'" hidden="true" style="display:none;"></input>'.$nm_gjl_utama.' <i class="ico-question-sign" title="Pilih jawaban Ya atau Tidak"></i>';
	}else if($id=='9'){// tampil kerusakan jika kerusakan ditemukan
		$data_rsk = @mysql_fetch_array(mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak='$kd_gjl'"));
		$nm_kerusakan = $data_rsk['nm_rusak'];
		echo $nm_kerusakan;
	}else if($id=='8'){// tampil solusi jika kerusakan ditemukan
		if($data_ksp = @mysql_fetch_array(mysql_query("SELECT * FROM tb_kesimpulan WHERE kd_rusak='$kd_gjl'"))){
			$kd_sli = $data_ksp['kd_solusi'];
			if($data_sli = @mysql_fetch_array(mysql_query("SELECT * FROM tb_solusi WHERE kd_solusi='$kd_sli'"))){
				$nm_solusi = $data_sli['nm_solusi'];
				echo '<input id="kd-sli" value="'.$kd_sli.'" hidden="true" style="display:none;"></input>'.$nm_solusi;
			}
		}
	}else if($id=='7'){// konfirmasi jika ingin melanjutkan diagnosa pada sistem yang berbeda
		if($data_bgn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_bagian WHERE kd_bagian='$kd_gjl'"))){
			$nm_bagian = $data_bgn['nm_bagian'];
			echo $nm_bagian;
		}
	}else if($id=='6'){// Mengambil gejala utama dari sistem yang berbeda
		if($data_bgn = @mysql_fetch_array(mysql_query("SELECT * FROM tb_bagian WHERE kd_bagian='$kd_gjl'"))){
			$gjl_utama = $data_bgn['kd_gejala_utama'];
			$data_gjl = @mysql_fetch_array(mysql_query("SELECT * FROM tb_gejala WHERE kd_gejala='$gjl_utama'"));
			$nm_gjl_utama = $data_gjl['nm_gejala'];
			echo '<input id="kd-gjl" value="'.$gjl_utama.'" hidden="true" style="display:none;"></input>'.$nm_gjl_utama.' <i class="ico-question-sign" title="Pilih jawaban Ya atau Tidak, &#13;dengan klik tombol dibawah."></i>';
		}
	}
}
koneksi_off();
?>