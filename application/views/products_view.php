

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Products Management</h1>
              <p>Product management: <strong>ADD or DELETE</strong> a product.</p>
            </div>
            <a href="<?php echo base_url('pages/addProduct') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add Product
            </a>
          </div>

          <!-- Table of products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Products Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center" id="products_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Inventory</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td class="product_title"><?php echo $product['product_title'] ?></td>
                      <td><?php echo $product['product_category'] ?></td>
                      <td><?php echo $product['product_description'] ?></td>
                      <td><?php echo $product['product_quantity'] ?></td>
                      <td><?php echo $product['product_price'] ?></td>
                      <td>
                        <img src="<?php echo $product['product_image_url'] ?>" alt="" width="50px" height="50px">
                      </td>
                      <td>
                        <div class="row justify-content-center">
                          <form method="POST" action="<?php echo base_url('pages/setProductID') ?>">
                            <input type="text" name="prev_view" value="products" hidden>
                            <input type="text" name="product_id" value="<?php echo $product['product_id'] ?>" hidden>
                            <button type="submit" class="btn btn-circle btn-info btn-sm" data-toggle="tooltip" title="View Product Details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <button class="btn btn-circle btn-danger btn-sm delete_btn" data-toggle="tooltip" title="Delete Product" value="<?php echo $product['product_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
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

<!-- Modal for delete product-->
<div class="modal fade" id="product_delete_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Delete</strong> Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="delete_message">
          
        </div>
        <div class="text-center alert alert-danger">
          <p class="text-danger">Delete this Product?</p>
          <p id="product_title">
          
          </p>
        </div>
        
        <form method="POST" action="<?php echo base_url('pages/deleteProduct') ?>" id="delete_product_form">
          <input type="text" name="product_id" id="product_id" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="delete_product_form" type="submit" class="btn btn-danger btn-sm">Confirm Delete</button>
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
  
  <script src="<?php echo base_url() ?>public/js/products.js"></script>  
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  
  <script class="text/JavaScript">    
    $('#products_table').DataTable();
  </script>