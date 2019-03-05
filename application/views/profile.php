

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Profile</h1>
          <p class="mb-4"><strong>View</strong> and <strong>EDIT</strong> user details. Review tabular <strong>REPORT</strong> of actions done while using this web application.</p>

          <!-- DataTales Example -->
          <div class="row">
            
            <div class="col-9">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Activity Logs</h6>
                </div>
                <div class="card-body">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="report_table">
                    <thead>
                      <tr>
                        <td>Activity</td>
                        <td>Date</td>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <td>Activity</td>
                        <td>Date</td>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                      <tr>
                        <td>Sell</td>
                        <td>June 12, 2018</td>
                      </tr>
                    </tbody>
                  </table>                </div>
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
  <script src="<?php echo base_url() ?>public/js/update_detail.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>