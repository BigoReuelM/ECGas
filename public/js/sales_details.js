$(document).ready(function(){
	
	////////////////////////////////////
	//ajax call for view sale details //
	////////////////////////////////////

	$(document).on('submit', '.sale_view_form', function(e){
		e.preventDefault();

		$.ajax({
			type: 'get',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json'
		}).done(function(response){
			$('#sale_date').html(response.sales_details['date']);
			$('#client_name').html(response.sales_details['client']);
			$('#seller_name').html(response.sales_details['user']);
			$('#total_items').html(response.sales_details['sales_total_items']);
			$('#total').html(response.sales_details['sales_total_amount']);
			$('#discount').html(response.sales_details['sales_discount']);
			$('#total_payable').html(response.sales_details['sales_total_payable']);
			$('#paid_amount').html(response.sales_details['sales_paid_amount']);
			$('#change').html(response.sales_details['sales_change']);

			$('#sale_products_table').DataTable().destroy();

			$('#sale_products_table').DataTable({
				paging: false,
				info: false,
				searching: false,
				data: response.sales_products,
				columns: [
					{data: 'product_title'},
					{data: 'product_count'},
					{data: 'product_price'},
					{data: 'product_total_amount'}
				]
			});
		})

		$('#sale_view_modal').modal('show');
	})
});