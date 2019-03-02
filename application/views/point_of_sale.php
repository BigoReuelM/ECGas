

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <a href="<?php echo base_url('pages') ?>" class="btn">
      <i class="fa fa-angle-double-left"></i>
      Back
    </a>
    
    <div class="row">
      <div class="col-5">
        <div class="card shadow my-2 pos_cart_container">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col text-center">
                    <h3>Shop Helper</h3>
                    <p>Date/Time: <span id="dateTime"></span></p>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col">
                    <div class="cart_table_container">
                      <table class="table" width="100%">
                        <thead class="thead-dark">
                          <tr>
                            <th>Action</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
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
                <hr/>
                <div class="row">
                  <div class="col">
                    <div class="row justify-content-between">
                      <div class="col">
                        <p><small>Total Item:</small></p>
                      </div>
                      <div class="col">
                        <p>2</p>
                      </div>
                      <div class="col">
                        <p><small>Total:</small></p>
                      </div>
                      <div class="col">
                        <p>200</p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col">
                    <div class="row justify-content-between">
                      <div class="col">
                        <p><small>Discount:</small></p>
                      </div>
                      <div class="col">
                        <p>2</p>
                      </div>
                      <div class="col">
                        <p><small>Total Payment:</small></p>
                      </div>
                      <div class="col">
                        <p>200</p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col">
                    <span data-toggle="tooltip" title="Cancel Current Cart">
                      <button class="btn btn-danger btn-sm float-left" data-toggle="modal" data-target="#cancel_sale_modal">
                        Cancel
                      </button>
                    </span>
                    <button class="btn btn-success btn-sm float-right">
                      Payment
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-7">
        <div class="card my-2 shadow pos_products_container">
          <div class="card-body">

            <?php  
              $col_count = 0;
              for ($i=0; $i < count($products); $i++) {

                if ($col_count == 0){
                  echo '<div class="row mb-2">';
                } 
            ?>
              <div class="col-3">
                <div class="card">
                  <img src="<?php echo $products[$i]['product_image_url'] ?>" class="card-img-top" alt="product_image" data-toggle="tooltip" title="<?php echo $products[$i]['product_title'] ?>">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item pos_product_title"><?php echo $products[$i]['product_title'] ?></li>
                    <li class="list-group-item pos_product_price"><small>Price: </small><strong>Php <?php echo $products[$i]['product_price'] ?></strong></li>
                    <li class="list-group-item pos_product_quantity"><small>Current Inventory: </small><strong><?php echo $products[$i]['product_quantity'] ?></strong></li>
                    <li class="list-group-item pos_product_quantity">
                      <button type="botton" class="btn btn-primary btn-block btn-sm add_cart_btn" value="<?php echo $products[$i]['product_id'] . ',' . $products[$i]['product_price'] . ',' . $products[$i]['product_title'] ?>">
                        <i class="fa fa-plus"></i>
                        Add to Cart
                      </button>
                    </li>
                  </ul>
                </div>
              </div>
            <?php
                $col_count++;
                if ($col_count == 4 || ($i+1) == count($products)) {
                  echo '</div>';
                  $col_count = 0;
                }

              }
            ?>
            
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
<div class="modal fade" id="cancel_sale_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><strong>Warning</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="text-danger">Cancel this transaction?</p>
        <p class="text-danger">Agreeing will remove all progress!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cancel_sale_btn">Agree</button>
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

  <script src="<?php echo base_url() ?>public/js/point_of_sale.js"></script>
  <script src="<?php echo base_url() ?>public/js/custom.js"></script>
</div>
</div>
</div>
</doby>