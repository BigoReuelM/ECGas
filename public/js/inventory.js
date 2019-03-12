$(document).ready(function(){
	$('#products_table').DataTable();

	$('.update_btn').on('click', function(){
		var action = $(this).val();
		var unit_value = $(this).siblings('.update_input').val();
		var current_inventory = $(this).siblings('.current_inventory').val();
		
		$(this).css("background-color", "lightblue");
		$(this).siblings('.update_btn').css("background-color", "gray");
		$(this).siblings('.update_submit').attr("disabled", false)
		if (action == 'add') {
			$(this).siblings('.update_action').val('add');
			$(this).parents('tr').find('.product_quantity').html(' + ' + unit_value + ' = ' + (parseInt(current_inventory) + parseInt(unit_value)));
		}else{
			$(this).siblings('.update_action').val('set');
			$(this).parents('tr').find('.product_quantity').html(' > ' + unit_value);
		}
		
	});

	$(document).on('submit', '[id^=update_product_inventory_form]', function(e){
		e.preventDefault();

		var elementID = $(this).attr('id');

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json'
		}).done(function(response){
			if (response.success == true) {
				$('#' + elementID).parents('tr').find('.inventory').html(response.final_inventory);
				$('#' + elementID).parents('tr').find('.product_quantity').empty();
				$('#' + elementID).find('.current_inventory').val(response.final_inventory);
				//console.log(elementID)
			}else{
				$('#update_error_modal').modal('show');
			}

			$('.update_btn').removeAttr('style');
			$('.update_input').val("");
		});
	});
});