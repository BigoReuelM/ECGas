
      <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Users Management</h1>
              <p class="mb-4">User management is where the admin can <strong>ADD</strong>,<strong> EDIT or DELETE</strong> a user of this web application.</p>
            </div>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#user_add_modal">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add User
            </button>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="user_table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($users as $user): ?>
                      <tr>
                        <td><?php echo $user['first_name'] ?></td>
                        <td><?php echo $user['middle_name'] ?></td>
                        <td><?php echo $user['last_name'] ?></td>
                        <td>
                          <div class="row justify-content-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-pen"></i>
                              </button>
                              <button type="button" class="btn btn-info btn-circle btn-sm">
                                <i class="fa fa-eye"></i>
                              </button>
                              <button type="button" class="btn btn-danger btn-circle btn-sm delete_btn">
                                <i class="fa fa-trash"></i>
                              </button>
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

        </div>
        <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>




<!-- Modal for adding users-->
<div class="modal fade" id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new <strong>USER</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="message">
          
        </div>
        <form type="POST" action="<?php echo base_url('admin/addUser') ?>" id="add_user_form" autocomplete="off">
          <div class="form-group row">
            <label for="first_name" class="col-3 col-form-label">First Name:</label>
            <div class="col-9">
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name..." valrequired="true" elementname="First Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="middle_name" class="col-3 col-form-label">Middle Name:</label>
            <div class="col-9">
              <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="middle name..." valrequired="false">
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-3 col-form-label">Last Name:</label>
            <div class="col-9">
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name..." valrequired = "true" elementname="Last Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="user_type" class="col-3 col-form-label">User Type:</label>
            <div class="col-9">
              <select name="user_type" id="user_type" class="form-control" valrequired="true" elementname="User Type">
                <option disabled selected hidden>Choose user type..</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="Username" class="col-3 col-form-label">Username:</label>
            <div class="col-9">
              <input type="text" class="form-control" id="username" name="username" placeholder="username..." valrequired="true" elementname="User Name">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="add_user_form" type="submit" class="btn btn-primary">Add User</button>
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