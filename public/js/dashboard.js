$(document).ready(function(){
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
    // the following is the script for the report view showing the year, month, week and yesterday reports //
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).on('click', '.sale_report_btn', function(){
      var view_id = '#' + $(this).val();

      $('.sale_report_view').attr('hidden', 'hidden');
      $(view_id).attr('hidden', false);

    });
});