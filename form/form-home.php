<?php
session_start();
if (isset($_SESSION['login'])){
	$welcome = $_SESSION['login']['nm'];
}else{
	$welcome = "User";
}
?>
<div id="form-data">
	<h2>Selamat Datang, <?php echo $welcome; ?></h2>
	<p class="anak-judul"><i>di aplikasi sistem pakar untuk mendiagnosa kerusakan mobil.</i></p>
	<div id="prakata">
	<p><span class="paragraf">S</span>istem pakar merupakan salah satu bagian dari kecerdasan buatan, yaitu sebuah 
	teknik inovatif baru dalam menangkap dan memadukan pengetahuan maupun pengalaman yang dimasukkan oleh banyak pakar 
	ke dalam suatu area pengetahuan tertentu sehingga setiap orang dapat menggunakannya untuk memecahkan berbagai masalah 
	yang bersifat spesifik, dalam hal ini yaitu permasalahan tentang kerusakan yang terjadi pada mobil suzuki carry. Kerusakan
	pada mobil dapat dideteksi dengan mengetahui tanda-tanda atau gejala yang timbul.Adapun gejala yang sering timbul antara lain 
	seperti konsumsi bahan bakar boros, mesin cepat panas, suara mesin kasar, keluar asap putih dari lubang kenalpot, tenaga yang 
	di hasilkan kurang, saat berbelok terjadi oleng atau tidak seimbang, dsb.</p>
	<p><span class="paragraf">T</span>idak setiap orang mengetahui hal yang berhubungan dengan kerusakan mobil, baik kerusakan ringan,
	maupun kerusakan berat meskipun orang tersebut bekerja dibengkel khususnya bengkel milik perseorangan, hanya orang tertentu saja
	yang mengetahui hal tersebut, maka dari itu untuk membantu para montir pada khususnya dan masyarakat pada umumnya dalam mendiagnosa 
	kerusakan mobil, dibangunlah aplikasi sistem pakar untuk mendiagnosa kerusakan mobil khususnya mobil suzuki carry.</p>
	<p><span class="paragraf">S</span>istem pakar yang akan dibangun menerapkan metode <i>Forward Chaining</i> dalam pelacakan kaidah 
	basis pengetahuan, adapun teknik yang digunakan dalam penelusuran kaidah basis pengetahunan menggunakan teknik penelusuran 
	<i>Depth-First Search</i>. Dalam merancang dan membangun sebuah sistem pakar untuk mendiagnosa kerusakan pada mobil suzuki carry, 
	metode pengembangan yang digunakan adalah metodologi terstruktur yaitu model pengembangan SDLC (<i>System Development Life Cycle</i>).</p>
	<p><span class="paragraf">A</span>plikasi ini diharapkan mampu memberikan informasi tentang segala hal yang berhubungan 
	dengan masalah kerusakan mobil secara cepat, mudah ,dan efisien secara timbal baik antara pengguna dan sistem.</p>
	<p><b>Kata Kunci: </b>Sistem Pakar, <i>Forward Chaining</i>, <i>Depth-First Search</i>, Diagnosa Kerusakan Mobil, Web, SDLC.</p>
	</div>
	<div class="img-home1 getar"></div><div class="img-home2 getar"></div>
</div>