<div id="form-login">
	<h2>Ubah Akun.</h2>
	<div id="form-login-entry">
		<input id="txt-username" type="text" name="username" placeholder="Nama pengguna baru"/>
		<input id="txt-password" type="password" name="password" placeholder="Kata sandi baru"/>
		<input id="txt-repassword" type="password" name="repassword" placeholder="Ulangi kata sandi"/>
		<input id="btn-login" type="submit" name="submit" value="Simpan"/>
	</div>
</div>
<script>
// deklarasikan variabel
var url_proses = "../admin/form/proses.php";
// ketika tombol simpan ditekan
$("#btn-login").click(function(){
	$('#btn-login').val("Memuat...");
	var v_pengguna = 1;
	var v_username = $('#txt-username').val();
	var v_pass = $('#txt-password').val();
	var v_repass = $('#txt-repassword').val();
		if (v_username==""){
			alert("Nama pengguna belum diisi !");
			$('#txt-username').focus();
			$('#btn-login').val("Coba lagi...");
		}else if (v_pass==""){ 
			alert("Kata sandi belum diisi !");
			$('#txt-password').focus();
			$('#btn-login').val("Coba lagi...");
		}else if (v_repass==""){ 
			alert("Ulangi kata sandi belum diisi !");
			$('#txt-repassword').focus();
			$('#btn-login').val("Coba lagi...");
		}else if (v_pass!=v_repass){ 
			alert("Kata sandi yang diulangi berbeda atau salah !");
			$('input:text[name=repassword]').focus();
			$('#btn-login').val("Coba lagi...");
		}else{
			$.post(url_proses, {kd_pengguna: v_pengguna, nm_pengguna: v_username, password: v_pass} ,function(){
				alert("Update berhasil");
				window.location.reload();
			});
		}
});

</script>