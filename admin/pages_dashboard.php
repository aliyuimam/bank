<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$admin_id = $_SESSION['admin_id'];


$result = "SELECT count(*) FROM iB_admin";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($iBClients);
$stmt->fetch();
$stmt->close();


$result = "SELECT count(*) FROM ib_clients";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($iBStaffs);
$stmt->fetch();
$stmt->close();



?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

  <div class="wrapper">
    <!-- Navbar -->
    <?php include("dist/_partials/nav.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("dist/_partials/sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">

            <!-- ./ iBank Clients -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Administrators</span>
                  <span class="info-box-number">
                   <?php

                                            $sql = "SELECT count(*) FROM ib_admin"; 
                                            $result = $mysqli->query($sql); 
                                            while($row = mysqli_fetch_array($result)) { 
                                                echo $row['count(*)']; 
                                            } 
                                        ?>
                  </span>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Clients</span>
                  <span class="info-box-number">
                  <?php

                                            $sql = "SELECT count(*) FROM ib_clients"; 
                                            $result = $mysqli->query($sql); 
                                            while($row = mysqli_fetch_array($result)) { 
                                                echo $row['count(*)']; 
                                            } 
                                        ?>
                  </span>
                </div>
              </div>
            </div>
           



            <div class="clearfix hidden-md-up"></div>


            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-random"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Approved</span>
                  <span class="info-box-number"> <?php echo $iBClients; ?></span>
                </div>
              </div>
            </div>


            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">BVN Generated</span>
                  <span class="info-box-number"><?php echo $iBClients; ?></span>
                </div>
              </div>
            </div>


          </div>

         
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              
            </div>
          </div>



          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest BVN Generated</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped m-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NIN</th>
                          <th>BVN</th>
                          <th>NAME</th>
                          <th>DATE CREATED</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Get latest transactions 
                        $ret = "SELECT * FROM `iB_clients` LIMIT 2";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        $cnt = 1;
                        while ($row = $res->fetch_object()) {?>
                         
                        
                          <tr>
                            <td><?php echo $cnt++; ?></a></td>
                            <td><?php echo $row->nin; ?></td>
                            <td><?php echo $row->bvnnumber; ?></td>
                            <td><?php echo $row->firstname." ";  echo $row->surname." "; echo $row->middlename;?></td>
                            <td><?php echo $row->timestamp; ?></td>
                          </tr>

                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer clearfix">
                  <a href="pages_manage_clients.php" class="btn btn-sm btn-info float-left">View All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include("dist/_partials/footer.php"); ?>

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>

  <!--Load Canvas JS -->
  <script src="plugins/canvasjs.min.js"></script>
  <!--Load Few Charts-->
  

</body>

</html>