
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php if ($_SESSION['sidebarControl'] == 1): ?>
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php endif ?>
    <?php if ($_SESSION['sidebarControl'] == 0): ?>
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <?php endif ?>

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('pages') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ECGas</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pages') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - pos -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pages/pointOfSale') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>POS</span></a>
      </li>


      

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productscollapseUtilities" aria-expanded="true" aria-controls="productscollapseUtilities">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Products</span>
        </a>
        <div id="productscollapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('pages/allProducts') ?>">All Products</a>
            <a class="collapse-item" href="<?php echo base_url('pages/inventory') ?>">Inventory</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - clients -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pages/clients') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Clients</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Records</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('pages/sales') ?>">Sales</a>
            <a class="collapse-item" href="<?php echo base_url('pages/expenses') ?>">Expenses</a>
            <a class="collapse-item" href="<?php echo base_url('pages/returnsAndRefunds') ?>">Returns/Refund</a>
            <a class="collapse-item" href="<?php echo base_url('pages/issues') ?>">Issues</a>
          </div>
        </div>
      </li>

      

      <?php if ($_SESSION['user_details']['user_type'] == 'admin'): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Admin Control
        </div>

        <!-- Nav item admin settings -->

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/settings') ?>">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
          </a>
        </li>

        <!-- Nav Item - users -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
        </li>
      <?php endif ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="alert_badge">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-danger">
                      <span class="text-white" id="alert_count"></span> 
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date('F, d Y') ?></div>
                    <span class="font-weight-bold">Number of possible orders! 5 days prior..</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <span class="text-white" id="low_sku_count"></span> 
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date('F, d Y') ?></div>
                    <span class="font-weight-bold">Number of products with low inventory! Based on product SKU..</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Check Tables on Dashboard for further details!</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_details']['name'] ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url() ?>public/img/user_logo">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('user/profile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


          <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-warning">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-center">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-warning btn-sm" href="<?php echo base_url('user/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>