<?php

include "../config/constants.php";


if(isset($_GET['id']) && isset($_GET['image_name'])) {
    //1.get id and image name
    
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Check image exists or not

    if($image_name != "") {
        $path = "../../images/food/".$image_name;
        $remove = unlink($path);

        if($remove == false) {
            $_SESSION['upload'] = "Failed to Remove Image";
            header("location: ".SITEURL."adminpanel/dashboard/manage-food.php");
            die();
        }
    }

    $sql = "DELETE FROM food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == true) {
        $_SESSION['delete'] = "Food Deleted Succesfully";
        header("location: ".SITEURL."adminpanel/dashboard/manage-food.php");
    } else {
        $_SESSION['delete'] = "Failed to Delete Food";
        header("location: ".SITEURL."adminpanel/dashboard/manage-food.php");
    }


} else {
    $_SESSION['unathorized'] = "Unathorized Access";
    header("location: ".SITEURL."adminpanel/dashboard/manage-food.php");
}


?>