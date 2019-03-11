$(document).ready(function(){

	///////////////////////////
	// initialize data table //
	///////////////////////////
	$('#sales_table').DataTable();
	$('#sale_products_table').DataTable({
		paging: false,
		info: false,
		searching: false
	});

	

});