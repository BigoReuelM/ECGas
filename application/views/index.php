
<!-- Begin Page Content -->
  <div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>

    <hr>
    
    <div class="row">
      <!-- total number of clients -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Clients</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $clients_count;  ?></div>
                <div><span class="font-weight-bold text-success">Active: </span><?php echo $active_clients_count ?></div>
                <div><span class="font-weight-bold text-warning">Inactive: </span><?php echo $inactive_clients_count ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- newest client -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Newest Client</div>
                <div calss="mb-0 font-weight-bold text-gray-800"><?php echo $newest_client;  ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- total number of products -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Products</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $product_count;  ?></div>
                <div><span class="font-weight-bold text-success">Active: </span><?php echo $active_products_count ?></div>
                <div><span class="font-weight-bold text-warning">Inactive: </span><?php echo $inactive_products_count ?></div>
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
    </div>

    <div class="row mb-4">
      <div class="col-4">

        <div class="mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Amounts Receivable</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Php <?php echo $total_amount_receivable;  ?></div>
                  <a href="<?php echo base_url('pages/sales') ?>" class="text-gray-800">
                    
                    <small>more...
                    <i class="fas fa-arrow-right"></i></small>
                  </a>
                </div>
                <div class="col-auto">
                  <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-8">
        <div class="card shadow mb-4">
          <div class="card-header">
            <h5 class="text-info">Issues</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="font-weight-bold text-primary">5 Latest issues:</div>
                <table class="table table-striped table-bordered table-sm" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>Issue</th>
                      <th>Product</th>
                      <th>Client</th>
                      <th>Recorder</th>
                      <th>Date Recorded</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($issues as $issue): ?>
                      <tr>
                        <td><?php echo $issue['issue'] ?></td>
                        <td><?php echo $issue['product_title'] ?></td>
                        <td><?php echo $issue['client_name'] ?></td>
                        <td><?php echo $issue['user_name'] ?></td>
                        <td><?php echo $issue['date_recorded'] ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header">
            <h5 class="text-warning">Low Inventory Products</h5>
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
        <div class="card shadow mb-4">
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
