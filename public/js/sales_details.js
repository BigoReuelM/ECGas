$(document).ready(function(){
	$(document).on('submit', '#add_payment_form', function(e){
		e.preventDefault();

		if (validateRequired($(this).attr('id'))) {
			$.post($(this).attr('action'), $(this).serialize()).done(function(){
				window.location.reload();
			})
		}
	});
});