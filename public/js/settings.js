$(document).ready(function(){

	$(document).on('submit', '#add_product_category_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			});
		}
	});

	$(document).on('submit', '#add_payment_method_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			});
		}
	});

	$(document).on('submit', '#add_issue_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			});
		}
	});

	$(document).on('submit', '.category_delete_form', function(e){
		e.preventDefault();

		$.post($(this).attr('action'), $(this).serialize(), function(data){
			if (data.success == true) {
				window.location.reload();
			}else{
				alert('Data cannot be deleted!');
			}
		}, "json");
	});

	$(document).on('submit', '.method_delete_form', function(e){
		e.preventDefault();

		$.post($(this).attr('action'), $(this).serialize(), function(data){
			if (data.success == true) {
				window.location.reload();
			}else{
				alert('Data cannot be deleted!');
			}
		}, "json");
	});

	$(document).on('submit', '.issue_delete_form', function(e){
		e.preventDefault();

		$.post($(this).attr('action'), $(this).serialize(), function(data){
			if (data.success == true) {
				window.location.reload();
			}else{
				alert('Data cannot be deleted!');
			}
		}, "json");
	});


});