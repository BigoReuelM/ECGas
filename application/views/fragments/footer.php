
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
    });
  })
</script>