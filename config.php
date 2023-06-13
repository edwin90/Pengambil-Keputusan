<?php
define('DB_NAMA', 'dbpakar_carry'); // sesuaikan dengan nama database anda
define('DB_USER', 'root'); // sesuaikan dengan nama pengguna database anda
define('DB_PASSWORD', ''); // sesuaikan dengan kata sandi database anda
define('DB_HOST', 'localhost'); // ganti jika letak database mysql di komputer lain

function koneksi_on(){
	mysql_select_db(DB_NAMA,mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}
function koneksi_off(){
	mysql_close(mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}
?>