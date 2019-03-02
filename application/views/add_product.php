

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <span data-toggle="tooltip" title="Back to product list">
            <a href="<?php echo base_url('pages/allProducts') ?>" class="btn mb-3">
              <i class="fa fa-angle-double-left"></i>
              Back
            </a>
          </span>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <h1 class="h3 mb-2 text-gray-800">Add product</h1>
            <div class="btn-group">
              <button type="submit" class="btn btn-primary" form="addProduct">
                <i class="fa fa-save"></i>
                Save
              </button>
            </div>
          </div>
          
          
          <form action="<?php echo base_url('pages/insertNewProduct') ?>" id="addProduct">
            <div class="row">
              <div class="col-8">
                <div class="card shadow mb-4" id="card_product_details">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="product_title">Title:<span class="required_sign">*</span></label>
                          <input type="text" name="product_title" id="product_title" class="form-control" valrequired="true" elementname="Product Title">
                        </div>
                        <div class="form-group">
                          <label for="product_description">Description:</label>
                          <textarea name="product_description" id="product_description" class="form-control" rows="8" style="resize: none"></textarea>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="product_price">Price:<span class="required_sign">*</span></label>
                          <input type="text" name="product_price" id="product_price" class="form-control" valrequired="true" elementname="Product Price">
                        </div>
                        <div class="form-group">
                          <label for="product_cost">Cost Per Item:<span class="required_sign">*</span></label>
                          <input type="text" name="product_cost" id="product_cost" class="form-control" valrequired="true" elementname="Product Cost">
                        </div>
                        <div class="form-group">
                          <label for="product_sku">SKU(stock keeping unit):<span class="required_sign">*</span> <i class="fa fa-info-circle" data-toggle="tooltip" title="Number of minimum stocks allowed!"></i></label>
                          <input type="text" name="product_sku" id="product_sku" class="form-control" valrequired="true" elementname="Product SKU">
                        </div>
                        <div class="form-group">
                          <label for="product_quantity">Quantity:</label>
                          <input type="text" name="product_quantity" id="product_quantity" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card shadow mb-4" id="card_product_image">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Image Upload</h6>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="imgInp">Upload Image</label>
                      <input type="file" id="imgInp" name="file" class="form-control-file">
                    </div>
                    <div id="card_product_image_inside" class="shadow row align-items-center justify-content-center">
                      <i class="fas fa-upload fa-10x" id="upload_icon"></i>
                      <img id='img-upload'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
        <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<!-- Modal for delete users-->
<div class="modal fade" id="name_error_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning"><strong>ERROR!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        
        <p><strong>Product Already Exist!</strong></p>
        <p>Check product records or change <b>product title.</b></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for delete users-->
<div class="modal fade" id="add_product_error_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>ERROR!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="text-danger">Adding Failed!</p>
        <p class="text-danger"><strong>TRY AGAIN!</strong></p>
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

  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/add_product.js"></script>

  <script type="text/JavaScript">
    $(document).on('submit', '#addProduct', function(e){
      e.preventDefault(); 
      
      if (validateRequired($(this).attr('id'))) {
        $.ajax({
          url: $(this).attr('action'),
          type:"post",
          data:new FormData(this), //this is formData
          dataType: 'json',
          processData:false,
          contentType:false
        }).done(function(response){
          if (response.success == true) {
            window.location.replace('<?php echo base_url('pages/productDetails') ?>');
          }else{
            if (response.name_unique == false) {
              $('#name_error_modal').modal('show');
            }else{
              $('#add_product_error_modal').modal('show');
            }
          }
        })
      }
    });
  </script>

  