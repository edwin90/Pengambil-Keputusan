<?php
require('../../config.php');
koneksi_on();

if(isset($_POST['id']) && strlen($_POST['id'])){
	$id = $_POST['id'];
	$data_ks = @mysql_fetch_array(mysql_query("SELECT * FROM tb_kesimpulan WHERE id_kesimpulan='$id'"));
	if($id!='0'){
		$kode_rusak = $data_ks['kd_rusak'];
		$kode_solusi = $data_ks['kd_solusi'];
		$query_rusak = mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak = '$kode_rusak'");
			while($data_rusak = @mysql_fetch_array($query_rusak)){
				$nama_rusak = $data_rusak['nm_rusak'];
			}
		$query_solusi = mysql_query("SELECT * FROM tb_solusi WHERE kd_solusi = '$kode_solusi'");
			while($data_solusi = @mysql_fetch_array($query_solusi)){
				$nama_solusi = $data_solusi['nm_solusi'];
			}
	}else{
		$kode_rusak ="";
		$kode_solusi ="";
		$nama_rusak ="";
		$nama_solusi ="";
	}
}else{
		$kode_rusak ="";
		$kode_solusi ="";
		$nama_rusak ="";
		$nama_solusi ="";
}
?>
<div id="form-data-entry-header">
	<h2><span class="judul"></span> Data Kesimpulan<a class="icon-tutup ico-remove" title="Tutup"></a></h2>
</div>
<div id="form-data-entry-body">
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td width="25%" align="right">Kode Kerusakan</td>
			<td width="15%" ><input name="kode-rusak" size="5" maxlength="4" value="<?php echo $kode_rusak; ?>"required autofocus></input></td>
			<td><input name="nm-rusak" size="48" value="<?php echo $nama_rusak; ?>"disabled></input></td>
		</tr>
		<tr>
			<td align="right">Kode Solusi</td>
			<td><input name="kode-solusi" size="5" maxlength="4" value="<?php echo $kode_solusi; ?>"required></input></td>
			<td><input name="nm-solusi" size="48" value="<?php echo $nama_solusi; ?>"disabled></input></td>
		</tr>
	</table>
</div>
<div id="form-data-entry-footer">
	<a id="btn-batal">Batal</a>
	<a id="btn-simpan">Simpan</a>
</div>
<?php 
koneksi_off(); 
?>
<script>
	// otomatis
	$('input:text[name=kode-rusak],input:text[name=kode-solusi]').keyup(function(){
        this.value = this.value.toUpperCase();
    });
	var v_kode = $('input:text[name=kode-rusak]').val();
	if (v_kode==""){
		$('.judul').html('Entry');
		$('input:text[name=kode-rusak]').removeAttr('disabled');
		$('input:text[name=kode-rusak]').focus();
	}else{
		$('.judul').html('Ubah');
		$('input:text[name=kode-rusak]').attr('disabled', true);
		$('input:text[name=kode-solusi]').focus();
	}
	// ketika tombol batal ditekan
	$("#btn-batal, #backdrop, .ico-remove").click(function(){
		$("#backdrop, #form-data-entry").fadeOut("fast");
		$('#form-data-entry').html("");
	});
	// ketika tombol simpan ditekan
	$("#btn-simpan").click(function(){
		var v_kode_rusak = $('input:text[name=kode-rusak]').val();
		var v_kode_solusi = $('input:text[name=kode-solusi]').val();
			if (v_kode_rusak==""){
				alert("Kode kerusakan masih kosong !");
				$('input:text[name=kode-rusak]').focus();
				return false;
			}else if (v_kode_solusi==""){ 
				alert("Kode solusi masih kosong !");
				$('input:text[name=kode-solusi]').focus();
				return false;
			}else{
				var url_cek = "../admin/form/cek-data.php";
				var kode_cek = 03;
				// cek kesimpulan untuk entry baru
				$.post(url_cek, {cek: kode_cek, cek_kd_rusak: v_kode_rusak} ,function(pesan){
					if (pesan=='dataketemu' && kode==0){
						alert("Data kesimpulan kerusakan sudah ada dalam database !");
						$('input:text[name=kode-rusak]').focus();
						return false;
					}else{
						// simpan dan update kesimpulan
						$.post(url_proses, {id_kesimpulan: kode, ks_kd_rusak: v_kode_rusak, ks_kd_solusi: v_kode_solusi, id: kode} ,function(){
							$("#backdrop, #form-data-entry").fadeOut("fast");
							$('#form-data-entry').html("");
							$('body').load(show(hal));
							return false;
						});
					}			
				});
			}
	});
	// cek data
	var url_cek = "../admin/form/cek-data.php";
	$('input:text[name=kode-rusak]').keyup(function(){
		var kode = 01;
		var v_kode_rusak = $('input:text[name=kode-rusak]').val();
        $.post(url_cek, {cek: kode, cek_kd_rusak: v_kode_rusak} ,function(data){
			$('input:text[name=nm-rusak]').val(data);
			return false;
		});
    });
	$('input:text[name=kode-solusi]').keyup(function(){
		var kode = 02;
		var v_kode_solusi = $('input:text[name=kode-solusi]').val();
        $.post(url_cek, {cek: kode, cek_kd_solusi: v_kode_solusi} ,function(data){
			$('input:text[name=nm-solusi]').val(data);
			return false;
		});
    });
</script>