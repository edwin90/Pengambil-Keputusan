function show(hal){
	$("#hal").html("<div class='loader'></div><div class='txtloader'>Loading</div>");
	$.ajax({
		url	     : '../admin/form/admin-show-content.php',
		type     : 'post',
		dataType : 'html',
		data     : 'content='+hal,
		success  : function(isi){
					$('#hal').html(isi);
					$('#form-login, #form-data').fadeIn('fast');
		}
	});
}