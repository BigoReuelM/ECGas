//ajax call to deleting a user
$(document).on( 'click', '.delete_button', function (e) {
	e.preventDefault(e);

	$.ajax({
		type: 'POST',
		url: $(this).parents('form').attr('action'),
		data: $(this).parents('form').serialize(),
		dataType: 'json'	
	}).done(function(response){

	});

    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
}