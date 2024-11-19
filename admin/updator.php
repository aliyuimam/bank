<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();

$admin_id = $_SESSION['admin_id'];




if (isset($_GET['update'])) {

$firstname=mysqli_real_escape_string($mysqli,$_POST['firstname']);
$email=mysqli_real_escape_string($mysqli,$_POST['email']);
$contact=mysqli_real_escape_string($mysqli,$_POST['contact']);
$address=mysqli_real_escape_string($mysqli,$_POST['address']);
$id=$_GET['client_number'];

 $sql = mysqli_query($mysqli, "UPDATE ib_clients SET firstname='$firstname', email='$email', contact='$contact', address='$address' WHERE client_number='$id'");


 if ($sql) {
 	echo "DONE";
 	header("refresh:2; url=pages_manage_clients.php");

}else{
	echo "error".mysqli_error($mysqli);
} 
 }
?>