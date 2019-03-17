


$(document).ready(function(){
	var cart = new Array();
	var itemList = new Array();
	var total_items = 0;
	var total = 0;
	var discount = 0;
	var total_payable = 0;
	//set the time
	//
	//

	setInterval(function(){
		var dt = new Date();
		$('#dateTime').html(dt.toLocaleString());
	}, 1000);


	

	$(document).on('click', '#cancel_sale_btn', function(){
		window.location.reload();
	});

	$(document).on('keyup', '#discount_input', function(e){
		
		discount = $(this).val();

		total_payable = total;
		total_payable = total_payable - discount;

		$('#total_payable').html(total_payable);
	})

	$(document).on('click', '.add_cart_btn', function(){
		var item;

		var data = $(this).val().split(',');

		var product_id = data[0];
		var product_price = data[1];
		var product_title = data[2];

		if (cart) {
			if (cart.length > 0) {
				for (var i = 0; i < cart.length; i++) {
					if (itemList.indexOf(product_id) != -1) {
						if (cart[i]['product_id'] === product_id) {
							cart[i]['count']++;
							var count = cart[i]['count'];
							var total_price = parseInt(count) * parseFloat(cart[i]['product_price']);
							total_items++;
							total = total + parseFloat(product_price);
							total_payable = total_payable + parseFloat(product_price);
							updateSummary(total, total_items, total_payable);
							updateProduct(product_id, count, total_price);
						}
						
					}else{
						pushItem(product_id, product_title, product_price);
						appendTotable(product_id, product_title, product_price);
						break;
					}
				}
			}else{
				pushItem(product_id, product_title, product_price);
				appendTotable(product_id, product_title, product_price);
			}
		}	

	});

	// the following script is for adding quantity of an item by clicking on a button
	
	$(document).on('click', '.add_quantity_btn', function(){
		var product_id = $(this).val();

		for (var i = 0; i < cart.length; i++) {
			if (cart[i]['product_id'] == product_id) {
				cart[i]['count'] = cart[i]['count']+1;
				var count = cart[i]['count'];
				var total_price = parseInt(count) * parseFloat(cart[i]['product_price']);
				total_items = total_items+1;
				total = total + parseFloat(cart[i]['product_price']);
				total_payable = total_payable + parseFloat(cart[i]['product_price']);
				updateSummary(total, total_items, total_payable);
				updateProduct(product_id, count, total_price);
				break;
			}
		}
	});

	// the following script is for subtracting quantity of an item by clicking on a button
	
	$(document).on('click', '.sub_quantity_btn', function(){
		var product_id = $(this).val();

		for (var i = 0; i < cart.length; i++) {
			if (cart[i]['product_id'] == product_id) {
				if (cart[i]['count'] > 1) {
					cart[i]['count'] = cart[i]['count']-1;
					var count = cart[i]['count'];
					var total_price = parseInt(count) * parseFloat(cart[i]['product_price']);
					total_items = total_items-1;
					total = total + parseFloat(cart[i]['product_price']);
					total_payable = total_payable + parseFloat(cart[i]['product_price']);
					updateSummary(total, total_items, total_payable);
					updateProduct(product_id, count, total_price);
				}
				break;
			}
		}
	});

	// delete item form cart

	$(document).on('click', '.delete_item_btn', function(){
		var product_id = $(this).val();

		for (var i = 0; i < cart.length; i++) {
			if (cart[i]['product_id'] === product_id) {
				var count = cart[i]['count'];
				var item_total_price = parseFloat(cart[i]['product_price']) * count;
				total = total_payable - item_total_price;
				total_payable = total_payable - item_total_price;
				total_items = total_items - count;	
				updateSummary(total, total_items, total_payable);
				$('#product_' + product_id).remove();
				cart.splice(i, 1);
				itemList.splice(itemList.indexOf(product_id), 1);
				break;
			}
		}
	});

	// payment btn

	$(document).on('click', '#payment_btn', function(){
		$('#total_payable_amount').html(total_payable);
		$('#total_purchase_items').html(total_items);
	});

	// calculate chage

	$(document).on('keyup', '#paid_amount', function(){
		var paid_amount = $(this).val();
		$('#change').val(paid_amount - total_payable);
	})
	// confirm payment
	
	$(document).on('submit', '#payment_form',function(e){
		e.preventDefault();
		var client = $('#client').val();
		var payment_method = $('#payment_method').val();
		var paid_amount = $('#paid_amount').val();
		var change = $('#change').val();
		var other_info = {total: total, discount: discount, total_payable: total_payable, client: client, payment_method: payment_method, paid_amount: paid_amount, change: change, total_items: total_items};
		if (validateRequired($(this).attr('id'))) {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: {other_info: other_info, cart: cart},
				dataType: 'json'
			}).done(function(response){
				if (response.success == true) {
					window.location.reload();
				}else{
					alert('Something went wrong refresh then try again');
				}
			})
		}
		
	})


	// functions
	// 
	// 
	function pushItem(product_id, product_title, product_price){
		item = {product_id: product_id, product_price: product_price, product_title: product_title, count: 1};
		cart.push(item);
		itemList.push(product_id);
		total_items++;
		total = total + parseFloat(product_price);
		total_payable = total_payable + parseFloat(product_price);
		updateSummary(total, total_items, total_payable);
	}

	function appendTotable(product_id, product_title, product_price){
		$('#empty_product_row').remove();
		$('#cart_table_body').append(
			'<tr id="product_' + product_id + '">' +
				'<td>' +
				'<div class="btn-group">' +
				  '<button class="btn btn-circle btn-sm btn-secondary add_quantity_btn" value="' + product_id + '">' +
				    '<i class="fa fa-arrow-up"></i>' +
				  '</button>' +
				  '<button class="btn btn-circle btn-sm btn-secondary sub_quantity_btn" value="' + product_id + '">' +
				    '<i class="fa fa-arrow-down"></i>' +
				  '</button>' +
				  '<button class="btn btn-circle btn-sm btn-danger delete_item_btn" value="' + product_id + '">' +
				    '<i class="fa fa-trash"></i>' +
				  '</button>' +
				'</div>' +
				'</td>' +
				'<td>' + product_title + '</td>' +
				'<td>' + product_price + '</td>' +
				'<td class="quantity"> 1 </td>' +
				'<td class="total_price">' + product_price + '</td>' +
			'</tr>'
		);
	}

	function updateProduct(product_id, count, total_price){
		$('#product_' + product_id).find('.quantity').html(count);
		$('#product_' + product_id).find('.total_price').html(total_price);
	}

	function updateSummary(total, total_items, total_payable){
		$('#total').html(total);
		$('#total_items').html(total_items);
		$('#total_payable').html(total_payable);
	}
});


	