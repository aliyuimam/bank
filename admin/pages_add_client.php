<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$admin_id = $_SESSION['admin_id'];

if (isset($_POST['create_staff_account'])) {

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $middlename = $_POST['middlename'];
    $bvnnumber = $_POST['bvnnumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact  = $_POST['contact'];
    $nin  = $_POST['nin'];
    $maritalstatus  = $_POST['maritalstatus'];
    $email  = $_POST['email'];
    $nationality  = $_POST['nationality'];
    $stateoforigin  = $_POST['stateoforigin'];
    $lga  = $_POST['lga'];
    $stateofresidence  = $_POST['stateofresidence'];
    $address  = $_POST['address'];

    $profile_pic  = $_FILES["profile_pic"]["name"];
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "dist/img/" . $_FILES["profile_pic"]["name"]);

    $query = "INSERT INTO ib_clients (firstname,surname,middlename,bvnnumber,gender,dob,contact,nin,maritalstatus,email,nationality,stateoforigin,lga,stateofresidence,address,profile_pic) VALUES ('$firstname','$surname','$middlename','$bvnnumber','$gender','$dob','$contact','$nin','$maritalstatus','$email','$nationality','$stateoforigin','$lga','$stateofresidence','$address','$profile_pic')";
$ins=mysqli_query($mysqli,$query);

    if ($ins) {
        $success = "BVN Generated Successfully";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("dist/_partials/nav.php"); ?>
        <?php include("dist/_partials/sidebar.php"); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Generate User BVN</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="pages_add_client.php">Banking Clients</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">Fill All Fields</h3>
                                </div>
                                <!-- form start -->
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Firstname</label>
                                                <input type="text" name="firstname" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Surname</label>
                                                <input type="text" name="surname" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Middle Name</label>
                                                <input type="text" name="middlename" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client BVN Number</label>
                                                <?php
                                                $length = 9;
                                                $_Number =  substr(str_shuffle('0123456789'), 1, $length);
                                                ?>
                                                <input type="text" readonly name="bvnnumber" value="22<?php echo $_Number; ?>" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option>Select Gender</option>
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Date of Birth</label>
                                                <input type="date" name="dob" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Contact</label>
                                                <input type="text" name="contact" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client National ID No.</label>
                                                <input type="text" name="nin" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client Marital Status</label>
                                                <select class="form-control" name="maritalstatus">
                                                    <option selected disabled>Select Marital Status</option>
                                                    <option>Single</option>
                                                    <option>Married</option>         <option>Widow</option>
                                                    <option>Widower</option>
                                                    <option>Divorced</option>
                                                    <option>Separated</option>
                                                </select>
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Email</label>
                                                <input type="email" name="email" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client Nationality</label>
                                                <select class="form-control" name="nationality">
                                                    <option selected disabled>Nationality</option>
                                                    <option>Nigerian</option>
                                                </select>
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client State of Origin</label>
                                                <input type="text" name="stateoforigin" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client LGA</label>
                                                <input type="text" name="lga" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputPassword1">Client State of Residence</label>
                                                <input type="text" name="stateofresidence" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col-md-6 form-group">
                                                <label for="exampleInputEmail1">Client Address</label>
                                                <input type="text" name="address" required class="form-control" id="exampleInputEmail1">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="exampleInputFile">Client Profile Picture</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">Upload</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" name="create_staff_account" class="btn btn-success">Add Client</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>