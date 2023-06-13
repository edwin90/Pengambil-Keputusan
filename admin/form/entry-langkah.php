<?php
require('../../config.php');
koneksi_on();

if(isset($_POST['id']) && strlen($_POST['id'])){
	$id = $_POST['id'];
	$data_langkah = @mysql_fetch_array(mysql_query("SELECT * FROM tb_langkah WHERE kd_langkah='$id'"));
	if($id!='0'){
		$kode = $data_langkah['kd_langkah'];
		$urutan = $data_langkah['urutan'];
		$gambar = $data_langkah['gambar'];
		$kdsolusi = $data_langkah['kd_solusi'];
		$diskripsi = $data_langkah['nm_langkah'];
	}else{
		$kode = "";
		$urutan = "";
		$gambar = "";
		$kdsolusi = "";
		$diskripsi = "";
	}
}else{
		$kode = "";
		$urutan = "";
		$gambar = "";
		$kdsolusi = "";
		$diskripsi = "";
}
?>
<div id="form-data-entry-header">
	<h2><span class="judul"></span> Data Langkah Perbaikan<a class="icon-tutup ico-remove" title="Tutup"></a></h2>
</div>
<div id="form-data-entry-body">
<form id="upload" method="post" action="../admin/form/upload.php" enctype="multipart/form-data">
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td width="25%" align="right">Kode</td>
			<td colspan="3">
				<input name="kode-langkah" size="5" maxlength="4" value="<?php echo $kode; ?>" required></input>
				<input name="kd" size="1" value="<?php echo $kode; ?>" hidden="true"></input>
			</td>
		</tr>
		<tr>
			<td align="right">Langkah ke</td>
			<td width="12%"><input name="urutan" size="3" maxlength="2" value="<?php echo $urutan; ?>" required></input></td>
			<td width="16%" align="right">dari Solusi</td>
			<td><input name="kode-solusi" size="5" maxlength="4" value="<?php echo $kdsolusi; ?>" required></input></td>
		</tr>
		<tr>
			<td valign="top" align="right">Gambar</td>
			<td colspan="3">
				<input name="gambar" type="file" multiple></input>
				<input name="hpsgambar" value="<?php echo $gambar; ?>" hidden="true"></input>
				<img id="tampil-gbr" src="../img/project/<?php echo $gambar; ?>">
				<a id="btn-ganti">Ganti</a>
			</td>
		</tr>
		<tr>
			<td valign="top" align="right">Diskripsi Langkah</td>
			<td colspan="3"><textarea name="diskripsi" rows="3" cols="57" required><?php echo $diskripsi; ?></textarea></td>
		</tr>
	</table>
</div>
</form>
<div id="form-data-entry-footer">
	<a id="btn-batal">Batal</a>
	<a id="btn-simpan">Simpan</a>
	<a id="btn-simpan2">Simpan</a>
	
</div>
<?php 
koneksi_off(); 
?>
<script>
	// otomatis load
	$('input:text[name=kode-langkah],input:text[name=kode-solusi]').keyup(function(){
        this.value = this.value.toUpperCase();
    });
	$("textarea[name=diskripsi]").on("keypress", function(e){
		if ( e.keyCode == 13 && e.shiftKey ){
			$(this).val(function(i,v){
				return v + "<br/>"; // or return v + "\n"; (whatever you want)
			});
		}
	});
	var v_kode = $('input:text[name=kode-langkah]').val();
	if (v_kode==""){// entry
		$('.judul').html('Entry');
		$('input:text[name=kode-langkah]').removeAttr('disabled');
		$('input:file[name=gambar]').removeAttr('disabled').css({display:'block'});
		$('#tampil-gbr,#btn-ganti').css({display:'none'});
		$('input:text[name=kode-langkah]').focus();
		$('#btn-simpan2').css({display:'none'});
		$('#btn-simpan').css({display:''});
	}else{// ubah
		$('.judul').html('Ubah');
		$('input:text[name=kode-langkah]').attr('disabled', true);
		$('input:file[name=gambar]').attr('disabled', true).css({display:'none'});
		$('#tampil-gbr,#btn-ganti a').css({display:'block'});
		$('textarea[name=diskripsi]').focus();
		$('#btn-simpan2').css({display:''});
		$('#btn-simpan').css({display:'none'});
	}
	// manipulasi input dan tampil gambar
	$('#btn-ganti').click(function(){
		$('#tampil-gbr,#btn-ganti,#btn-simpan2').css({display:'none'});
		$('input:file[name=gambar]').removeAttr('disabled').css({display:'block'});
		$('#btn-simpan').css({display:''});
	});
	// ketika tombol simpan id=btn-simpan2
	$('#btn-simpan2').click(function(){
		// cek keadaan inputan jika kosong
		var v_kode = $('input:text[name=kode-langkah]').val();
		var v_urutan = $('input:text[name=urutan]').val();
		var v_kode_solusi = $('input:text[name=kode-solusi]').val();
		var v_diskripsi = $('textarea[name=diskripsi]').val();
			if (v_kode==""){
				alert("Kode langkah masih kosong !");
				$('input:text[name=kode-langkah]').focus();
				return false;
			}else if (v_urutan==""){
				alert("Urutan langkah masih kosong !");
				$('input:text[name=urutan]').focus();
				return false;
			}else if (v_kode_solusi==""){
				alert("Kode solusi masih kosong !");
				$('input:text[name=kode-solusi]').focus();
				return false;
			}else if (v_diskripsi==""){
				alert("Diskripsi langkah perbaikan masih kosong !");
				$('textarea[name=diskripsi]').focus();
				return false;
				// proses simpan
			}else{
				$.post(url_proses, {kd_langkah: v_kode, nm_langkah: v_diskripsi, urutan: v_urutan, kdsolusi: v_kode_solusi, id: kode} ,function(){
					$("#backdrop, #form-data-entry").fadeOut("fast");
					$('#form-data-entry').html("");
					$('body').load(show(hal));
					return false;
				});
			}
	});
	// load kode ke input name id untuk membedakan entry dan update
	$('input:text[name=id]').val(kode);
	// ketika tombol batal atau x ditekan
	$("#btn-batal, #backdrop, .ico-remove").click(function(){
		$("#backdrop, #form-data-entry").fadeOut("fast");
		$('#form-data-entry').html("");
	});
	// deklarasi
	var options = { 
			target: '',   // target element(s) to be updated with server response 
			beforeSubmit: beforeSubmit,  // pre-submit callback 
			success: afterSuccess,  // post-submit callback 
			resetForm: true    // reset the form after successful submit 
	};
	// ketika tombol simpan ditekan
	$("#btn-simpan").click(function(){
		$("#upload").ajaxSubmit(options); 
		return false; 
	});
	function afterSuccess(){
		$("#backdrop, #form-data-entry").fadeOut("fast");
		$('#form-data-entry').html("");
		$('body').load(show(hal)); // muat ulang tag body
		return false;
	}
	function beforeSubmit(){
	// cek keadaan inputan jika kosong
		var v_kode = $('input:text[name=kode-langkah]').val();
		var v_urutan = $('input:text[name=urutan]').val();
		var v_kode_solusi = $('input:text[name=kode-solusi]').val();
		var v_diskripsi = $('textarea[name=diskripsi]').val();
			if (v_kode==""){
				alert("Kode langkah masih kosong !");
				$('input:text[name=kode-langkah]').focus();
				return false;
			}else if (v_urutan==""){
				alert("Urutan langkah masih kosong !");
				$('input:text[name=urutan]').focus();
				return false;
			}else if (v_kode_solusi==""){
				alert("Kode solusi masih kosong !");
				$('input:text[name=kode-solusi]').focus();
				return false;
			}else if (v_diskripsi==""){
				alert("Diskripsi langkah perbaikan masih kosong !");
				$('textarea[name=diskripsi]').focus();
				return false;
			//cek dukungan browser
			}else if (window.File && window.FileReader && window.FileList && window.Blob){
				if ( !$('input:file[name=gambar]').val()){
					alert("File gambar belum dipilih !");
					return false;
				}
				var fsize = $('input:file[name=gambar]')[0].files[0].size;
				var ftype = $('input:file[name=gambar]')[0].files[0].type;
				// tipe file gambar yang diijinkan 
				switch(ftype){
					case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
						break;
					default:
						alert(ftype+" Tipe file tidak diijinkan !");
					return false;
				}
				// ukuran file yang diijinkan kurang dari 1 MB (1048576)
				if (fsize>1048576){
					alert(bytesToSize(fsize)+" File gambar terlalu besar !, Gunakan gambar yang lebih kecil atau edit gambar menjadi lebih kecil.");
					return false;
				}
			}else{
				// pesan kesalahan jika tidak mendukung HTML5 File API
				alert("Please upgrade your browser, because your current browser lacks some new features we need!");
				return false;
			}
	}
	// format bit
	function bytesToSize(bytes){
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Bytes';
		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}
</script>