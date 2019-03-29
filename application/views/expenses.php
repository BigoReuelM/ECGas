

<!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Expenses Monitoring</h1>
        <p class="mb-4">Expenses Monitoring: <strong>View</strong> reports and <strong>Add</strong> expenses.</p>
      </div>
      <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#expenses_add_modal">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Add Expenses
      </button>
    </div>

        

    <!-- DataTales Example -->
    <div class="row">

      <div class="col-3">
      </div>
      
      <div class="col-9">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Activity Logs</h6>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm" width="100%" cellspacing="0" id="expenses_table">
              <thead class="thead-dark">
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Date Recorded</th>
                  <th>Recorder</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($expenses as $expense): ?>
                  <tr>
                    <td><?php echo $expense['expense_name'] ?></td>
                    <td><?php echo $expense['expense_description'] ?></td>
                    <td><?php echo $expense['expense_amount'] ?></td>
                    <td><?php echo $expense['expense_date'] ?></td>
                    <td><?php echo $expense['recorder'] ?></td>
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

<div class="modal fade" id="expenses_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>ADD</strong> new Expenses!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form type="POST" action="<?php echo base_url('pages/addExpenses') ?>" id="add_expenses_form" autocomplete="off">
          
          <div class="form-group row">
            <label for="expense_name" class="col-3 col-form-label col-form-label-sm"><small>Expenses Name:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="text" class="form-control form-control-sm" id="expense_name" name="expense_name" placeholder="expenses name..." valrequired="true" elementname="Expenses Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="expense_description"class="col-3 col-form-label col-form-label-sm"><small>Description:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <textarea name="expense_description" id="expense_description" rows="3" class="form-control form-control-sm" valrequired="true" elementname="Expenses Description" style="resize: none"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="expense_amount" class="col-3 col-form-label col-form-label-sm"><small>Amount:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="number" min="0" step="0.01" class="form-control form-control-sm" id="expense_amount" name="expense_amount" valrequired="true" elementname="Expenses Amount">
            </div>
          </div>
          <div class="form-group row">
            <label for="expense_date" class="col-3 col-form-label col-form-label-sm"><small>Expense Date:<span class="required_sign">*</span></small></label>
            <div class="col-9">
              <input type="date" class="form-control form-control-sm" id="expense_date" name="expense_date" valrequired="true" elementname="Expenses Date">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_expenses_form" type="submit" class="btn btn-primary btn-sm">Add Expenses</button>
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

  <!-- Custom js for this page -->
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>

  <script type="text/JavaScript">
    $(document).ready(function(){
      $('#expenses_table').DataTable();

      $(document).on('submit', '#add_expenses_form', function(e){
        e.preventDefault();

        if (validateRequired($(this).attr('id'))) {
          $.post($(this).attr('action'), $(this).serialize()).done(function(){
            window.location.reload();
          })
        }
      });

    });
  </script>