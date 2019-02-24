// Call the dataTables jQuery plugin
$(document).ready(function() {
 	var table = $('#user_table').DataTable();

	//ajax call to adding new user
	$(document).on('submit', '#add_user_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			if ($('#password_initial').val() == $('#password').val()) {
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
							$('#message').append('<div class="alert alert-danger text-center">Error! Try again.</div>');
						}
					}else{
						window.location.reload();
					}
				})
			}else{
				$('#message').empty();
				$('#message').append('<div class="alert alert-warning text-center">Passwords dont match!</div>');
			}	
		}
		
	})

	///delete user functions
	///
	///

	$(document).on('click', '.delete_btn', function(){
		$('#user_id').val($(this).val());
		var first_name = $(this).parents('tr').find('.first_name').html();
		var middle_name = $(this).parents('tr').find('.middle_name').html();
		var last_name = $(this).parents('tr').find('.last_name').html();

		$('#user_name').html(uCletter(first_name) + ' ' + uCletter(middle_name) + ' ' + uCletter(last_name));
	})

	$(document).on('submit', '#delete_user_form', function(e){
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json'
		}).done(function(response){
			if (response.success == true) {
				window.location.reload();
			}else{
				$('#delete_message').empty();
				$('#delete_message').append('<div class="alert alert-danger">Error! User can not be deleted.</div>');
			}
		})
	})

	//update user status scripts
	//
	//
	$(document).on('click', '.update_status_btn', function(){
		var data = $(this).val().split(',');
		$('#status_user_id').val(data[0]);
		$('#update_action').val(data[1]);
		$('.status_action').html(uCletter(data[1]));
		var first_name = $(this).parents('tr').find('.first_name').html();
		var middle_name = $(this).parents('tr').find('.middle_name').html();
		var last_name = $(this).parents('tr').find('.last_name').html();

		$('#status_user_name').html(uCletter(first_name) + ' ' + uCletter(middle_name) + ' ' + uCletter(last_name));
	})
});


