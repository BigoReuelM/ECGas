

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Products</h1>
            </div>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#user_add_modal">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add Product
            </button>
          </div>

          <!-- Table of products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Products Table
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="products_table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>Product</td>
                      <td>Inventory</td>
                      <td>Price</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>Product</td>
                      <td>Inventory</td>
                      <td>Price</td>
                      <td>Action</td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


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
  <script class="text/JavaScript">
    
    $('#products_table').DataTable();
  </script>