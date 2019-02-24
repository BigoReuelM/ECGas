

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          
          <h1 class="h3 mb-2 text-gray-800">Add product</h1>
          
          <a href="<?php echo base_url('pages/allProducts') ?>" class="btn btn-sm btn-primary mb-3">
            <i class="fa fa-angle-double-left"></i>
            Back
          </a>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group">
                <label for="product_title">Title:<span class="required_sign">*</span></label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Gasoline Tank" valrequired="true">
              </div>
              <div class="form-group">
                <label for="product_description">Description:</label>
                <textarea name="product_description" id="product_description" class="form-control" cols="30" rows="10" style="resize: none"></textarea>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-body">
              <label for="image_upload">Image:</label>
              <input type="file">
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group">
                <label for="product_price">Price:</label>
                <input type="text" name="product_price" id="product_price" class="form-control">
              </div>
              <div class="form-group">
                <label for="product_cost">Cost Per Item:</label>
                <input type="text" name="product_cost" id="product_cost" class="form-control">
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <di class="card-body">
              <div class="form-group">
                <label for="product_sku">SKU(stock keeping unit):</label>
                <input type="text" name="product_sku" id="product_sku" class="form-control">
              </div>
              <div class="form-group">
                <label for="product_quantity">Quantity:</label>
                <input type="text" name="product_quantity" id="product_quantity" class="form-control">
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
