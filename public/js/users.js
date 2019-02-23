// Call the dataTables jQuery plugin
$(document).ready(function() {
 	var table = $('#user_table').DataTable();

 	$('#user_table tbody').on( 'click', '.delete_btn', function () {
    	table
        	.row( $(this).parents('tr') )
        	.remove()
        	.draw();
	}
});
//ajax call to adding new user
$(document).on('submit', '#add_user_form', function(e){
	e.preventDefault();

	validateRequired($(this).attr('id'));

	$.ajax({
		type: 'POST',
		url: $(this).attr('action'),
		data: $(this).serialize(),
		dataType: 'json'
	}).done(function(response){
		if (response.success == false) {
			$('#message').empty();
			if (response.unique_username == false) {
				$('#message').append('<div class="alert alert-danger text-center">Username already exist!</div>');
			}else{
				$('#message').append('<div class="alert alert-danger">Error! Try again.</div>');
			}
		}else{
			window.location.reload();
		}
	})
})
