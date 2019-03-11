

<!-- Begin Page Content -->
        <div class="container-fluid">

          <span data-toggle="tooltip" title="Back to Users List">
            <a type="button" class="btn mb-3" href="<?php echo base_url('admin/users') ?>">
              <i class="fas fa fa-angle-double-left"></i>
              Back
            </a>
          </span>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User Details</h1>
          <p class="mb-4">User Details: <strong>EDIT</strong> details of a user and view <strong>REPORTS</strong> of sales by the user.</p>

          <!-- DataTales Example -->
          <div class="row">
            
            <div class="col-9">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Activity Logs</h6>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm text-center" id="user_sales_table" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th>Date and Time</th>
                        <th>Total</th>
                        <th>Total Payable</th>
                        <th>Paid Amount</th>
                        <th>Change</th>
                        <th>User/Seller</th>
                        <th>Client</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 1; 
                        foreach ($user_sales as $sale): ?>
                        <tr>
                          <td><?php echo $count ?></td>
                          <td><?php echo $sale['date'] ?></td>
                          <td><?php echo $sale['sales_total_amount'] ?></td>
                          <td><?php echo $sale['sales_total_payable'] ?></td>
                          <td><?php echo $sale['sales_paid_amount'] ?></td>
                          <td><?php echo $sale['sales_change'] ?></td>
                          <td><?php echo $sale['user'] ?></td>
                          <td><?php echo $sale['client'] ?></td>
                          <td>
                            <form action="<?php echo base_url('pages/getSaleDetails') ?>" class="sale_view_form">
                              <input type="text" name="sales_id" value="<?php echo $sale['sales_id'] ?>" hidden>
                              <button type="submit" class="btn btn-circle btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php 
                        $count++;
                        endforeach ?>
                    </tbody>
                  </table>                
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit User Details</h6>
                </div>
                <div class="card-body" id="details_container">
                  <div class="form-group">
                    <label for="first_name"><small>First Name:</small></label>
                    <input type="text" class="form-control form-control-sm detail" id="first_name" name="first_name" placeholder="<?php echo $user_details['first_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="middle_name"><small>Middle Name:</small></label>
                    <input type="text" class="form-control form-control-sm detail" id="middle_name" name="middle_name" placeholder="<?php echo $user_details['middle_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="last_name"><small>Last Name:</small></label>
                    <input type="text" class="form-control form-control-sm detail" id="last_name" name="last_name" placeholder="<?php echo $user_details['last_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="gender"><small>Gender:</small></label>
                    <select name="gender" id="gender" class="form-control form-control-sm detail">
                      <option hidden selected disabled><?php echo $user_details['gender'] ?></option>
                      <?php if ($user_details['gender'] == 'male'): ?>
                        <option value="female">Female</option>
                      <?php endif ?>
                      <?php if ($user_details['gender'] == 'female'): ?>
                        <option value="male">Male</option>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="user_type"><small>User Type:</small></label>
                    <select name="user_type" id="user_type" class="form-control form-control-sm detail">
                      <option hidden selected disabled><?php echo $user_details['user_type'] ?></option>
                      <?php if ($user_details['user_type'] == 'employee'): ?>
                        <option value="admin">Admin</option>
                      <?php endif ?>
                      <?php if ($user_details['user_type'] == 'admin'): ?>
                        <option value="employee">Employee</option>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="contact"><small>Contact Number:</small></label>
                    <input type="text" id="contact" name="contact" class="form-control form-control-sm detail" placeholder="<?php echo $user_details['contact'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="address"><small>Address:</small></label>
                    <textarea name="address" id="address" class="form-control form-control-sm detail" rows="3" style="resize: none" placeholder="<?php echo $user_details['address'] ?>"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="username"><small>Username:</small></label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm detail" placeholder="<?php echo $user_details['username'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="password"><small>Password:</small></label>
                    <input type="text" name="password" id="password" class="form-control form-control-sm detail" placeholder="<?php echo $user_details['password'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary btn-sm float-right" id="save_edits">
                    <i class="fa fa-save"></i>
                    Save
                  </button>
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
<!-- Modal for activate or deactivate account users-->
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
        <input type="text" name="user_id" value="<?php echo $user_details['user_id'] ?>" form="detail_update_form" hidden>
        <form method="POST" action="<?php echo base_url('admin/updateUserDetails') ?>" id="detail_update_form">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="detail_update_form" type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sale_view_modal" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>View</strong> Sale Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-4">
          <div class="col border-right">
            <div class="form-group">
              <label for="sale_date"><small>Date:</small></label>
              <p id="sale_date" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="client_name"><small>Client:</small></label>
              <p id="client_name" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="seller_name"><small>Seller:</small></label>
              <p id="seller_name" class="form-control form-control-sm"></p>
            </div>
          </div>
          <div class="col border-right">
            <div class="form-group">
              <label for="total_items"><small>Total Items:</small></label>
              <p id="total_items" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="total"><small>Total:</small></label>
              <p id="total" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="discount"><small>Discount:</small></label>
              <p id="discount" class="form-control form-control-sm"></p>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="total_payable"><small>Total Payable:</small></label>
              <p id="total_payable" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="paid_amount"><small>Paid Amount:</small></label>
              <p id="paid_amount" class="form-control form-control-sm"></p>
            </div>
            <div class="form-group">
              <label for="change"><small>Change:</small></label>
              <p id="change" class="form-control form-control-sm"></p>
            </div>
          </div>
        </div>
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
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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

  <script src="<?php echo base_url() ?>public/js/sales_details.js"></script>

  <!-- Custom js for this page -->
  <script src="<?php echo base_url() ?>public/js/update_detail.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>

  <script type="text/JavaScript">
    $('#user_sales_table').DataTable();
  </script>