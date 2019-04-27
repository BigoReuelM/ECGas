

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Products Monitoring and Management</h1>
              <p>Product Monitoring and Management: <strong>Add, Delete, or Activate and Deactivate</strong> a product.</p>
            </div>
            <?php if ($_SESSION['user_details']['user_type'] == 'admin'): ?>
              <a href="<?php echo base_url('pages/addProduct') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Add Product
              </a>
            <?php endif ?>
          </div>

          <div class="row">
            <!-- total number of products -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $product_count;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- newest product -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Newest Product</div>
                      <div calss="mb-0 font-weight-bold text-gray-800"><?php echo $newest_product;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- active clients -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $active_products_count;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-on fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- inactive clients -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Inactivated Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $inactive_products_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-off fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Table of active products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Active Products Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center products_table" width="100%" cellspacing="0">
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
                  <?php foreach ($active_products as $active_product): ?>
                    <tr>
                      <td class="product_title"><?php echo $active_product['product_title'] ?></td>
                      <td><?php echo $active_product['product_category'] ?></td>
                      <td><?php echo $active_product['product_description'] ?></td>
                      <td><?php echo $active_product['product_quantity'] ?></td>
                      <td><?php echo $active_product['product_price'] ?></td>
                      <td>
                        <img src="<?php echo $active_product['product_image_url'] ?>" alt="" width="50px" height="50px">
                      </td>
                      <td>
                        <div class="row justify-content-center mx-2">
                          <form method="POST" action="<?php echo base_url('pages/setProductID') ?>">
                            <input type="text" name="prev_view" value="products" hidden>
                            <input type="text" name="product_id" value="<?php echo $active_product['product_id'] ?>" hidden>
                            <button type="submit" class="btn btn-circle btn-info btn-sm" data-toggle="tooltip" title="View Product Details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <?php if ($_SESSION['user_details']['user_type'] == 'admin'): ?>
                            <span data-toggle="tooltip" data-placement="top" title="Deactivate">
                              <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $active_product['product_id'] ?>,deactivate" data-toggle="modal" data-target="#update_status_modal">
                                <i class="fas fa-toggle-off"></i>
                              </button>
                            </span>
                            <button class="btn btn-circle btn-danger btn-sm delete_btn" data-toggle="tooltip" title="Delete Product" value="<?php echo $active_product['product_id'] ?>">
                              <i class="fa fa-trash"></i>
                            </button>
                          <?php endif ?>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

           <!-- Table of inactive products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Inactive Products Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center products_table" width="100%" cellspacing="0">
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
                  <?php foreach ($inactive_products as $inactive_product): ?>
                    <tr>
                      <td class="product_title"><?php echo $inactive_product['product_title'] ?></td>
                      <td><?php echo $inactive_product['product_category'] ?></td>
                      <td><?php echo $inactive_product['product_description'] ?></td>
                      <td><?php echo $inactive_product['product_quantity'] ?></td>
                      <td><?php echo $inactive_product['product_price'] ?></td>
                      <td>
                        <img src="<?php echo $inactive_product['product_image_url'] ?>" alt="" width="50px" height="50px">
                      </td>
                      <td>
                        <div class="row justify-content-center mx-2">
                          <form method="POST" action="<?php echo base_url('pages/setProductID') ?>">
                            <input type="text" name="prev_view" value="products" hidden>
                            <input type="text" name="product_id" value="<?php echo $inactive_product['product_id'] ?>" hidden>
                            <button type="submit" class="btn btn-circle btn-info btn-sm" data-toggle="tooltip" title="View Product Details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <?php if ($_SESSION['user_details']['user_type'] == 'admin'): ?>
                            <span data-toggle="tooltip" data-placement="top" title="Activate">
                              <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $inactive_product['product_id'] ?>,activate" data-toggle="modal" data-target="#update_status_modal">
                                <i class="fas fa-toggle-on"></i>
                              </button>
                            </span>
                            <button class="btn btn-circle btn-danger btn-sm delete_btn" data-toggle="tooltip" title="Delete Product" value="<?php echo $inactive_product['product_id'] ?>">
                              <i class="fa fa-trash"></i>
                            </button>
                          <?php endif ?>
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

  <!-- Modal for activate or deactivate product-->
<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning"><strong class="status_action"></strong> Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="status_message">
          
        </div>
        <div class="text-center alert alert-warning">
          <p class="text-warning"><strong class="status_action"></strong> this Product?</p>
          <p><strong id="status_product_name"></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('pages/updateProductStatus') ?>" id="status_update_form">
          <input type="text" id="status_product_id" name="status_product_id" hidden>
          <input type="text" id="update_action" name="update_action" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="status_update_form" type="submit" class="btn btn-warning btn-sm">Confirm</button>
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
    $('.products_table').DataTable();
  </script>