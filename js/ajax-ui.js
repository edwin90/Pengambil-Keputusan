function show(hal){
	$("#hal").html("<div class='loader'></div><div class='txtloader'>Loading</div>");
	$.ajax({
		url	     : 'form/show-content.php',
		type     : 'post',
		dataType : 'html',
		data     : 'content='+hal,
		success  : function(isi){
					$('#hal').html(isi);
					$('#form-login, #form-data').fadeIn('fast');
		}
	});
}