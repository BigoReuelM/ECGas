$(document).ready(function(){
	$('#user_report_id').DataTable();

	//script for updating user details
	////		//////
	
	$(document).on('click', '#save_edits', function(){
		
		$('#user_details_container').find('.user_detail').each(function(){
			//trim value of element
			var value;
			if ($(this).is('select')) {
				value = $(this).val();
			}else{
				value = $(this).val().trim();
			}

			if (!value == null || !value == "") {
				$('#user_detail_update_form').append($(this).parents('div.form-group'));
			}
		});

		$('#update_user_details_modal').modal('show');
	})
});