

<!-- Begin Page Content -->
        <div class="container-fluid">

          <span data-toggle="tooltip" data-placement="top" title="Back to Users List">
            <?php if ($_SESSION['prev_view'] == 'products'): ?>
              <a type="button" class="btn mb-3" href="<?php echo base_url('pages/allProducts') ?>">
                <i class="fas fa fa-angle-double-left"></i>
                Back
              </a>
            <?php endif ?>
            <?php if ($_SESSION['prev_view'] == 'inventory'): ?>
              <a type="button" class="btn mb-3" href="<?php echo base_url('pages/inventory') ?>">
                <i class="fas fa fa-angle-double-left"></i>
                Back
              </a>
            <?php endif ?>
          </span>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Product Details</h1>
              <p class="mb-4">Product Details: <strong> VIEW</strong> and <strong>EDIT</strong> details of a product.</p>
            </div>
            <div>
              <span data-toggle="tooltip" title="Delete Product">
                <button class="btn btn-danger btn-sm" id="delete_btn" data-toggle="modal" data-target="#product_delete_modal">
                  <i class="fa fa-trash"></i>
                  DELETE Product
                </button>
              </span>
            </div>
          </div>

          <!-- Table of products -->
          <div class="row">
            <div class="col-9">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                    View/Edit Details
                  </h6>
                </div>
                <div class="card-body">
                  <div id="details_container">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-5">
                        <img src="<?php echo $product_details['product_image_url'] ?>" alt="" width="100%" id="product_image_view">
                        <div class="form-group">
                          <label for="product_image">Select Image:</label>
                          <input type="file" id="product_image" name="file" class="detail form-control-file">
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="product_title"><small>Product Title:</small></label>
                          <input type="text" name="product_title" id="product_title" class="form-control form-control-sm detail" placeholder="<?php echo $product_details['product_title'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="product_category_id"><small>Product Category:</small></label>
                          <select name="product_category_id" id="product_category_id" class="form-control form-control-sm detail">
                            <option hidden selected disabled><?php echo $product_details['product_category'] ?></option>
                            <?php foreach ($product_categories as $category): ?>
                              <option value="<?php echo $category['product_category_id'] ?>"><?php echo $category['product_category'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="product_description"><small>Product Description:</small></label>
                          <textarea name="product_description" id="product_description" class="form-control form-control-sm detail" rows="3" style="resize: none" placeholder="<?php echo $product_details['product_description'] ?>"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="product_price"><small>Product Price:</small></label>
                          <input type="text" name="product_price" id="product_price" class="form-control form-control-sm detail" placeholder="<?php echo $product_details['product_price'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="product_cost"><small>Product Cost:</small></label>
                          <input type="text" name="product_cost" id="product_cost" class="form-control form-control-sm detail" placeholder="<?php echo $product_details['product_cost'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="product_sku"><small>SKU(Stock keeping unit):</small></label>
                          <input type="number" min="0" name="product_sku" id="product_sku" class="form-control form-control-sm detail" placeholder="<?php echo $product_details['product_sku'] ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-sm btn-primary float-right" id="save_edits">
                    <i class="fa fa-save"></i>
                    Save Changes
                  </button>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                    Date and Time Added:
                  </h6>
                </div>
                <div class="card-body">
                  <p class="text-center"><small><?php echo $product_details['date_product_added'] ?></small></p>  
                </div>
                <div class="card-footer">
                  
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                    Available Units
                  </h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_quantity">Current Quantity:</label>
                    <p type="text" class="form-control text-center form-control-lg"><?php echo $product_details['product_quantity'] ?></p>
                  </div>
                </div>
                <div class="card-footer">
                  
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                    Units Sold
                  </h6>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="product_quantity">Total Units Sold:</label>
                    <p type="text" class="form-control text-center form-control-lg"><?php echo $total_units_sold; ?></p>
                  </div>
                </div>
                <div class="card-footer">
                  
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

<div class="modal fade" id="update_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>UPDATE</strong> User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Confirm Inputs.</p>
        <input type="text" name="product_id" value="<?php echo $product_details['product_id'] ?>" form="detail_update_form" hidden>
        <form method="POST" action="<?php echo base_url('pages/updateProductDetails') ?>" id="detail_update_form" enctype="multipart/form-data">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="detail_update_form" type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for delete users-->
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
        </div>
        <form method="POST" action="<?php echo base_url('pages/deleteProduct') ?>" id="delete_product_form_from_details">
          <input type="text" id="url" value="<?php echo base_url('pages/allProducts') ?>" hidden>
          <input type="text" name="product_id" value="<?php echo $product_details['product_id'] ?>" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="delete_product_form_from_details" type="submit" class="btn btn-danger btn-sm">Confirm Delete</button>
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

  <script src="<?php echo base_url() ?>public/js/product_details.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>  