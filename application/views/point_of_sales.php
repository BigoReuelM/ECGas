

<!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col text-center">
                    <h5>Point of Sale</h5>
                    <p>Date/Time: <span id="dateTime"></span></p>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-8">
                    <div id="cart_table_container">
                      <table class="table table-sm" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                          <tr>
                            <th>Action</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody id="cart_table_body">
                          <tr id="empty_product_row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>    
                    </div>
                  </div>
                  <div class="col-4">
                    <p><small>Total Item:</small></p>
                    <p id="total_items" class="form-control form-control-sm">0.00</p>
                    <p><small>Total:</small></p>
                    <p id="total" class="form-control form-control-sm">0.00</p>
                    <p><small>Discount:</small></p>
                    <input type="number" step="0.01" min="0" class="form-control form-control-sm form-control-sm" id="discount_input">
                    <p><small>Total Payable:</small></p>
                    <p id="total_payable" class="form-control form-control-sm">0.00</p>
                  </div>
                </div>
                <hr/>
                <div class="row justify-content-between">
                  <div class="col-3"> 
                    <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#cancel_sale_modal">
                      Cancel
                    </button>
                  </div>
                  <div class="col-3">
                    <button id="payment_btn" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#payment_modal">
                      Payment
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="row">
              <div class="col">
                <div id="pos_product_container">
                  <?php foreach ($products as $product): ?>
                    <div class="row mb-2 justify-content-center">
                      <div class="col-10">
                        <div class="card shadow">
                          <img src="<?php echo $product['product_image_url'] ?>" class="card-img-top" alt="product_image" data-toggle="tooltip" title="<?php echo $product['product_title'] ?>">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item pos_product_title"><?php echo $product['product_title'] ?></li>
                            <li class="list-group-item pos_product_price"><small>Price: </small><strong>Php <?php echo $product['product_price'] ?></strong></li>
                            <li class="list-group-item pos_product_quantity"><small>Current Inventory: </small><strong><?php echo $product['product_quantity'] ?></strong></li>
                            <li class="list-group-item pos_product_quantity">
                              <button type="botton" class="btn btn-primary btn-block btn-sm add_cart_btn" value="<?php echo $product['product_id'] . ',' . $product['product_price'] . ',' . $product['product_title'] ?>">
                                <i class="fa fa-plus"></i>
                                Add to Cart
                              </button>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
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



  <!-- Modal for cancel Sales-->
<div class="modal fade" id="cancel_sale_modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Warning</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="text-danger">Cancel this transaction?</p>
        <p class="text-danger">Agreeing will remove all progress!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cancel_sale_btn">Agree</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal for delete users-->
<div class="modal fade" id="payment_modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Payment</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form method="POST" id="payment_form" action="<?php echo base_url('pages/addSales') ?>">
          <div class="form-group row">
            <label for="" class="col-form-label col-form-label-sm col-4">Customer:</label>
            <div class="col-8">
              <select id="client" class="form-control form-control-sm">
                <option selected disabled>Walk-in Customer</option>
                <?php foreach ($clients as $client): ?>
                  <option value="<?php echo $client['client_id'] ?>"><?php echo $client['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-form-label-sm col-4">Total Payable Amount:</label>
            <div class="col-8">
              <p type="text" class="form-control form-control-sm" id="total_payable_amount"></p>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-form-label-sm col-4">Total Purchase Items:</label>
            <div class="col-8">
              <p type="text" class="form-control form-control-sm" id="total_purchase_items"></p>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-form-label-sm col-4">Paid By:</label>
            <div class="col-8">
              <select id="payment_method" class="form-control form-control-sm">
                <option disabled selected hidden>Choose Method..</option>
                <?php foreach ($payment_methods as $method): ?>
                  <option value="<?php echo $method['payment_method_id'] ?>"><?php echo $method['payment_method'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="paid_amount" class="col-form-label col-form-label-sm col-4">Paid:</label>
            <div class="col-8">
              <input type="number" step="0.01" min="0" id="paid_amount" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-form-label-sm col-4">Return Change:</label>
            <div class="col-8">
              <input type="text" class="form-control form-control-sm" id="change" readonly="readonly">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm" form="payment_form">Confirm</button>
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

  <script src="<?php echo base_url() ?>public/js/point_of_sales.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
