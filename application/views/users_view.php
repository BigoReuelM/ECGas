
      <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Users Management</h1>
              <p>User management: <strong>ADD, EDIT, DELETE and ACTIVATE or DEACTIVATE</strong> a user of this web application.</p>
            </div>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#user_add_modal">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add User
            </button>
          </div>

          <div class="row">
            <!-- total number of users -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_count ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- user type counts -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <p class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin Users: <span class="mb-0 font-weight-bold text-gray-800"><?php echo $admin_users_count ?></span></p>
                      <p class="text-xs font-weight-bold text-info text-uppercase mb-1">Employees: <span class="mb-0 font-weight-bold text-gray-800"><?php echo $employee_users_count ?></span></p>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- active users -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $active_users_count ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-on fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- inactive users -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Inactivated Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $inactive_users_count ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-toggle-off fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Active Users Table</h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center user_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact No.</th>
                    <th>Account Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($active_users as $active_user): ?>
                    <tr>
                      <td class="first_name"><?php echo $active_user['first_name'] ?></td>
                      <td class="middle_name"><?php echo $active_user['middle_name'] ?></td>
                      <td class="last_name"><?php echo $active_user['last_name'] ?></td>
                      <td><?php echo $active_user['contact'] ?></td>
                      <td><?php echo $active_user['status'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <div class="btn-group">
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                              <form action="<?php echo base_url('admin/setSelectedUserId') ?>" method="POST">
                                <button type="submit" name="user_id" class="btn btn-success btn-circle btn-sm edit_btn" value="<?php echo $active_user['user_id'] ?>">
                                  <i class="fa fa-pen"></i>
                                </button>
                              </form>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Deactivate">
                              <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $active_user['user_id'] ?>,deactivate" data-toggle="modal" data-target="#update_status_modal">
                                <i class="fas fa-toggle-off"></i>
                              </button>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                              <button type="button" class="btn btn-danger btn-circle btn-sm delete_btn" value="<?php echo $active_user['user_id'] ?>" data-toggle="modal" data-target="#user_delete_modal">
                                <i class="fa fa-trash"></i>
                              </button>
                            </span>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Inactive Users Table</h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center user_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact No.</th>
                    <th>Account Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($inactive_users as $inactive_user): ?>
                    <tr>
                      <td class="first_name"><?php echo $inactive_user['first_name'] ?></td>
                      <td class="middle_name"><?php echo $inactive_user['middle_name'] ?></td>
                      <td class="last_name"><?php echo $inactive_user['last_name'] ?></td>
                      <td><?php echo $inactive_user['contact'] ?></td>
                      <td><?php echo $inactive_user['status'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <div class="btn-group">
                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                              <form action="<?php echo base_url('admin/setSelectedUserId') ?>" method="POST">
                                <button type="submit" name="user_id" class="btn btn-success btn-circle btn-sm edit_btn" value="<?php echo $inactive_user['user_id'] ?>">
                                  <i class="fa fa-pen"></i>
                                </button>
                              </form>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Activate">
                              <button type="button" class="btn btn-warning btn-circle btn-sm update_status_btn" value="<?php echo $inactive_user['user_id'] ?>,activate" data-toggle="modal" data-target="#update_status_modal">
                                <i class="fas fa-toggle-on"></i>
                              </button>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                              <button type="button" class="btn btn-danger btn-circle btn-sm delete_btn" value="<?php echo $inactive_user['user_id'] ?>" data-toggle="modal" data-target="#user_delete_modal">
                                <i class="fa fa-trash"></i>
                              </button>
                            </span>
                          </div>
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
<div class="modal fade" id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>ADD</strong> new user!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="message">
          
        </div>
        <form type="POST" action="<?php echo base_url('admin/addUser') ?>" id="add_user_form" autocomplete="off">
          <label for="name_input"><small>Enter Full Name:<span class="required_sign">*</span></small></label>
          <div id="name_input" class="row justify-content-center">
            <div class="col">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="first name..." valrequired="true" elementname="First Name">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" id="middle_name" name="middle_name" placeholder="middle name optional..." valrequired="false">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="last name..." valrequired = "true" elementname="Last Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="user_type"><small>User Type:<span class="required_sign">*</span></small></label>
                <select name="user_type" id="user_type" class="form-control form-control-sm" valrequired="true" elementname="User Type">
                  <option disabled selected hidden>choose user type..</option>
                  <option value="admin">Admin</option>
                  <option value="employee">Employee</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="gender"><small>Gender:<span class="required_sign">*</span></small></label>
                <select name="gender" id="gender" class="form-control form-control-sm" valrequired="true" elementname="Gender">
                  <option disabled selected hidden>choose gender..</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="contact"><small>Contact No.:<span class="required_sign">*</span></small></label>
                <input type="text" class="form-control form-control-sm" id="contact" name="contact" placeholder="contact number..." valrequired="true" elementname="Contact Number">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="Username"><small>Username:<span class="required_sign">*</span></small></label>
                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="username..." valrequired="true" elementname="User Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="address"><small>Address:<span class="required_sign">*</span></small></label>
                <textarea name="address" id="address" rows="4" class="form-control form-control-sm" valrequired="true" elementname="Address" style="resize: none"></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="password_initial"><small>Password:<span class="required_sign">*</span></small></label>
                <input type="password" class="form-control form-control-sm" id="password_initial" name="password_initial" placeholder="password..." valrequired="true" elementname="Initial Password">
              </div>
              <div class="form-group">
                <label for="password"><small>Confirm Password:<span class="required_sign">*</span></small></label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="confirm password..." valrequired="true" elementname="Password">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_user_form" type="submit" class="btn btn-primary btn-sm">Add User</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for delete users-->
<div class="modal fade" id="user_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Delete</strong> User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="delete_message">
          
        </div>
        <div class="text-center alert alert-danger">
          <p class="text-danger">Delete this user?</p>
          <p><strong id="user_name"></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('admin/deleteUser') ?>" id="delete_user_form">
          <input type="text" id="user_id" name="user_id" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="delete_user_form" type="submit" class="btn btn-danger btn-sm">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for activate or deactivate account users-->
<div class="modal fade" id="update_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning"><strong class="status_action"></strong> User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="status_message">
          
        </div>
        <div class="text-center alert alert-warning">
          <p class="text-warning"><strong class="status_action"></strong> this user?</p>
          <p><strong id="status_user_name"></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('admin/updateUserStatus') ?>" id="status_update_form">
          <input type="text" id="status_user_id" name="status_user_id" hidden>
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

  <script src="<?php echo base_url() ?>public/js/users.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>