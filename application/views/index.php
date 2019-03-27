
<!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="row">
      <div class="col-4">
        <div class="card shadow md-4">
          <div class="card-header">
            <h5 class="text-primary">Issues</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <p>Most Frequent Issue:</p>
                <p class="form-control"></p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p>Latest issues:</p>
                <table class="table table-striped table-bordered table-sm" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>Issue</th>
                      <th>Client</th>
                      <th>Date Recorded</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Damaged Cylender</tb>
                      <td>Pipito Manaloto</tb>
                      <td>March 10, 2019</tb>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card shadow md-4">
          <div class="card-header">
            <h5 class="text-warning">Low Stock Products</h5>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th>Product Name</th>
                  <th>Product SKU</th>
                  <th>Product Inventory</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products_low_sku as $product): ?>
                  <tr>
                    <td><?php echo $product['product_title'] ?></td>
                    <td><?php echo $product['product_sku'] ?></td>
                    <td><?php echo $product['product_quantity'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="card shadow md-4">
          <div class="card-header">
            <h5 class="text-warning">Possible Product Orders</h5>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th>Product Name</th>
                  <th>Client Name</th>
                  <th>Days of Ussage</th>
                  <th>Last Order Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($possible_product_orders as $product): ?>
                  <tr>
                    <td><?php echo $product['product_title'] ?></td>
                    <td><?php echo $product['client_name'] ?></td>
                    <td><?php echo $product['days_of_ussage'] ?></td>
                    <td><?php echo $product['sales_date'] ?></td>
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



  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>public/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>public/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url() ?>public/js/demo/chart-pie-demo.js"></script>