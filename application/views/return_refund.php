

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

    <div class="row justify-content-center" id="rr_container">
      <div class="col-6">
        <?php foreach ($sales_products as $product): ?>
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <input type="checkbox" name="product_ids[]" class="product_check_box" value="<?php echo $product['product_id'] ?>" form="refund_return_form">
                </div>
                <div class="col-auto">
                  <img src="<?php echo $product['product_image_url'] ?>" alt="Image" width="50" height="50">
                </div>
                <div class="col border-right">
                  <div class="font-weight-bold"><?php echo $product['product_title'] ?></div>
                  <div>Php <?php echo $product['product_price'] ?></div>
                  <div><?php echo $product['product_count'] ?><span class="font-weight-lighter"> item/s</span></div>
                </div>
                <div class="col">
                  <input type="number" name="returned_product_count[]" id="returned_product_count_<?php echo $product['product_id'] ?>" class="form-control" form="refund_return_form" min="1" max="<?php echo $product['product_count'] ?>" disabled>
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
            <textarea name="rr_reason" id="rr_reason" form="refund_return_form" cols="30" rows="3" class="form-control" style="resize: none" valrequired="true" elementname="Password">
              
            </textarea>
          </div>
        </div>
        <div class="card shadow mb-2">
          <div class="card-body">
            <div class="font-weight-bold">Summary</div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Total
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_total_amount'] ?>
              </div>
            </div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Discount
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_discount'] ?>
              </div>
            </div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Total Payable
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_total_payable'] ?>
              </div>
            </div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Paid Amount
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_paid_amount'] ?>
              </div>
            </div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Balance
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_balance'] ?>
              </div>
            </div>
            <div class="row justify-content-between border-top">
              <div class="col">
                Refunded Amount
              </div>
              <div class="col font-weight-light">
                Php <?php echo $sales_details['sales_refund_amount'] ?>
              </div>
            </div>
            <hr>
            <div class="font-weight-bold">Refund Amount</div>
            <div class="row">
              <div class="col">
                <input name="rr_amount" form="refund_return_form" type="number" class="form-control" min="0" step="0.01" max="<?php echo $sales_details['total_paid_amount'] ?>">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-primary btn-block btn-sm" id="confirm_rr_btn">
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

<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Confirm</strong> <small>Refund and Return</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center alert alert-danger">
          <p class="text-danger">Proceed recording return and refund?</p>
        </div>
        <form method="POST" action="<?php echo base_url('pages/recordReturnRefund') ?>" id="refund_return_form">
          <input type="text" name="sales_id" value="<?php echo $sales_details['sales_id'] ?>" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="refund_return_form" type="submit" class="btn btn-danger btn-sm">Ok</button>
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

  <!-- Custom js for this page -->
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  <script src="<?php echo base_url() ?>public/js/return_refund.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>