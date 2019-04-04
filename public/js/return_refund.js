$(document).ready(function(){

	$(document).on('click', '.product_check_box', function(){
		var product_id = $(this).val();
		var input_element_name = 'returned_product_count_' + product_id;

		if ($(this).prop("checked") == true) {
			$('#' + input_element_name).removeAttr('disabled');
			$('#' + input_element_name).attr('valrequired', true);
			$('#' + input_element_name).attr('elementname', 'Item Return Count');
		}else if ($(this).prop("checked") == false) {
			$('#' + input_element_name).attr('disabled', true);
			$('#' + input_element_name).removeAttr('valrequired');
			$('#' + input_element_name).removeAttr('elementname');
		}

	});

	$(document).on('click', '#confirm_rr_btn', function(){
		if (validateRequired('rr_container')) {
			$('#confirm_modal').modal('show');
		}
	});

});