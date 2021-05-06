<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Maturitní práce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user-photo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">Kristián Klimek</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
              <ul class="nav">
            <li class="nav-item">
                <a href="./listTasklist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seznamy úkolů</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./addTask.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Přidání úkolu</p>
                </a>
              </li>
              <?php
              if (in_array($roleName, ['ADMINISTRÁTOR'])) {
                ?>
              <li class="nav-item">
                <a href="./addUser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Přidání uživatele</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="./listUsers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Výpis uživatelů</p>
                </a>
              </li>
              <?php if (isset($_SESSION['loggedEmail'])) {?>
                <li class="nav-item">
                <a href="Login/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Odhlášení uživatele</p>
                </a>
              </li>
                    <?php
              }
                ?>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
