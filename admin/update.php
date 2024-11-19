<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$admin_id = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <?php include("dist/_partials/nav.php"); ?>
        <?php include("dist/_partials/sidebar.php"); ?>
        <div class="content-wrapper">
            <?php
            $client_number = $_GET['client_number'];
            $ret = "SELECT * FROM  iB_clients  WHERE client_number = ? ";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('s', $client_number);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
                if ($row->profile_pic == '') {
                    $profile_picture = "

                        <img class='img-fluid'
                        src='dist/img/user_icon.png'
                        alt='User profile picture'>

                        ";
                } else {
                    $profile_picture = "

                        <img class=' img-fluid'
                        src='dist/img/$row->profile_pic'
                        alt='User profile picture'>

                        ";
                }


            ?>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#update_Profile" data-toggle="tab">Profile</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- / Update Profile -->
                                            <div class="tab-pane active" id="update_Profile">
                                                <form method="post" action="update.php" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="firstname" required class="form-control" value="<?php echo $row->firstname; ?>" id="inputName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="email" required value="<?php echo $row->email; ?>" class="form-control" id="inputEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Contact</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required name="contact" value="<?php echo $row->contact; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">National ID Number</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required readonly name="national_id" value="<?php echo $row->nin; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">BVN Number</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required readonly name="national_id" value="<?php echo $row->bvnnumber; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required name="address" value="<?php echo $row->address; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <a type="submit" name="update" class="btn btn-outline-success" href="updator.php?client_number=<?php echo $row->client_number; ?>">Update</a>
                                                            <a type="submit" name="" class="btn btn-outline-success" href="pages_manage_clients.php">Back>>></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            <?php } ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("dist/_partials/footer.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>