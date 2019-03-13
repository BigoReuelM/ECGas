

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Clients Management</h1>
              <p class="mb-4">Clients management: <strong>Add, Delete or Activate and Deactivate</strong> a Client.</p>
            </div>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#client_add_modal">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add Client
            </button>
          </div>

          <div class="row">
            <!-- total number of clients -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $clients_count;  ?></div>
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
            <!-- active clients -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $active_clients_count;  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-on fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- inactive clients -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Inactivated Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $inactive_clients_count; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-off fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Table of active clients -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Active Clients Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center clients_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($active_clients as $active_client): ?>
                    <tr>
                      <td class="client_name"><?php echo $active_client['name'] ?></td>
                      <td><?php echo $active_client['client_contact'] ?></td>
                      <td><?php echo $active_client['client_address'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <form method="POST" action="<?php echo base_url('pages/setCustomerID') ?>">
                            <input type="text" name="client_id" value="<?php echo $active_client['client_id'] ?>" hidden>
                            <button type="submit" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" title="View client details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <span data-toggle="tooltip" data-placement="top" title="Product Alert Settings">
                            <button type="button" class="btn btn-success btn-circle btn-sm product_alerts_btn" value="<?php echo $active_client['client_id'] . ',' . base_url('pages/getCustomerAlertSettings') ?>" data-toggle="modal" data-target="#product_alerts_modal">
                              <i class="fas fa-bell"></i>
                            </button>
                          </span>
                          <span data-toggle="tooltip" data-placement="top" title="Deactivate">
                            <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $active_client['client_id'] ?>,deactivate" data-toggle="modal" data-target="#update_status_modal">
                              <i class="fas fa-toggle-off"></i>
                            </button>
                          </span>
                          <span data-toggle="tooltip" title="Delete Client">
                            <button class="btn btn-danger btn-circle btn-sm delete_btn" value="<?php echo $active_client['client_id'] ?>" data-toggle="modal" data-target="#client_delete_modal">
                              <i class="fa fa-trash"></i>
                            </button>
                          </span>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Table of products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Active Clients Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center clients_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($inactive_clients as $inactive_client): ?>
                    <tr>
                      <td class="client_name"><?php echo $inactive_client['name'] ?></td>
                      <td><?php echo $inactive_client['client_contact'] ?></td>
                      <td><?php echo $inactive_client['client_address'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <form method="POST" action="<?php echo base_url('pages/setCustomerID') ?>">
                            <input type="text" name="client_id" value="<?php echo $inactive_client['client_id'] ?>" hidden>
                            <button type="submit" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" title="View client details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <span data-toggle="tooltip" data-placement="top" title="Activate">
                            <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $inactive_client['client_id'] ?>,activate" data-toggle="modal" data-target="#update_status_modal">
                              <i class="fas fa-toggle-on"></i>
                            </button>
                          </span>
                          <span data-toggle="tooltip" title="Delete Client">
                            <button class="btn btn-danger btn-circle btn-sm delete_btn" value="<?php echo $inactive_client['client_id'] ?>" data-toggle="modal" data-target="#client_delete_modal">
                              <i class="fa fa-trash"></i>
                            </button>
                          </span>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal for adding users-->
<div class="modal fade" id="client_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>ADD</strong> new client!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="message">
          
        </div>
        <form type="POST" action="<?php echo base_url('pages/addClient') ?>" id="add_client_form" autocomplete="off">
          
          <div class="form-group row">
            <label for="client_first_name" class="col-3 col-form-label col-form-label-sm"><small>First Name:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="text" class="form-control form-control-sm" id="client_first_name" name="client_first_name" placeholder="first name..." valrequired="true" elementname="First Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="client_middle_name" class="col-3 col-form-label col-form-label-sm"><small>Middle Name:</small></label>
            <div class="col-9">
              <input type="text" class="form-control form-control-sm" id="client_middle_name" name="client_middle_name" placeholder="middle name optional..." valrequired="false">
            </div>
          </div>
          <div class="form-group row">
            <label for="client_last_name" class="col-3 col-form-label col-form-label-sm"><small>Last Name:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="text" class="form-control form-control-sm" id="client_last_name" name="client_last_name" placeholder="last name..." valrequired = "true" elementname="Last Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="client_contact" class="col-3 col-form-label col-form-label-sm"><small>Contact No.:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="text" class="form-control form-control-sm" id="client_contact" name="client_contact" placeholder="contact number..." valrequired="true" elementname="Contact Number">
            </div>
          </div>
          <div class="form-group row">
            <label for="client_address"class="col-3 col-form-label col-form-label-sm"><small>Address:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <textarea name="client_address" id="client_address" rows="3" class="form-control form-control-sm" valrequired="true" elementname="Address" style="resize: none"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_client_form" type="submit" class="btn btn-primary btn-sm">Add Client</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for delete users-->
<div class="modal fade" id="client_delete_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Delete</strong> Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="delete_message">
          
        </div>
        <div class="text-center alert alert-danger">
          <p class="text-danger">Delete this Client?</p>
          <p><strong id="client_name"></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('pages/deleteClient') ?>" id="delete_client_form">
          <input type="text" id="client_id" name="client_id" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="delete_client_form" type="submit" class="btn btn-primary btn-sm">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal for activate or deactivate client-->
<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning"><strong class="status_action"></strong> Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="status_message">
          
        </div>
        <div class="text-center alert alert-warning">
          <p class="text-warning"><strong class="status_action"></strong> this Client?</p>
          <p><strong id="status_client_name"></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('pages/updateClientStatus') ?>" id="status_update_form">
          <input type="text" id="status_client_id" name="status_client_id" hidden>
          <input type="text" id="update_action" name="update_action" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="status_update_form" type="submit" class="btn btn-warning btn-sm">Confirm</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal for product alerts of client-->
<div class="modal fade" id="product_alerts_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong class="status_action">Product Alert Settings</strong> of Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('pages/addProductAlert') ?>" id="product_alert_form">
          <input type="text" name="client_id" id="alert_client_id" hidden>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="product_id"><small>Product:</small><span class="required_sign">*</span></label>
                <select name="product_id" id="product_id" class="form-control form-control-sm" valrequired="true" elementname="Product">
                  <option selected hidden disabled>Choose Product</option>
                  <?php foreach ($active_products as $product): ?>
                    <option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_title'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="days_of_use"><small>Days till next order:</small><span class="required_sign">*</span></label>
                <input type="text" class="form-control form-control-sm" name="days_of_ussage" id="days_of_ussage" valrequired="true" elementname="Day till next order">
              </div>
            </div>
          </div>
        </form>
        <div class="row border-top">
          <div class="col">
            <table class="mt-2 table table-bordered table-striped table-sm" id="product_alert_table" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>Product name</th>
                  <th>Days till next order</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="product_alert_form" type="submit" class="btn btn-primary btn-sm">Confirm</button>
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


  <script src="<?php echo base_url() ?>public/js/client.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  <script class="text/JavaScript">
    
    $('.clients_table').DataTable();
    $('#product_alert_table').DataTable({
      'info': false,
      'paging': false,
      'searching': false
    });
  </script>