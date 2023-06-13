<?php

//menampilkan modul
if($_POST['content']=='home'){ @require_once "../../form/form-home.php"; }
else if($_POST['content']=='konsultasi'){ $hal='adm'; @require_once "../../form/form-konsultasi.php"; }
else if($_POST['content']=='gejala'){ @require_once "form-gejala.php"; }
else if($_POST['content']=='kerusakan'){ @require_once "form-kerusakan.php"; }
else if($_POST['content']=='solusi'){ @require_once "form-solusi.php"; }
else if($_POST['content']=='kesimpulan'){ @require_once "form-kesimpulan.php"; }
else if($_POST['content']=='langkah'){ @require_once "form-langkah.php"; }
else if($_POST['content']=='pohon'){ @require_once "form-pohon.php"; }
else if($_POST['content']=='about'){ @require_once "../../form/form-about.php"; }
else if($_POST['content']=='editakun'){ @require_once "form-editakun.php"; }
else { echo"<h2>Error 404</h2>"; } 

?>