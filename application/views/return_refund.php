

<!-- Begin Page Content -->
  <div class="container-fluid">

    <span data-toggle="tooltip" data-placement="top" title="Back to Sales List">
      <a type="button" class="btn mb-3" href="<?php echo base_url('pages/saleDetails') ?>">
        <i class="fas fa fa-angle-double-left"></i>
        Back
      </a>
    </span>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div>
        <h1 class="h3 mb-2 text-gray-800">Returns and Refunds</h1>
        <p class="mb-4">Sales Returns and Refunds: <strong>Record</strong> sales returns and refunds.</p>
      </div>
    </div>

    <hr>

    <div class="row justify-content-center">
      <div class="col-6">
        <?php foreach ($sales_products as $product): ?>
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <input type="checkbox">
                </div>
                <div class="col-auto">
                  <img src="<?php echo $product['product_image_url'] ?>" alt="Image" width="50px">
                </div>
                <div class="col">
                  <div class="font-weight-bold"><?php echo $product['product_title'] ?></div>
                  <div>Php <?php echo $product['product_price'] ?></div>
                  <div><?php echo $product['product_count'] ?><span class="font-weight-lighter"> items</span></div>
                </div>
                <div class="col">
                  <input type="number" min="0" max="<?php echo $product['product_count'] ?>" class="form-control" >
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row align-items-center">
                <div class="col-auto">
                  <input type="checkbox">
                </div>
                <div class="col">
                  <div class="font-weight-lighter">Check to restock refunded item.</div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="col-3">
        <div class="card shadow mb-2">
          <div class="card-body">
            <div class="font-weight-bold">Reason for refund / return</div>
            <textarea name="" id="" cols="30" rows="3" class="form-control" style="resize: none">
              
            </textarea>
          </div>
        </div>
        <div class="card shadow mb-2">
          <div class="card-body">
            <div class="font-weight-bold">Summary</div>
            <div class="row justify-content-between">
              <div class="col">
                Total
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_total_amount'] ?>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col">
                Discount
              </div>
              <div class="col">
                Php <?php echo $sales_details['sales_discount'] ?>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col">
                Total Payable
              </div>
              <div class="col">
                Php <?php echo $sales_details['sales_total_payable'] ?>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col">
                Paid Amount
              </div>
              <div class="col">
                Php <?php echo $sales_details['sales_paid_amount'] ?>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col">
                Balance
              </div>
              <div class="col">
                Php <?php echo $sales_details['sales_balance'] ?>
              </div>
            </div>
            <hr>
            <div class="font-weight-bold">Refund Amount</div>
            <div class="row">
              <div class="col">
                <input type="number" class="form-control" min="0" step="0.01" max="<?php echo $sales_details['total_paid_amount'] ?>">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <button class="btn btn-primary btn-block btn-sm">
                  Confirm
                </button>
              </div>
            </div>
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

   <!-- Script for dataTables -->

  <script src="<?php echo base_url() ?>public/vendor/datatables/jquery.dataTables.min.js"></script>

  <!-- Custom js for this page -->
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>