  <script src="<?php echo base_url() ?>public/vendor/datatables/jquery.dataTables.min.js"></script>

  <script src="<?php echo base_url() ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

</body>

</html>

<div class="modal fade" id="low_inventory_alert_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Alert!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <table class="table table-striped table-bordered table-sm text-center" id="alert_low_sku_table" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th colspan="3">Low Inventory Products</th>
            </tr>
            <tr>
              <th>Product</th>
              <th>SKU</th>
              <th>Inventory</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  ///control for sidebar toggle
  ///

  $(document).on('click', '#sidebarToggle', function(e){
    e.preventDefault();

    $.ajax({
      type: 'get',
      url: '<?php echo base_url('pages/sidebarToggle') ?>'
    });
  });

  $(document).ready(function(){
    $.ajax({
      type: 'get',
      url: '<?php echo base_url('pages/getAlertCounts') ?>',
      dataType: 'json'
    }).done(function(response){
      $('#alert_badge').html(response.total_count);
      $('#low_sku_count').html(response.low_sku_count);
      $('#alert_count').html(response.alert_count);
      console.log(response.alert_count);
      console.log(response.session_low_sku_count);

      if (response.low_sku_count > response.session_low_sku_count) {
        $.ajax({
          type: 'get',
          url: '<?php echo base_url('pages/getProductsWithLowSKU') ?>',
          dataType: 'json'
        }).done(function(res){
          $("#low_inventory_alert_modal").modal('show');

          $('#alert_low_sku_table').DataTable();
          $('#alert_low_sku_table').DataTable().destroy();
          
          $('#alert_low_sku_table').DataTable({
            'paging' : false,
            'info' : false,
            'searching' : false,
            data: res.products,
            columns: [
              {data: 'product_title'},
              {data: 'product_sku'},
              {data: 'product_quantity'}
            ]
          });
          
        });  
      }

    });
  })
</script>

