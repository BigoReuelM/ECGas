

<!-- Begin Page Content -->
        <div class="container-fluid">

          <span data-toggle="tooltip" data-placement="top" title="Back to Users List">
            <a type="button" class="btn mb-3" href="<?php echo base_url('pages/clients') ?>">
              <i class="fas fa fa-angle-double-left"></i>
              Back
            </a>
          </span>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
              <h1 class="h3 mb-2 text-gray-800">Client Details</h1>
              <p class="mb-4">Client Details is where the admin can <strong>EDIT</strong> details of a Client and view <strong>REPORT</strong> purchase of this client.</p>
            </div>
            <div>
              <span data-toggle="tooltip" title="Delete Client">
                <button class="btn btn-danger btn-sm" id="delete_btn" data-toggle="modal" data-target="#client_delete_modal">
                  <i class="fa fa-trash"></i>
                  DELETE Client
                </button>
              </span>
            </div>
          </div>

          

          <!-- DataTales Example -->
          <div class="row">
            
            <div class="col-9">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Purchase Logs</h6>
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
                    </table>

                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card shadow mb-2">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Date Added:</h6>
                </div>
                <div class="card-body">
                  <p class="form-control-sm text-center"><?php echo $client_details['formated_registration_date'] ?></p>
                </div>
                <div class="card-footer">
                  
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Client Details</h6>
                </div>
                <div class="card-body" id="details_container">
                  <div class="form-group">
                    <label for="client_first_name"><small>First Name:</small></label>
                    <input type="text" class="form-control detail form-control-sm" id="client_first_name" name="client_first_name" placeholder="<?php echo $client_details['client_first_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="client_middle_name"><small>Middle Name:</small></label>
                    <input type="text" class="form-control detail form-control-sm" id="client_middle_name" name="client_middle_name" placeholder="<?php echo $client_details['client_middle_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="client_last_name"><small>Last Name:</small></label>
                    <input type="text" class="form-control detail form-control-sm" id="client_last_name" name="client_last_name" placeholder="<?php echo $client_details['client_last_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="client_contact"><small>Contact Number:</small></label>
                    <input type="text" id="client_contact" name="client_contact" class="form-control detail form-control-sm" placeholder="<?php echo $client_details['client_contact'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="client_address"><small>Address:</small></label>
                    <textarea name="client_address" id="client_address" class="form-control detail form-control-sm"" rows="3" style="resize: none" placeholder="<?php echo $client_details['client_address'] ?>"></textarea>
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
          <p><strong id="client_name"><?php echo $client_details['client_first_name'] . " " . $client_details['client_middle_name'] . " " . $client_details['client_last_name'] ?></strong></p>
        </div>
        <form method="POST" action="<?php echo base_url('pages/deleteClient') ?>" id="delete_client_form_from_details">
          <input type="text" id="url" value="<?php echo base_url('pages/clients') ?>" hidden>
          <input type="text" name="client_id" value="<?php echo $client_details['client_id'] ?>" hidden>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="delete_client_form_from_details" type="submit" class="btn btn-primary btn-sm">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>UPDATE</strong> Client Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Confirm Inputs.</p>
        <input type="text" name="client_id" value="<?php echo $client_details['client_id'] ?>" form="detail_update_form" hidden>
        <form method="POST" action="<?php echo base_url('pages/updateClientDetails') ?>" id="detail_update_form">
          
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

  <script src="<?php echo base_url() ?>public/js/client.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>