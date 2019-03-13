$(document).ready(function(){
		//ajax call to adding new user
	$(document).on('submit', '#add_client_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
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
		}
		
	})

		///delete user functions
	///
	/// delete on client list view

	$(document).on('click', '.delete_btn', function(){
		$('#client_id').val($(this).val());
		var client_name = $(this).parents('tr').find('.client_name').html().split(" ");
		var f_name = client_name[0];
		var m_name = client_name[1];
		var l_name = client_name[2];

		$('#client_name').html(uCletter(f_name) + " " + uCletter(m_name) + " " + uCletter(l_name));
	})

	

	$(document).on('submit', '#delete_client_form', function(e){
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
				$('#delete_message').append('<div class="alert alert-danger">Error! Client can not be deleted.</div>');
			}
		})
	})

	// delete on client details view
	// 


	$(document).on('submit', '#delete_client_form_from_details', function(e){
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json'
		}).done(function(response){
			if (response.success == true) {
				window.location.replace($('#url').val());
			}else{
				$('#delete_message').empty();
				$('#delete_message').append('<div class="alert alert-danger">Error! Client can not be deleted.</div>');
			}
		})
	})

	$(document).on('click', '.update_status_btn', function(){
		var data = $(this).val().split(',');
		$('#status_client_id').val(data[0]);
		$('#update_action').val(data[1]);
		$('.status_action').html(uCletter(data[1]));
		var product_title = $(this).parents('tr').find('.client_name').html();

		$('#status_client_name').html(uCletter(product_title));
	});

	//////////////////////////////////////////////////////////////////////
	//update value of alert_client_id input field in product_alert_form //
	//////////////////////////////////////////////////////////////////////

	$(document).on('click' , '.product_alerts_btn', function(){
		data = $(this).val().split(','); 
		var client_id = data[0];
		var url	= data[1];
		$('#alert_client_id').val(client_id);

		$('#product_alert_table').DataTable().destroy();

		$.get(url, {client_id: client_id}, function(data){
			$('#product_alert_table').DataTable({
				'paging': false,
				'info': false,
				'searching': false,
				data: data.alerts,
				columns: [
					{data: 'product_title'},
					{data: 'days_of_ussage'}
				]
			});
		}, "json");
		
	})

	/////////////////////////////////////////
	//ajax for adding client product alert //
	/////////////////////////////////////////

	$(document).on('submit', '#product_alert_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			});
		}
	})

});