
  <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      

      <!-- Button for adding a new User -->
      
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1 class="h3 mb-2 text-gray-800">Sales Monitoring and Management</h1>
          <p class="mb-4">Sales Monitoring and Management: <strong>Manage</strong> sales or <strong>View and Monitor</strong> Sales Reports.</p>
        </div>
      </div>
      <hr>
      <div class="row">     
        <div class="col">
          <div class="mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Sales:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="overall_total"> <?php echo $overall_total;  ?></span></div>
                  </div>
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Discount:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="total_discount"> <?php echo $total_discount;  ?></span></div>
                  </div>
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Amount Payable:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="total_amount_payable"> <?php echo $total_amount_payable;  ?></span></div>
                  </div>
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Amount Paid:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="total_amount_paid"> <?php echo $total_amount_paid;  ?></span></div>
                  </div>
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Amount Receivable:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="total_amount_receivable"> <?php echo $total_amount_receivable;  ?></span></div>
                  </div>
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Refunded Amount:</div>
                    <div class="h5 mb-1 ml-2 font-weight-bold text-gray-800">Php <span id="total_returned_amount"> <?php echo $total_returned_amount;  ?></span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">    
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sales Logs</h6>
            </div>
            <form action="<?php echo base_url('pages/getFilteredSales') ?>" id ="sale_filter_form">
              <div class="row">
                <div class="col mx-3 mt-2"  style="background: #eaecef">
                  <div><small><strong>Filters:</strong></small></div>
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group row">
                            <label for="from_date" class="col-form-label col-3"><small>From:</small></label>
                            <div class="col-9">
                              <input type="date" name="from_date" class="form-control form-control-sm" value="<?php echo $date ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group row">
                            <label for="to_date" class="col-3 col-form-label col-form-label-sm">To:</label>
                            <div class="col-9">
                              <input type="date" name="to_date" class="form-control form-control-sm" value="<?php echo $date ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group row">
                            <label for="sale_status_filter" class="col-3 col-form-label col-form-label-sm">Status:</label>
                            <div class="col-9">
                              <select name="sale_status_filter" id="sale_status_filter" class="form-control form-control-sm">
                                <option selected disabled hidden>Choose Status..</option>
                                <option value="">All</option>
                                <option value="credit">Credit</option>
                                <option value="partialyPaid">Partially Paid</option>
                                <option value="fullyPaid">Fully Paid</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row border-top text-center">
                        <div class="col">
                          <button type="submit" class="btn btn-sm btn-primary shadow">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="card-body">
              <table  class="table table-striped table-bordered table-sm text-center" id="sales_table" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>Date and Time</th>
                      <th>Total</th>
                      <th>Discount</th>
                      <th>Total Payable</th>
                      <th>Paid Amount</th>
                      <th>Balance</th>
                      <th>User/Seller</th>
                      <th>Client</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sales as $sale): ?>
                      <tr>
                        <td><?php echo $sale['date'] ?></td>
                        <td class="sale_total_amount"><?php echo $sale['sales_total_amount'] ?></td>
                        <td class="current_discount"><?php echo $sale['sales_discount'] ?></td>
                        <td class="sale_total_payable"><?php echo $sale['sales_total_payable'] ?></td>
                        <td class="sale_paid_amount"><?php echo $sale['sales_paid_amount'] ?></td>
                        <td class="sale_balance"><?php echo $sale['sales_balance'] ?></td>
                        <td><?php echo $sale['user'] ?></td>
                        <td class="sale_client"><?php echo $sale['client'] ?></td>
                        <td>
                          <form method="GET" action="<?php echo base_url('pages/setCurrentSaleID') ?>">
                            <input type="text" name="sales_id" value="<?php echo $sale['sales_id'] ?>" hidden>
                            <button type="submit" class="btn btn-circle btn-info btn-sm">
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

  <!-- custom script for this page -->
  <script src="<?php echo base_url() ?>public/js/sales.js"></script>
  <script src="<?php echo base_url() ?>public/js/sales_details.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>


  <script type="text/JavaScript">
    $(document).on('submit', '#sale_filter_form', function(e){
      e.preventDefault();

      $.ajax({
        type: 'get',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json'
      }).done(function(response){

        $('#overall_total').html(response.overall_total);
        $('#total_discount').html(response.total_discount);
        $('#total_amount_paid').html(response.total_amount_paid);
        $('#total_amount_receivable').html(response.total_amount_receivable);
        $('#total_amount_payable').html(response.total_amount_payable);
        $('#total_returned_amount').html(response.total_returned_amount);

        $('#sales_table').DataTable().destroy();

        $('#sales_table').DataTable({
          data: response.sales,
          columns: [
            {data: 'date'},
            {data: 'sales_total_amount'},
            {data: 'sales_discount'},
            {data: 'sales_total_payable'},
            {data: 'sales_paid_amount'},
            {data: 'sales_balance'},
            {data: 'user'},
            {data: 'client'},
            {
              data: null,
              render: function(data, type, row){
                  return '<form method="GET" action="<?php echo base_url('pages/setCurrentSaleID') ?>">' +
                                  '<input type="text" name="sales_id" value="' + data.sales_id + '" hidden>' +
                                  '<button type="submit" class="btn btn-circle btn-info btn-sm">' +
                                    '<i class="fa fa-eye"></i>' +
                                  '</button>' +
                                '</form>'

              }
            },
          ]
        });
      });
    });
  </script>