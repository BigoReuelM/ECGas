

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- header --> 
    <h1 class="h3 mb-2 text-gray-800">Admin Settings</h1>
    <p>Admin Settings: <strong>Add or Delete</strong> project types, payment methods or product and customer issues.</p>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Product Categories</h6>
              <button class="btn btn-sm" data-toggle="modal" data-target="#project_type_add_modal">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php foreach ($product_categories as $category): ?>
                <li class="list-group-item">
                  <form action="<?php echo base_url('admin/deleteProductCategory') ?>" class="category_delete_form">
                    <input type="text" name="product_category_id" value="<?php echo $category['product_category_id'] ?>" hidden>
                    <div class="row justify-content-between">
                      <p><?php echo $category['product_category'] ?></p>
                      <span data-toggle="tooltip" title="Delete Category">
                        <button type="submit" class="btn btn-sm btn-circle btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </span>
                    </div>
                  </form>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Payment Methods</h6>
              <button class="btn btn-sm" data-toggle="modal" data-target="#payment_method_add_modal">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php foreach ($payment_methods as $method): ?>
                <li class="list-group-item">
                  <form action="<?php echo base_url('admin/deletePaymentMethod') ?>" class="method_delete_form" >
                    <input type="text" name="payment_method_id" value="<?php echo $method['payment_method_id'] ?>" hidden>
                    <div class="row justify-content-between">
                      <p><?php echo $method['payment_method'] ?></p>
                      <span data-toggle="tooltip" title="Delete Method">
                        <button type="submit" class="btn btn-sm btn-circle btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </span>
                    </div>
                  </form>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Product/Customer Issues</h6>
              <button class="btn btn-sm" data-toggle="modal" data-target="#issues_add_modal">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php foreach ($issues as $issue): ?>
                <li class="list-group-item">
                  <form action="<?php echo base_url('admin/deleteIssue') ?>" class="issue_delete_form">
                    <input type="text" name="issue_id" value="<?php echo $issue['issue_id'] ?>" hidden>
                    <div class="row justify-content-between">
                      <p><?php echo $issue['issue'] ?></p>
                      <span data-toggle="tooltip" title="Delete Issue">
                        <button type="submit" class="btn btn-sm btn-circle btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      </span>
                    </div> 
                  </form>   
                </li>
              <?php endforeach ?>
            </ul>
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
<!-- add project type -->
<div class="modal fade" id="project_type_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>ADD</strong> product type!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addProductCategory') ?>" id="add_product_category_form">
          <div class="form-group">
            <label for="product_category">Product Category:<span class="required_sign">*</span></label>
            <input type="text" name="product_category" id="product_category" class="form-control" valrequired="true" elementname="Product Category">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_product_category_form" type="submit" class="btn btn-primary btn-sm">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- add payment method -->
<div class="modal fade" id="payment_method_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>ADD</strong> payment method!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addPaymentMethod') ?>" id="add_payment_method_form">
          <div class="form-group">
            <label for="payment_method">Payment Method:<span class="required_sign">*</span></label>
            <input type="text" name="payment_method" id="payment_method" class="form-control" valrequired="true" elementname="Payment Method">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_payment_method_form" type="submit" class="btn btn-primary btn-sm">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- add issues --> 
<div class="modal fade" id="issues_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>ADD</strong> new product/customer issue!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/addIssue') ?>" id="add_issue_form">
          <div class="form-group">
            <label for="issue">Issue:<span class="required_sign">*</span></label>
            <input type="text" name="issue" id="issue" class="form-control" valrequired="true" elementname="Issue">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button form="add_issue_form" type="submit" class="btn btn-primary btn-sm">Add</button>
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

  <script src="<?php echo base_url() ?>public/js/settings.js"></script>
  <script src="<?php echo base_url() ?>public/js/validation.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>