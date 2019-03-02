$(document).ready(function(){
	$('#report_table').DataTable();

	//script for updating user details
	////		//////
	
	$(document).on('click', '#save_edits', function(){

		$('#detail_update_form').empty();
		
		$('#details_container').find('.detail').each(function(){
			//trim value of element
			var value;
			if ($(this).is('select')) {
				value = $(this).val();
			}else{
				value = $(this).val().trim();
			}

			if (!value == null || !value == "") {
				$($(this).parents('div.form-group')).clone().appendTo('#detail_update_form');
				if ($(this).is('select')) {
					var val = $(this).val();
					var name = "#" + $(this).attr('id');
					console.log(val + name);
					$('#detail_update_form').find(name).val(val);
				}
			}
		});

		$('#update_details_modal').modal('show');
	})
});