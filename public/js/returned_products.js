$(document).ready(function(){

	$(document).on('submit', '.view_product_return_form', function(e){
		e.preventDefault();

		$.get($(this).attr('action'), $(this).serialize(), function(data){
			var products = data.products_returned;
			$('#table_body').empty();
			for (var i = 0; i < products.length; i++) {
				
				$('#table_body').append(
					'<tr>' +
						'<td>' +
							'<img src="' + products[i]['product_image_url'] + '" alt="image" width="50" height="50">' +
						'</td>' +
						'<td>' +
							products[i]['product_title'] +
						'</td>' +
						'<td>' +
							products[i]['product_returned_count'] +
						'</td>' +
					'</tr>'	
				);	
			}
			
			$('#returned_products_modal').modal('show');
		}, 'json');
	});
});