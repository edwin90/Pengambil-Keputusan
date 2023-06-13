// ketika menekan tombol enter
$('input[name="pass_pengguna"]').keyup(function(e){
    if(e.keyCode == 13){
	$('#btn-login').attr('value','Silahkan tunggu ...');
	login();
    }
});
// ketika tombol login ditekan
$("#btn-login").click(function(){
	//Mengambil value dari input
	var v_username = $('#txt-username').val();
	var v_pass = $('#txt-password').val();
		if (v_username==""){
			alert("Nama pengguna belum diisi !");
			$('#txt-username').focus();
			$('#btn-login').val("Coba lagi");
		}else if (v_pass==""){ 
			alert("Kata sandi belum diisi !");
			$('#txt-password').focus();
			$('#btn-login').val("Coba lagi");
		}else{
			// ubah tulisan pada button saat click login
			$('#btn-login').attr('value','Silahkan tunggu ...');
			login();
		}
});
function login(){
	// mengambil value dari input
	var form_data = {
		var_nm: $('input[name="nm_pengguna"]').val(),
		var_pass: $('input[name="pass_pengguna"]').val(),
	};
	// deklarasi alamat url
	var url_login = 'form/login.php';
	var url_admin = 'admin/';
	// gunakan jquery AJAX
	$.ajax({
		url		: url_login,
		type	: 'post',
		dataType: 'html',
		data	: form_data, 
		success	: function(pesan){
			if(pesan=='089-675-323-292'){
				window.location = url_admin;
			}else{
				alert(pesan);
				$('#txt-username,#txt-password').val("");
				$('#btn-login').attr('value','Coba lagi ...');
			}
		},
	});
	return false;
}