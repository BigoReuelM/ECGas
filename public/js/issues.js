$(document).ready(function(){
	/////////////////////
	//Initialize table //
	/////////////////////
	$('#issue_record_table').DataTable();

	//////////////////////////////////////////
	// submit via post the new issue record //
	//////////////////////////////////////////


	$(document).on('submit', '#record_issue_form', function(e){
		e.preventDefault();

		//////////////////////////////////////////////////////////////////
		//validate if all required fields are filled out before posting //
		//////////////////////////////////////////////////////////////////

		if (validateRequired($(this).attr('id'))) {
			if (($('#issue').val() == null || $('#issue').val() == "") && ($('#others_issue').val() == null || $('#others_issue').val() == "")) {
				$('#issue').siblings('.text-danger').remove();
				$('#issue').addClass('is-invalid')
				.after('<p class="text-danger text-center"><small>The Issue field is required!</small></p>');
				$('#others_issue').addClass('is-invalid')
			}else{
				$.post($(this).attr('action'), $(this).serialize()).done(function(){
					window.location.reload();
				})
			}
		}
	})
});