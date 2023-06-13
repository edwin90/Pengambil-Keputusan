<?php
require('../../config.php');
koneksi_on();
?>
<div id="form-data">
	<h2>Data Langkah Perbaikan <a id="btn-tambah" onclick="showform('entry-langkah');"><i class="ico-plus"></i> Tambah Data</a></h2>
	<table cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="5%">No.</th>
				<th width="20%">Gambar</th>
				<th width="68%">Nama Langkah</th>
				<th width="7%"><i class="ico-info-sign" title="Pilihan"></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			$query_langkah = mysql_query("SELECT * FROM tb_langkah");
			while($data_langkah = @mysql_fetch_array($query_langkah)){
			?>
			<tr valign="top">
				<td><?php echo $i.'.'; ?></td>
				<td><img src="../img/project/<?php echo $data_langkah['gambar']; ?>"></td>
				<td><?php echo $data_langkah['nm_langkah']; ?></td>
				<td>
					<a id="<?php echo $data_langkah['kd_langkah']; ?>" class="ubah" title="Ubah"><i class="ico-ubah"></i></a> 
					<a id="<?php echo $data_langkah['kd_langkah']; ?>" class="hapus" title="Hapus"><i class="ico-hapus"></i></a>
				</td>	
			</tr>
			<?php
			$i++;
			}
			?>
		</tbody>
	</table>
	<div id="form-data-keterangan">
		<h3>Keterangan:</h3>
		<p>Form ini menamplikan semua data langkah perbaikan yang ada pada basis data</p>
	</div>
</div>
<?php 
koneksi_off(); 
?>
<div id="form-data-entry">
	<!-- memanggil form -->
</div>
<script src="../admin/js/admin-ajax-form.js"></script>
<script src="../admin/js/jquery.form.min.js"></script>
<script>
// deklarasikan variabel
var kode = 0;
var data = 5; //***
var url_entry = "../admin/form/entry-langkah.php"; //***
var url_proses = "../admin/form/proses.php";
// ketika tombol ubah ditekan
$('.ubah').click(function(){
	kode = this.id;
	$.post(url_entry, {id: kode} ,function(data){
		$("#backdrop").fadeIn("fast");
		$("#form-data-entry").fadeIn("fast").html(data);
		return false;
	});
});
// ketika tombol hapus ditekan
$('.hapus').click(function(){
	kode = this.id;
	var answer = confirm("Apakah anda ingin mengghapus data ini?");
	if (answer){
		$.post(url_proses, {hps: kode, dt: data} ,function(){
			$('body').load(show(hal));
			return false;
		});
	}
});
</script>