

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Button for adding a new User -->
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Clients</h1>
            </div>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#client_add_modal">
              <i class="fas fa-plus fa-sm text-white-50"></i>
              Add Client
            </button>
          </div>

          <!-- Table of products -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Clients Table
              </h6>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm text-center" id="clients_table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($clients as $client): ?>
                    <tr>
                      <td class="client_name"><?php echo $client['name'] ?></td>
                      <td><?php echo $client['client_contact'] ?></td>
                      <td><?php echo $client['client_address'] ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <form method="POST" action="<?php echo base_url('pages/setCustomerID') ?>">
                            <input type="text" name="client_id" value="<?php echo $client['client_id'] ?>" hidden>
                            <button type="submit" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" title="View client details">
                              <i class="fa fa-eye"></i>
                            </button>
                          </form>
                          <span data-toggle="tooltip" title="Delete Client">
                            <button class="btn btn-danger btn-circle btn-sm delete_btn" value="<?php echo $client['client_id'] ?>" data-toggle="modal" data-target="#client_delete_modal">
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
    
    $('#clients_table').DataTable();
  </script>