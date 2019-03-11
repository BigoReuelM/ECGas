

<!-- Begin Page Content -->
    <div class="container-fluid">

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
          <h1 class="h3 mb-2 text-gray-800">Issue Monitoring</h1>
          <p>Issue Monitoring: <strong>View</strong> records and reports of product issues.</p>
        </div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#add_issue_modal">
          <i class="fas fa-plus fa-sm text-white-50"></i>
          Record Issue
        </button>
      </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Issue Records Table</h6>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-sm text-center" id="issue_record_table" width="100%" cellspacing="0">
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
              <tr>
                <td></td>
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

    </div>
    <!-- /.container-fluid -->


        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



<!-- Modal for adding users-->
<div class="modal fade" id="add_issue_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Record</strong> issue!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="record_issue_form">
          <div class="form-group row">
            <label for="product" class="col-form-label col-form-label-sm col-3">Product<span class="required_sign">*</span></label>
            <div class="col-9">
              <select name="product" id="product" class="form-control form-control-sm">
                <option selected disabled hidden>Choose Product...</option>
                <?php foreach ($products as $product): ?>
                  <option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_title'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="client" class="col-form-label col-form-label-sm col-3">Client</label>
            <div class="col-9">
              <select name="client" id="client" class="form-control form-control-sm">
                <option selected disabled hidden>Choose Client...</option>
                <?php foreach ($clients as $client): ?>
                  <option value="<?php echo $client['client_id'] ?>"><?php echo $client['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="issue" class="col-form-label col-form-label-sm col-3">Issue</label>
            <div class="col-9">
              <select name="issue" id="issue" class="form-control form-control-sm">
                <option selected disabled hidden>Choose Issue...</option>
                <?php foreach ($issues as $issue): ?>
                  <option value="<?php echo $issue['issue_id'] ?>"><?php echo $issue['issue'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="others_issue" class="col-form-label col-form-label-sm col-3">Others:</label>
            <div class="col-9">
              <input type="text" name="others_issue" id="others_issue" class="form-control form-control-sm">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button form="record_issue_form" type="submit" class="btn btn-sm btn-primary">Save</button>
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


  <script src="<?php echo base_url() ?>public/js/issues.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>