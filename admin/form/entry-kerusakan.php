<?php
require('../../config.php');
koneksi_on();

if(isset($_POST['id']) && strlen($_POST['id'])){
	$id = $_POST['id'];
	$data_rsk = @mysql_fetch_array(mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak='$id'"));
	if($id!='0'){ 
		$kode = $data_rsk['kd_rusak'];
		$nama = $data_rsk['nm_rusak'];
	}else{
		$kode ="";
		$nama ="";
	}
}else{
		$kode ="";
		$nama ="";
}
?>
<div id="form-data-entry-header">
	<h2><span class="judul"></span> Data Kerusakan<a class="icon-tutup ico-remove" title="Tutup"></a></h2>
</div>
<div id="form-data-entry-body">
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td width="25%" align="right">Kode</td>
			<td><input name="kode" size="5" maxlength="4" value="<?php echo $kode; ?>"required></input></td>
		</tr>
		<tr>
			<td valign="top" align="right">Nama Kerusakan</td>
			<td><textarea name="nama" rows="3" cols="57" required><?php echo $nama; ?></textarea></td>
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
	$('input:text[name=kode]').keyup(function(){
        this.value = this.value.toUpperCase();
    });
	var v_kode = $('input:text[name=kode]').val();
	if (v_kode==""){
		$('.judul').html('Entry');
		$('input:text[name=kode]').removeAttr('disabled');
		$('input:text[name=kode]').focus();
	}else{
		$('.judul').html('Ubah');
		$('input:text[name=kode]').attr('disabled', true);
		$('textarea[name=nama]').focus();
	}
	// ketika tombol batal ditekan
	$("#btn-batal, #backdrop, .ico-remove").click(function(){
		$("#backdrop, #form-data-entry").fadeOut("fast");
		$('#form-data-entry').html("");
	});
	// ketika tombol simpan ditekan
	$("#btn-simpan").click(function(){
		var v_kode = $('input:text[name=kode]').val();
		var v_nama = $('textarea[name=nama]').val();
			if (v_kode==""){
				alert("Kode masih kosong !");
				$('input:text[name=kode]').focus();
				return false;
			}else if (v_nama==""){ 
				alert("Nama kerusakan masih kosong !");
				$('textarea[name=nama]').focus();
				return false;
			}else{
				$.post(url_proses, {kd_rusak: v_kode, nm_rusak: v_nama, id: kode} ,function(){
					$("#backdrop, #form-data-entry").fadeOut("fast");
					$('#form-data-entry').html("");
					$('body').load(show(hal));
					return false;
				});
			}
	});
</script>