

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
        
          <h1 class="h3 mb-2 text-gray-800">Inventory Monitoring and Management</h1>
          <p>Inventory Monitoring and management: <strong>ADD or SET</strong> a products inventory.</p>       
          <!-- Table of products -->
              
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Products Inventory Table
              </h6>
            </div>
            <div class="card-body">
              <div class="row border-bottom mb-4">
                <div class="col">
                  <form method="GET" action="<?php echo base_url('pages/getFilteredProducts') ?>" id="filter_product_form">
                    <div class="row justify-content-left">
                      <div class="col-1">
                        <div class="row">
                          <div class="col">
                            <p><small><strong>Filters:</strong></small></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group row">
                          <label for="product_category_id" class="col-4 col-form-label col-form-label-sm">Category:</label>
                          <div class="col-8">
                            <select name="product_category_id" id="product_category_id" class="form-control form-control-sm">
                              <option hidden selected disabled>Choose Category</option>
                              <?php foreach ($product_categories as $category): ?>
                                <option value="<?php echo $category['product_category_id'] ?>"><?php echo $category['product_category'] ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <table class="table table-striped table-bordered table-sm text-center" id="products_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>Product</th>
                    <th>Product Category</th>
                    <th>SKU(stock keeping unit)</th>
                    <th>Current Inventory</th>
                    <th>Update Inventory</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td>
                        <div class="row justify-content-center">
                          <div class="col-4">
                            <img src="<?php echo $product['product_image_url'] ?>" alt="Product Image"  width="50px" height="50px" class="float-right" >    
                          </div>
                          <div class="col-8 product_title">
                            <?php echo $product['product_title'] ?>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $product['product_category'] ?></td>
                      <td><?php echo $product['product_sku'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <p class="inventory"><?php echo $product['product_quantity'] ?></p>
                          <p class="text-warning product_quantity">
                            
                          </p>
                        </div>  
                      </td>
                      <td>
                        <div class="update_container">
                          <div class="update_content">
                            <form method="POST" action="<?php echo base_url('pages/updateProductInventory') ?>" id="update_product_inventory_form<?php echo '_' . $product['product_id'] ?>">
                              <input type="text" name="product_id" value="<?php echo $product['product_id'] ?>" hidden>
                              <input type="text" name="update_action" class="update_action" hidden>
                              <input type="text" name="current_inventory" class="current_inventory" value="<?php echo $product['product_quantity'] ?>" hidden>
                              <button type="button" class="update_element update_btn shadow-sm" value="add">ADD</button>
                              <button type="button" class="update_element update_btn shadow-sm" value="set">SET</button>
                              <input type="number" name="no_unit" min="1" class="update_element update_input shadow-sm">
                              <button type="submit" class="update_element update_submit shadow-sm shadow-sm" disabled="disabled">SAVE</button>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="row justify-content-center">
                          <form method="POST" action="<?php echo base_url('pages/setProductID') ?>">
                            <input type="text" name="prev_view" value="inventory" hidden>
                            <input type="text" name="product_id" value="<?php echo $product['product_id'] ?>" hidden>
                            <span data-toggle="tooltip" title="View Product Information">
                              <button class="btn btn-circle btn-info btn-info btn-sm" type="submit">
                                <i class="fa fa-eye"></i>
                              </button>
                            </span>
                          </form>
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
  <script src="<?php echo base_url() ?>public/js/inventory.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
