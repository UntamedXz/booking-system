<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand me-0" href="https://www.facebook.com/rgpresort" target="_blank">
        <span class="ms-1 font-weight-bold text-white">Strike RGP Resort</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-4">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'dashboard.php' ? 'active bg-gradient-dark ':'' ?>" href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if($_SESSION['role'] == 'ADMIN'): ?>
          <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">User Section</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'clients.php' ? 'active bg-gradient-dark ':'' ?> text-white " href="clients.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">remove_red_eye</i>
            </div>
            <span class="nav-link-text ms-1">View Clients</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'add-staff.php' ? 'active bg-gradient-dark ':'' ?> text-white " href="add-staff.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group_add</i>
            </div>
            <span class="nav-link-text ms-1">Add Staff</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'users.php' ? 'active bg-gradient-dark ':'' ?> text-white " href="users.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group_add</i>
            </div>
            <span class="nav-link-text ms-1">View Staff</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'category.php' ? 'active bg-gradient-dark':'' ?> text-white " href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'view-category.php' ? 'active bg-gradient-dark ':'' ?> text-white " href="view-category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">remove_red_eye</i>
            </div>
            <span class="nav-link-text ms-1">View Category</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Room Section</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'add-room.php' ? 'active bg-gradient-dark ':'' ?> text-white " href="add-room.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">control_point</i>
            </div>
            <span class="nav-link-text ms-1">Add Room</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page == 'view-room.php' ? 'active bg-gradient-dark':'' ?> text-white " href="view-room.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">store_mall_directory</i>
            </div>
            <span class="nav-link-text ms-1">View Rooms</span>
          </a>
        </li>
        <?php endif; ?>
        <li class="nav-item mt-4">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Revenue's Section</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'reservations.php' ? 'active bg-gradient-dark ':'' ?>" href="reservations.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">remove_red_eye</i>
            </div>
            <span class="nav-link-text ms-1">Reservations</span>
          </a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == 'inquiries.php' ? 'active bg-gradient-dark ':'' ?> " href="inquiries.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">chat</i>
            </div>
            <span class="nav-link-text ms-1">Inquiries</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>