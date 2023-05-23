<?php
//We include constants file here
include_once ("../config/constants.php");
include_once ("../adminlogin/validate.php");


//1.get admin id to delete
$id = $_GET['id'];
//2. sql query to delete admin from table
$sql = "DELETE FROM adminlogin WHERE id = $id";

//Execute query
$res = mysqli_query($conn, $sql);

//Check query executed or not

if($res == true) {
    $_SESSION['delete'] = "Admin Deleted Succesfully";
    header("location: ".SITEURL. "adminpanel/dashboard/admin-manager.php");
} else {
    $_SESSION['delete'] = " Failed to Delete Admin";
    header("location: ".SITEURL. "adminpanel/dashboard/admin-manager.php");
}

?>