
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
        <div class="sidebar-brand-text mx-3">Store Helper</div>
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

      <!-- Nav Item - sales -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pages/sales') ?>">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Sales</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Products</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('pages/allProducts') ?>">All Products</a>
            <a class="collapse-item" href="<?php echo base_url('pages/inventory') ?>">Inventory</a>
            <a class="collapse-item" href="<?php echo base_url('pages/issues') ?>">Issues</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - clients -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pages/clients') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Clients</span></a>
      </li>

      <?php if ($_SESSION['user_details']['user_type'] == 'admin'): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Admin Control
        </div>

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
                <a class="dropdown-item" href="<?php echo base_url('user/logout') ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->