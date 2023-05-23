<?php
//including constant files:
include "../config/constants.php";


if(isset($_GET['id']) AND isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove image if it is avaliable
    if($image_name != "") {
        //Image is avaliable so delete it
        $path = "../../images/dishes/".$image_name;
        //Remove image
        $remove = unlink($path);

        //If failed to remowe

        if($remove == false) {
            $_SESSION['remove'] = "Failed to Remove Image From Dishes Image";
            header("location: ".SITEURL."adminpanel/dashboard/manage-catagory.php");
            die();
        }
    }

    //deleting from database
    $sql = "DELETE FROM category WHERE id=$id";

    //Execute $sql
    $res = mysqli_query($conn, $sql);

    if( $res == true) {
        $_SESSION['delete'] = "Deleted Succesfully";
        header("location: ".SITEURL."adminpanel/dashboard/manage-catagory.php");
    } else {
        $_SESSION['delete'] = "Failed to Delete";
        header("location: ".SITEURL."adminpanel/dashboard/manage-catagory.php");
    }

} else {
    header("location: ".SITEURL."adminpanel/dashboard/manage-catagory.php");
}
?>