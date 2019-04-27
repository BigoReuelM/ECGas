

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Returns and Refunds Monitoring Page</h1>
    <p class="mb-4">Returns and Refunds Monitoring Page: <strong>View</strong> list of Returns and Refunds.</p>

    <!-- DataTales Example -->
    <div class="row">
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Returns/Refunds Logs</h6>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-sm text-center" width="100%" cellspacing="0" id="rr_table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">User</th>
                  <th scope="col">Reason</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Returns</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($logs as $log): ?>
                  <tr>
                    <td><?php echo $log['rr_date'] ?></td>
                    <td><?php echo $log['user'] ?></td>
                    <td><?php echo $log['rr_reason'] ?></td>
                    <td><?php echo $log['rr_amount'] ?></td>
                    <td>
                      <form action="<?php echo base_url('pages/getProductReturns') ?>" class="view_product_return_form">
                        <input type="text" name="rr_id" value="<?php echo $log['rr_id'] ?>" hidden>
                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                          <i class="fa fa-eye"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="returned_products_modal" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Returned Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <table class="table table-striped table-bordered table-sm text-center" id="returned_products_table" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Count</th>
                </tr>
              </thead>
              <tbody id="table_body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

  <!-- Custom js for this page -->
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  <script src="<?php echo base_url() ?>public/js/returned_products.js"></script>

  <script>
    $('#rr_table').DataTable();
  </script>