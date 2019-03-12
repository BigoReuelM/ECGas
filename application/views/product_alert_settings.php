

<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Product Alert Settings</h1>
  <p>Product Alert Settings: <strong>Manage</strong> alert configuration of products for each client.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Active Products Table</h6>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-sm text-center" id="products_table" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th>Client Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($active_clients as $client): ?>
            <tr>
              <td><?php echo $client['name'] ?></td>
              <td><?php echo $client['client_contact'] ?></td>
              <td><?php echo $client['client_address'] ?></td>
              <td>
                <form action="<?php echo base_url('pages/getCustomerAlertCOnfigs') ?>" class="view_alerts_config_form">
                  <span data-toggle="tooltip" title="View Alert Configs">
                    <button type="submit" class="btn btn-sm btn-info">
                      <i class="fa fa-eye"></i>
                      View Alerts
                    </button>
                  </span>
                </form>
              </td>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal for adding users-->
<div class="modal fade" id="alert_cofig_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Record</strong> issue!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        alerts will appear here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button form="record_issue_form" type="submit" class="btn btn-sm btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>public/js/sb-admin-2.min.js"></script>

   <!-- Script for dataTables -->

  <script src="<?php echo base_url() ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url() ?>public/js/product_alert_settings.js"></script>