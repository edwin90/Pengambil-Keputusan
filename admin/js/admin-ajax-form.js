function showform(form){
	$("#backdrop").fadeIn("fast");
	$.ajax({
		url	     : '../admin/form/admin-show-form.php',
		type     : 'post',
		dataType : 'html',
		data     : 'content='+form,
		success  : function(isi){
					$('#form-data-entry').fadeIn("fast").html(isi);
		}
	});
}