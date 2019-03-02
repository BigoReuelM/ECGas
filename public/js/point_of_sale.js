$(document).ready(function(){
	setInterval(function(){
		var dt = new Date();
		$('#dateTime').html(dt.toLocaleString());
	}, 1000);

	$(document).on('click', '#cancel_sale_btn', function(){
		window.location.reload();
	});

	$(document).on('click', '.add_cart_btn', function(){

		var cart = new Array();

		var data = $(this).val().split(',');

		var product_id = data[0];
		var product_price = data[1];
		var product_title = data[2];

		console.log(data);

		

		if (cart) {
			console.log('yehaw');
		}else{
			var item = {product_id: product_id, product_price: product_price, product_title: product_title};
			cart.push(item);
			console.log(item);
		}
	});
});