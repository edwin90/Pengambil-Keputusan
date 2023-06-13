<?php

//menampilkan modul
if($_POST['content']=='entry-gejala'){ @require_once "entry-gejala.php"; }
else if($_POST['content']=='entry-kerusakan'){ @require_once "entry-kerusakan.php"; }
else if($_POST['content']=='entry-solusi'){ @require_once "entry-solusi.php"; }
else if($_POST['content']=='entry-kesimpulan'){ @require_once "entry-kesimpulan.php"; }
else if($_POST['content']=='entry-langkah'){ @require_once "entry-langkah.php"; }
else if($_POST['content']=='entry-pohon'){ @require_once "entry-pohon.php"; }
else { echo"<h2>Error 404</h2>"; } 

?>