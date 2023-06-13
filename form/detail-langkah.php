<?php
require('../config.php');
if($_POST['hal']=='adm'){
	$url_img = "../img/project/";
}else{
	$url_img = "img/project/";
}
koneksi_on();
?>
<div id="form-data-entry-header">
	<h2>Detail Solusi<a class="icon-tutup ico-remove" title="Tutup"></a></h2>
</div>
<div id="form-data-entry-body">
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<?php 
			$kdlangkah = $_POST['detail'];
			$query_langkah = mysql_query("SELECT * FROM tb_langkah WHERE kd_solusi='$kdlangkah'");
			while($data_langkah = @mysql_fetch_array($query_langkah)){
			?>
			<tr valign="top">
				<td width="5%"><?php echo $data_langkah['urutan'].'.'; ?></td>
				<td width="20%"><img style="border:1px solid silver;"src="<?php echo $url_img.$data_langkah['gambar']; ?>"></td>
				<td width="75%" class="detail"><?php echo $data_langkah['nm_langkah']; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<div id="form-data-entry-footer">
	<a id="btn-batal">Tutup</a>
</div>
<?php 
koneksi_off(); 
?>
<script>
// ketika tombol batal ditekan
	$("#btn-batal, #backdrop, .ico-remove").click(function(){
		$("#backdrop, #form-data-detail").fadeOut("fast");
		$('#form-data-detail').html("");
	});
</script>