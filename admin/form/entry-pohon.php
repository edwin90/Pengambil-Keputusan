<?php
require('../../config.php');
koneksi_on();

if(isset($_POST['id']) && strlen($_POST['id'])){
	$id = $_POST['id'];
	$data_pohon = @mysql_fetch_array(mysql_query("SELECT * FROM tb_pohon WHERE kd_pohon='$id'"));
	if($id!='0'){
		$node = $data_pohon['kd_gejala'];
		$child_t = $data_pohon['id_child_t'];
		$child_f = $data_pohon['id_child_f'];
	}else{
		$node ="";
		$child_t ="";
		$child_f ="";
	}
}else{
		$node ="";
		$child_t ="";
		$child_f ="";
}
?>
<div id="form-data-entry-header">
	<h2><span class="judul"></span> Data Pohon Keputusan<a class="icon-tutup ico-remove" title="Tutup"></a></h2>
</div>
<div id="form-data-entry-body">
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td width="18%" align="right">Node</td>
			<td width="15%"><input name="node" size="5" maxlength="4" value="<?php echo $node; ?>"required></input></td>
			<td rowspan="4" valign="top"></td>
		</tr>
		<tr>
			<td align="right">Child True</td>
			<td><input name="child-t" size="5" maxlength="4" value="<?php echo $child_t; ?>"required></input></td>
		</tr>
		<tr>
			<td align="right">Child False</td>
			<td><input name="child-f" size="5" maxlength="4" value="<?php echo $child_f; ?>"required></input></td>
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
	$('input:text[name=node], input:text[name=child-t], input:text[name=child-f]').keyup(function(){
		this.value = this.value.toUpperCase();
	});
	var v_node = $('input:text[name=node]').val();
	if(v_node==""){
		$('.judul').html('Entry');
		$('input:text[name=node]').removeAttr('disabled');
		$('input:text[name=node]').focus();
	}else{
		$('.judul').html('Ubah');
		$('input:text[name=node]').attr('disabled', true);
		$('input:text[name=child-t]').focus();
	}
	// ketika tombol batal ditekan
	$("#btn-batal, #backdrop, .ico-remove").click(function(){
		$("#backdrop, #form-data-entry").fadeOut("fast");
		$('#form-data-entry').html("");
	});
	// ketika tombol simpan ditekan
	$("#btn-simpan").click(function(){
		var v_node = $('input:text[name=node]').val();
		var v_child_t = $('input:text[name=child-t]').val();
		var v_child_f = $('input:text[name=child-f]').val();
			if (v_node==""){
				alert("Node, masih kosong !");
				$('input:text[name=node]').focus();
				return false;
			}else if (v_child_t==""){
				alert("Child true, masih kosong !");
				$('input:text[name=child-t]').focus();
				return false;
			}else if (v_child_f==""){
				alert("Child false, masih kosong !");
				$('input:text[name=child-f]').focus();
				return false;
			}else{
				// proses simpan dan update pohon
				$.post(url_proses, {kd_pohon: kode, kdgejala: v_node, idchildt: v_child_t, idchildf: v_child_f, id: kode} ,function(){
					$("#backdrop, #form-data-entry").fadeOut("fast");
					$('#form-data-entry').html("");
					$('body').load(show(hal));
					return false;
				});	
			}
	});
</script>