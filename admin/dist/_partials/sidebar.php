<aside class="main-sidebar sidebar-dark-primary elevation-4">


  <?php
  $admin_id = $_SESSION['admin_id'];
  $ret = "SELECT * FROM  iB_admin  WHERE admin_id = ? ";
  $stmt = $mysqli->prepare($ret);
  $stmt->bind_param('i', $admin_id);
  $stmt->execute(); //ok
  $res = $stmt->get_result();
  while ($row = $res->fetch_object()) {

    if ($row->profile_pic == '') {
      $profile_picture = "<img src='dist/img/user_icon.png' class='img-circle elevation-2' alt='User Image'>
                ";
    } else {
      $profile_picture = "<img src='dist/img/$row->profile_pic' class='img-circle elevation-2' alt='User Image'>
                ";
    }


    $ret = "SELECT * FROM `iB_SystemSettings` ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($sys = $res->fetch_object()) {
  ?>


      <a href="pages_dashboard.php" class="brand-link">
        <img src="dist/img/<?php echo $sys->sys_logo; ?>" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $sys->sys_name; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php echo $profile_picture; ?>
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $row->name; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview">
              <a href="pages_dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="pages_account.php" class="nav-link">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>
                  Account
                </p>
              </a>
            </li>

            <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                   Staff
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_add_staff.php" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Add Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_staff.php" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i>
                    <p>Manage Staff</p>
                  </a>
                </li>
              </ul>
            </li> -->

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                   BVN
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_add_client.php" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Generate BVN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_clients.php" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i>
                    <p>View/Manage BVN</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./ Clients -->

           


            <li class="nav-header">Advanced Modules</li>


            <!--Password Resets-->
            <li class="nav-item">
              <a href="pages_system_settings.php" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  System Settings
                </p>
              </a>
            </li>
            <!-- ./ Password Resets-->

            <!-- Log Out -->
            <li class="nav-item">
              <a href="pages_logout.php" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
            <!-- ./Log Out -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
</aside>
<?php
    }
  } ?>