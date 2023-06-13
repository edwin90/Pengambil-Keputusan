<?php

//menampilkan modul
if($_POST['content']=='home'){ @require_once "form-home.php"; }
else if($_POST['content']=='konsultasi'){ @require_once "form-konsultasi.php"; }
else if($_POST['content']=='about'){ @require_once "form-about.php"; }
else if($_POST['content']=='login'){ @require_once "form-login.php"; }
else { echo"<h2>Error 404</h2>"; } 

?>