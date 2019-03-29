$(document).ready(function(){
	$(document).on('submit', '#add_payment_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			})
		}
	});

	$(document).on('submit', '.sale_view_form', function(e){
		e.preventDefault();

		$.ajax({
			type: 'get',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json'
		}).done(function(data){
			$('#sale_date').html(data.sales_details['date']);
			$('#client_name').html(data.sales_details['client']);
			$('#seller_name').html(data.sales_details['user']);
			$('#total_items').html(data.sales_details['sales_total_items']);
			$('#total').html(data.sales_details['sales_total_amount']);
			$('#discount').html(data.sales_details['sales_discount']);
			$('#total_payable').html(data.sales_details['sales_total_payable']);
			$('#paid_amount').html(data.sales_details['sales_paid_amount']);
			$('#balance').html(data.sales_details['sales_balance']);

			$('#sale_products_table').DataTable().destroy();

			$('#sale_products_table').DataTable({
				paging: false,
				searching: false,
				info: false,
				data: data.sales_products,
				columns: [
					{data: 'product_title'},
					{data: 'product_count'},
					{data: 'product_price'},
					{data: 'product_total_amount'}
				]

			});

			$('#sale_payments_stable').DataTable().destroy();

			$('#sale_payments_stable').DataTable({
				paging: false,
				searching: false,
				info: false,
				data: data.payment_logs,
				columns: [
					{data: 'date'},
					{data: 'user'},
					{data: 'amount'}
				]

			});

			$('#sale_view_modal').modal('show');
		});
	});
});