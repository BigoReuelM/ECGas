<!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      

      <span data-toggle="tooltip" data-placement="top" title="Back to Sales List">
        <a type="button" class="btn mb-3" href="<?php echo base_url('pages/sales') ?>">
          <i class="fas fa fa-angle-double-left"></i>
          Back
        </a>
      </span>

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
          <h1 class="h3 mb-2 text-gray-800">Sales Details</h1>
          <p class="mb-4">Sales Details: <strong>View</strong> Sale Details and <strong>Add</strong> payment/s.</p>
        </div>
        <div>
          <span data-toggle="tooltip" title="Return/Refund Items">
            <a href="<?php echo base_url('pages/saleReturnOrRefund') ?>" class="btn btn-danger btn-sm" id="delete_btn">
              <i class="fa fa-undo"></i>
              Return/Refund
            </a>
          </span>
        </div>
      </div>

      <div class="row">
        <div class="col-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sales Details</h6>
            </div>
            <div class="card-body">
              <div class="row mb-4">
                <div class="col border-right">
                  <div class="form-group">
                    <label for="sale_date"><small>Date:</small></label>
                    <p id="sale_date" class="form-control form-control-sm"><?php echo $sales_details['date'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="client_name"><small>Client:</small></label>
                    <p id="client_name" class="form-control form-control-sm"><?php echo $sales_details['client'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="seller_name"><small>Seller:</small></label>
                    <p id="seller_name" class="form-control form-control-sm"><?php echo $sales_details['user'] ?></p>
                  </div>
                </div>
                <div class="col border-right">
                  <div class="form-group">
                    <label for="total_items"><small>Total Items:</small></label>
                    <p id="total_items" class="form-control form-control-sm"><?php echo $sales_details['sales_total_items'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="total"><small>Total:</small></label>
                    <p id="total" class="form-control form-control-sm"><?php echo $sales_details['sales_total_amount'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="discount"><small>Discount:</small></label>
                    <p id="discount" class="form-control form-control-sm"><?php echo $sales_details['sales_discount'] ?></p>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="total_payable"><small>Total Payable:</small></label>
                    <p id="total_payable" class="form-control form-control-sm"><?php echo $sales_details['sales_total_payable'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="paid_amount"><small>Paid Amount:</small></label>
                    <p id="paid_amount" class="form-control form-control-sm"><?php echo $sales_details['sales_paid_amount'] ?></p>
                  </div>
                  <div class="form-group">
                    <label for="sales_balance"><small>Balance:</small></label>
                    <p id="sales_balance" class="form-control form-control-sm"><?php echo $sales_details['sales_balance'] ?></p>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-4 border-right">
                  <div class="form-group">
                    <label for="returned_products_count"><small>Product Returned Count:</small></label>
                    <p id="returned_products_count" class="form-control form-control-sm"><?php echo $returned_product_count ?></p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="refund_total"><small>Refund Total:</small></label>
                    <p id="refund_total" class="form-control form-control-sm"><?php echo $sales_details['sales_refund_amount'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card shadow mb-4">
            <div class="card-body">
              <?php if ($sales_details['sales_status'] == 'credit'): ?>
                <h1 class="text-danger text-center">On Credit</h1>
              <?php endif ?>
              <?php if ($sales_details['sales_status'] == 'partialyPaid'): ?>
                <h1 class="text-warning text-center">Partially Paid</h1>
              <?php endif ?>
              <?php if ($sales_details['sales_status'] == 'fullyPaid'): ?>
                <h1 class="text-success text-center">Fully Paid</h1>
              <?php endif ?>
            </div>
          </div>
            <?php if ($sales_details['sales_status'] == 'credit' || $sales_details['sales_status'] == 'partialyPaid'): ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Payment</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="<?php echo base_url('pages/addSalesPayment') ?>" id="add_payment_form">
                    <input type="text" name="sales_id" value="<?php echo $sales_details['sales_id'] ?>" hidden>
                    <div class="form-group">
                      <label for="balance">Balance:</label>
                      <p class="form-control"><?php echo $sales_details['sales_balance'] ?></p>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="number" step="0.01" min="0" max="<?php echo $sales_details['balance'] ?>" class="form-control" id ="amount_paid" name="amount_paid" valrequired="true" elementname="Amount">
                    </div>
                  </form>
                </div>        
                <div class="card-footer">
                  <button type="submit" form="add_payment_form" class="btn btn-sm btn-primary float-right">
                    <i class="fa fa-plus"></i>
                    Add Payment
                  </button>
                </div>
              </div>
            <?php endif ?>
        </div>
      </div>
      <div class="row">
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <table class="table table-striped table-bordered table-sm text-center" id="sale_products_table" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Product Name</th>
                      <th scope="col">Count</th>
                      <th scope="col">Price</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sales_products as $product): ?>
                      <tr>
                        <td><?php echo $product['product_title'] ?></td>
                        <td><?php echo $product['product_count'] ?></td>
                        <td><?php echo $product['product_price'] ?></td>
                        <td><?php echo $product['product_total_amount'] ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Return/Refund Logs</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <table class="table table-striped table-bordered table-sm text-center" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">User</th>
                      <th scope="col">Reason</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Returns</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rr_logs as $rr_log): ?>
                      <tr>
                        <td><?php echo $rr_log['rr_date'] ?></td>
                        <td><?php echo $rr_log['user'] ?></td>
                        <td><?php echo $rr_log['rr_reason'] ?></td>
                        <td><?php echo $rr_log['rr_amount'] ?></td>
                        <td>
                          <form action="<?php echo base_url('pages/getProductReturns') ?>" class="view_product_return_form">
                            <input type="text" name="sales_id" value="<?php echo $sales_details['sales_id'] ?>" hidden>
                            <input type="text" name="rr_id" value="<?php echo $rr_log['rr_id'] ?>" hidden>
                            <button type="submit" class="btn btn-sm btn-info btn-circle">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payment Logs</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <table class="table table-striped table-bordered table-sm text-center" id="sale_products_table" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Payment Date</th>
                      <th scope="col">Receiver</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($payment_logs as $log): ?>
                      <tr>
                        <td><?php echo $log['date'] ?></td>
                        <td><?php echo $log['user'] ?></td>
                        <td><?php echo $log['amount'] ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
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

<div class="modal fade" id="returned_products_modal" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Returned Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <table class="table table-striped table-bordered table-sm text-center" id="returned_products_table" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Count</th>
                </tr>
              </thead>
              <tbody id="table_body">
              </tbody>
            </table>
          </div>
        </div>
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

  <!-- Script for dataTables -->

  <script src="<?php echo base_url() ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- custom script for this page -->
  <script src="<?php echo base_url() ?>public/js/sales_details.js"></script>
  <script src="<?php echo base_url() ?>public/js/returned_products.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>