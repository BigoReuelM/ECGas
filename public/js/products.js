$(document).ready(function(){

	$(document).on('click', '.delete_btn', function(e){
		$('#product_id').val($(this).val());

		$('#product_title').html(uCletter($(this).parents('tr').find('.product_title').html()));

		$('#product_delete_modal').modal('show');
	});

	$(document).on('submit', '#delete_product_form', function(e){
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
				$('#delete_message').append('<div class="alert alert-danger">Error! Product can not be deleted.</div>');
      		}
		});
	});

});