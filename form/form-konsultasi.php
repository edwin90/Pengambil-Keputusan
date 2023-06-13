<?php
if ( @$hal=='adm'){
	require('../../config.php');
}else{
	require('../config.php');
}
koneksi_on();
?>
<div id="form-data">
	<h2>Konsultasi Diagnosa Kerusakan Mobil Suzuki Carry</h2>
	<div id="form-data-konsultasi">
		<div id="baris-pilih">
			<p>Bagian Kerusakan:
			<select name="bagian">
				<option selected="selected"></option>
				<?php
				$result = mysql_query("SELECT * FROM tb_bagian ORDER BY kd_bagian");  
				while($data_bgn = @mysql_fetch_array($result)){                                                 
					echo "<option value=$data_bgn[kd_bagian]>$data_bgn[nm_bagian]</option>";
				}
				?>
			</select>
			<i class="ico-question-sign" title="Sebelum melakukan konsultasi, &#13;terlebih dahulu pilih bagian kerusakan."></i>
			<span class="mikir"><i class="ico-refresh putar"></i> Loading</span>
			</p>
		</div>
		<div id="baris-pernyataan">
			<div id="tampil-ket"></div>
			<div id="tampil-pernyataan"></div>
			<div id="tampil-solusi"></div>
			<div id="tampil-ket-solusi"></div>
		</div>
		<div id="baris-tombol">
			<a id="btn-ya" class="tombol"><i class="ico-ok"></i> Ya</a> <a id="btn-tdk" class="tombol"><i class="ico-remove"></i> Tidak</a>
			<a id="btn-bali" class="tombol"><i class="ico-arrow-left"></i> Kembali</a>
			<a id="btn-langkah" class="tombol"><i class="ico-info-sign"></i> Lihat detail</a>
		</div>	
		<div id="baris-cobalagi">
			<div id="riwayat">Riwayat : -</div>
			<a id="btn-lagi" class="tombol"><i class="ico-refresh rotasi"></i> Coba lagi</a>
		</div>
	</div>
	<div id="form-keterangan">
		<div class="img-konsultasi getar"></div>
	</div>
</div>
<?php 
koneksi_off(); 
?>
<div id="form-data-detail">
	<!-- memanggil form -->
</div>
<script>
// deklarasi
var link_hal ="<?php echo $hal; ?>";
// ubah url-konsultasi
if(link_hal=='adm'){
	var url_konsultasi = "../form/cek-konsultasi.php";
	var url_detail = "../form/detail-langkah.php";
}else{
	var url_konsultasi = "form/cek-konsultasi.php";
	var url_detail = "form/detail-langkah.php";
}
var riwayat;
	riwayat = new Array();
// ketika combo box diubah
$("select[name=bagian]").change(function(){
	$("select[name=bagian] option:selected").each(function(){
		var v_slc = $( this ).val();
		var t_slc = $( this ).text();
		console.log(v_slc+" "+t_slc);
		riwayat.splice(0);// hapus semua elemen array pada variabel riwayat
		if (v_slc!=""){// jika combobox tidak kosong
			$('.mikir').show();
			$('#tampil-ket').fadeIn("slow");
			$('#baris-tombol,#baris-cobalagi').fadeIn("slow");
			$('#btn-ya,#btn-tdk,#btn-lagi').fadeIn("slow");
			$('#btn-langkah,#btn-bali').fadeOut("fast");
			$('#tampil-ket').html("<p>Apakah gejala yang dialami sebagai berikut:</p>");
			$('#tampil-solusi,#tampil-ket-solusi').html("");
			$.post(url_konsultasi, {bagian: v_slc} ,function(gjl){
				$('#tampil-pernyataan').html(gjl);
					var nodes = $("#kd-gjl").val();
					riwayat.push(nodes);// push node
					$('#riwayat').html('Riwayat : '+riwayat);
				$('.mikir').hide();
				return false;
			});
		}else{
			$('#tampil-ket,#tampil-pernyataan,#tampil-solusi,#tampil-ket-solusi').html("");
			$('#baris-tombol,#baris-cobalagi').fadeOut("fast");
			$('#btn-ya,#btn-tdk,#btn-langkah,#btn-bali,#btn-lagi').fadeOut("fast");
			$('#tampil-pernyataan').html("");
		}
	});
});
// ketika tombol ya ditekan
$("#btn-ya").click(function(){
	var node = $("#kd-gjl").val();
	$('.mikir').show();
	$.post(url_konsultasi, {jawab: node, id: 1} ,function(gjl){
		var awal = gjl.charAt(0);// baca karakter awal
		if(gjl=='end'){
			alert ("Kerusakan tidak teridentifikasi,\ndikarenakan keterbatasan basis pengetahuan pada database.");
			$('.mikir').hide();
			return false;
		}else if(gjl=='kosong'){
			alert ("Kerusakan tidak teridentifikasi.");
			$('.mikir').hide();
			return false;
		}else if(awal=='B'){
			$.post(url_konsultasi, {jawab: gjl, id: 7} ,function(bgn){
				var lanjut = confirm("Apakah anda ingin melanjutkan mendiagnosa pada "+bgn+" ?");
				if(lanjut){
					$.post(url_konsultasi, {jawab: gjl, id: 6} ,function(gjl){
					$('#tampil-pernyataan').html(gjl);
						var nodes = $("#kd-gjl").val();
						riwayat.push(nodes);// push node
						$('#riwayat').html('Riwayat : '+riwayat);
						$('#btn-bali').fadeIn("fast");
						$('.mikir').hide();
					return false;
					});
				}
			$('.mikir').hide();
			return false;
			});
		}else if(awal=='K'){
			$('#tampil-ket').html("<p>Kerusakan yang dialami adalah:</p>");
			$('#tampil-solusi').html("<p>Solusi:</p>");
				$.post(url_konsultasi, {jawab: gjl, id: 9} ,function(rsk){
					$('#tampil-pernyataan').html(rsk);
					return false;
				});
				$.post(url_konsultasi, {jawab: gjl, id: 8} ,function(sli){
					$('#tampil-ket-solusi').html(sli);
					$('#btn-ya,#btn-tdk,#btn-bali').fadeOut("fast");
					$('#btn-langkah').fadeIn("slow");
					$('#riwayat').html('Riwayat : '+riwayat);
					$('.mikir').hide();
					return false;
				});
		}else{
			$('#tampil-pernyataan').html(gjl);
				var nodes = $("#kd-gjl").val();
				riwayat.push(nodes);// push node
				$('#riwayat').html('Riwayat : '+riwayat);
			$('#btn-bali').fadeIn("fast");
			$('.mikir').hide();
			return false;
		}
		return false;
	});
});
// ketika tombol tidak ditekan
$("#btn-tdk").click(function(){
	var node = $("#kd-gjl").val();
	$('.mikir').show();
	$.post(url_konsultasi, {jawab: node, id: 0} ,function(gjl){
		console.log(gjl);
		var awal = gjl.charAt(0);// baca karakter awal
		if(gjl=='end'){
			alert ("Kerusakan tidak teridentifikasi,\ndikarenakan keterbatasan basis pengetahuan pada database.");
			$('.mikir').hide();
			return false;
		}else if(gjl=='kosong'){
			alert ("Kerusakan tidak teridentifikasi.");
			$('.mikir').hide();
			return false;
		}else if(awal=='B'){
			$.post(url_konsultasi, {jawab: gjl, id: 7} ,function(bgn){
				var lanjut = confirm("Apakah anda ingin melanjutkan mendiagnosa pada "+bgn+" ?");
				if(lanjut){
					$.post(url_konsultasi, {jawab: gjl, id: 6} ,function(gjl){
					$('#tampil-pernyataan').html(gjl);
						var nodes = $("#kd-gjl").val();
						riwayat.push(nodes);// push node
						$('#riwayat').html('Riwayat : '+riwayat);
						$('#btn-bali').fadeIn("fast");
						$('.mikir').hide();
					return false;
					});
				}
			$('.mikir').hide();
			return false;
			});
		}else if(awal=='K'){	
			$('#tampil-ket').html("<p>Kerusakan yang dialami adalah:</p>");
			$('#tampil-solusi').html("<p>Solusi:</p>");
				$.post(url_konsultasi, {jawab: gjl, id: 9} ,function(rsk){
					$('#tampil-pernyataan').html(rsk);
					return false;
				});
				$.post(url_konsultasi, {jawab: gjl, id: 8} ,function(sli){
					$('#tampil-ket-solusi').html(sli);
					$('#btn-ya,#btn-tdk,#btn-bali').fadeOut("fast");
					$('#btn-langkah').fadeIn("slow");
					$('#riwayat').html('Riwayat : '+riwayat);
					$('.mikir').hide();
					return false;
				});
		}else{
			$('#tampil-pernyataan').html(gjl);
				var nodes = $("#kd-gjl").val();
				riwayat.push(nodes);// push node
				$('#riwayat').html('Riwayat : '+riwayat);
			$('#btn-bali').fadeIn("fast");
			$('.mikir').hide();
			return false;
		}
		return false;
	});
});
// ketika tombol kembali ditekan
$("#btn-bali").click(function(){
	riwayat.pop();// pop node
	var node = riwayat[riwayat.length-1];
	$('.mikir').show();
	$.post(url_konsultasi, {jawab: node, id: 2} ,function(gjl){
		if(gjl=='kosong'){
			alert ("Kerusakan tidak teridentifikasi.");
			$('.mikir').hide();
			return false;
		}else{
			$('#tampil-pernyataan').html(gjl);
				if(riwayat.length < 2){
					$('#btn-bali').fadeOut("fast");
				}
			$('#riwayat').html('Riwayat : '+riwayat);
			$('.mikir').hide();
			return false;
		}
		return false;
	});
});
// ketika tombol lihat detail ditekan
$("#btn-langkah").click(function(){
	var sli = $("#kd-sli").val();
	$.post(url_detail, {detail: sli, hal: link_hal} ,function(dtl){
		$("#backdrop").fadeIn("fast");
		$('#form-data-detail').fadeIn("fast").html(dtl);
		return false;
	});
});
// ketika tombol cobalagi ditekan
$("#btn-lagi").click(function(){
	$('body').load(show(hal));
});
</script>