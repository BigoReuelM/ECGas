$(document).ready(function(){
	$('#products_table').DataTable();

	////////////////////////////////////////////////////
	//ajax for getting customer product alert configs //
	////////////////////////////////////////////////////

	$(document).on('submit', '.view_alerts_config_form', function(e){
		e.preventDefault();

		$.post($(this).attr('action'), $(this).serialize()).done(function(data){
			$("#alert_cofig_view_modal").modal('show');
		});
	})
});