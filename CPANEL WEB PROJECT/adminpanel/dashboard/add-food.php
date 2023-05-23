<?php include "../partials/menu.php" ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br><br>

        <?php
        if(isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter the name of title" required>
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Enter the Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="num" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                            //Create code to display categories from database
                            $sql = "SELECT * FROM category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);


                            if($count > 0) {
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title;?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Category Found</option>    
                                <?php
                            }

                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" value="Yes" name="featured"> Yes
                        <input type="radio" value="No" name="featured"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" value="Yes" name="active"> Yes
                        <input type="radio" value="No" name="active"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

<?php
//Insert data into database
//check button is clicked or not
if(isset($_POST['submit'])) {
    //1.Get data form FORM
    $title = $_POST['title'];
    $description  = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    //Check radio buttons
    if(isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }

    if(isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    //check for image
    if(isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if($image_name != "") {
            $image_info = explode (".", $image_name);
            $ext = end ($image_info);

            $image_name = "Food-Name-".rand(0000, 9999).".".$ext;

            //Make Source Path

            $src = $_FILES['image']['tmp_name'];
            //destiantion
            $dst = "../../images/food/".$image_name;

            $upload = move_uploaded_file($src, $dst);

            if($upload == false) {
                $_SESSION['upload'] = "Failed to Upload Image";
                header("location:".SITEURL."adminpanel/dashboard/add-food.php");
            }
        }
    } else {
        $image_name = "";
    }

    $sql2 = "INSERT INTO food SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = '$category',
        featured = '$featured',
        active = '$active'    
    ";

    $res2 = mysqli_query($conn, $sql2);

    if($res2 == true) {
        $_SESSION['add'] = "Food Added Succesfully";
        header("location".SITEURL."adminpanel/dashboard/manage-food.php");
    } else {
        $_SESSION['add'] = "Failed to Add Food";
        header("location".SITEURL."adminpanel/dashboard/manage-food.php");
    }
}
?>
    </div>
</div>

<?php include "../partials/footer.php" ?>