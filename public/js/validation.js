function validateRequired(formID){
	
	var element = '#' + formID;

	var success = true;

	$(element).find('[valrequired = true]').each(function(){
		var fieldname = $(this).attr('elementname');

		//remove warning messages
		$(this).siblings('.text-danger').remove()

		//trim value of element
		var value;
		if ($(this).is('select')) {
			value = $(this).val();
		}else{
			value = $(this).val().trim();
		}
		//check if selected element value is null/empty
		if (value == null || value == "") {
			//if input field empty, add class invalid on selected element and add warning message after the elemet
			$(this).addClass('is-invalid')
			.after('<p class="text-danger text-center"><small>The ' + fieldname + ' field is required!</small></p>');

			success = false;	
		}else{
			//remove style/class(is-invalid) on selected element if the field is not null/empty
			$(this).removeClass('is-invalid');
			//add style/class(is-valid) on selected element if the field is not null/empty
			$(this).addClass('is-valid');
		}
	});

	$(element).find('[valrequired = false]').each(function(){
		$(this).addClass('is-valid');
	})

	return success;
}
