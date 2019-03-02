$(document).ready(function(){
      
      //script for updating client details
      ////    //////
      
      $(document).on('click', '#save_edits', function(){

        $('#detail_update_form').empty();
        
        $('#details_container').find('.detail').each(function(){
          //trim value of element
          var value;
          if ($(this).is('select')) {
            value = $(this).val();
          }else{
            value = $(this).val().trim();
          }

          if (!value == null || !value == "") {
            $($(this).parents('div.form-group')).clone().appendTo('#detail_update_form');
            if ($(this).is('select')) {
              var val = $(this).val();
              var name = "#" + $(this).attr('id');
              console.log(val + name);
              $('#detail_update_form').find(name).val(val);
            }
          }
        });

        $('#update_details_modal').modal('show');
      });

      $(document).on('submit', '#delete_product_form_from_details', function(e){
      	e.preventDefault();


      	$.ajax({
      		type: 'POST',
      		url: $(this).attr('action'),
      		data: $(this).serialize(),
      		dataType: 'json'
      	}).done(function(response){
      		if (response.success == true) {
      			window.location.replace($('#url').val());
      		}else{
      			$('#delete_message').empty();
				$('#delete_message').append('<div class="alert alert-danger">Error! Product can not be deleted.</div>');
      		}
      	});
      });
    });