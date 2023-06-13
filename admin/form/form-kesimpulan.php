<?php
require('../../config.php');
koneksi_on();
?>
<div id="form-data">
	<h2>Data Kesimpulan <a id="btn-tambah" onclick="showform('entry-kesimpulan')"><i class="ico-plus"></i> Tambah Data</a></h2>
	<table cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="5%">No.</th>
				<th width="44%">Kerusakan</th>
				<th width="44%">Solusi</th>
				<th width="7%"><i class="ico-info-sign" title="Pilihan"></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			$query_kesimpulan = mysql_query("SELECT * FROM tb_kesimpulan");
			while($data_kesimpulan = @mysql_fetch_array($query_kesimpulan)){
			?>
			<tr>
				<td valign="top"><?php echo $i.'.'; ?></td>
				<td valign="top">
				<?php 
					$data_ks_rusak = $data_kesimpulan['kd_rusak'];
					if($data_rusak = @mysql_fetch_array(mysql_query("SELECT * FROM tb_rusak WHERE kd_rusak = '$data_ks_rusak'"))){
						echo $data_ks_rusak.', <i>'.$data_rusak['nm_rusak'].'</i>';
					}
				?>
				</td>
				<td valign="top">
				<?php 
					$data_ks_solusi = $data_kesimpulan['kd_solusi'];
					if($data_solusi = @mysql_fetch_array(mysql_query("SELECT * FROM tb_solusi WHERE kd_solusi = '$data_ks_solusi'"))){
						echo $data_ks_solusi .', <i>'. $data_solusi['nm_solusi'].'</i>';
					}
				?>
				</td>
				<td>
					<a id="<?php echo $data_kesimpulan['id_kesimpulan']; ?>" class="ubah" title="Ubah"><i class="ico-ubah"></i></a> 
					<a id="<?php echo $data_kesimpulan['id_kesimpulan']; ?>" class="hapus" title="Hapus"><i class="ico-hapus"></i></a>
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
		<p>Form ini menamplikan semua data kesimpulan yang ada pada basis data</p>
	</div>
</div>
<?php 
koneksi_off(); 
?>
<div id="form-data-entry">
	<!-- memanggil form -->
</div>
<script src="../admin/js/admin-ajax-form.js"></script>
<script>
// deklarasikan variabel
var kode = 0;
var data = 4; //***
var url_entry = "../admin/form/entry-kesimpulan.php"; //***
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