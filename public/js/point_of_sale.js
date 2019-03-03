$(document).ready(function(){

	//set the time

	setInterval(function(){
		var dt = new Date();
		$('#dateTime').html(dt.toLocaleString());
	}, 1000);

	var cart = new Array();
	var itemList = new Array();
	var total_items = 0;
	var total = 0;
	var discount = 0;
	var total_payable = 0;
	

	$(document).on('click', '#cancel_sale_btn', function(){
		window.location.reload();
	});

	$(document).on('change', '#discount_input', function(){
		var discount_input = $(this).val();
		if (isNaN(discount_input)) {
			alert('Enter aproper discount amount');
		}else{

			discount = parseFloat(discount_input);
		}

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

		// the following script is for adding quantity of an item by clicking on a button
		
		$(document).on('click', '.add_quantity_btn', function(){
			var product_id = $(this).val();

			for (var i = 0; i < cart.length; i++) {
				if (cart[i]['product_id'] === product_id) {
					cart[i]['count']++;
					var count = cart[i]['count'];
					var total_price = parseInt(count) * parseFloat(cart[i]['product_price']);
					total_items++;
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
				if (cart[i]['product_id'] === product_id) {
					if (cart[i][count] > 1) {
						cart[i]['count']--;
						var count = cart[i]['count'];
						var total_price = parseInt(count) * parseFloat(cart[i]['product_price']);
						total_items--;
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
					console.log(cart);
					break;
				}
			}
		});

	});
});