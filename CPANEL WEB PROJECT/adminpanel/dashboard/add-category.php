<?php include "../partials/menu.php"; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        
        if(isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        ?>
        <br><br>
        <!--Add Category Start-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title" required>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        
        if(isset($_POST['submit'])){

            $title = $_POST['title'];
            
            //This codes used for featured part
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            } 
            else {
                $featured = "No"; 
            }

            //This codes used for active part
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            } 
            else {
                $active = "No"; 
            }

            //This codes used for check image part
            /*print_r($_FILES['image']);

            die();*/
            
            if(isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];
                //Auto rename our img
                $ext = end(explode('.', $image_name));

                $image_name ="Food_Category".rand(000,999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../images/dishes/".$image_name;

                $upload = move_uploaded_file($source_path, $destination_path);
                
                if($upload == false) {
                    $_SESSION['upload'] = "Failed to Add Category";
                    header("location:".SITEURL."adminpanel/dashboard/add-category.php");
                    die();
                }
            
            }    
            else {
                $image_name = "";
            }
            
            //Create sql query to insert Category in database

            $sql = "INSERT INTO category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'            
            ";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Check data added or not
            if($res == true) {
                $_SESSION['add'] = "Added Succesfully";
                header("location:".SITEURL."adminpanel/dashboard/manage-catagory.php");
            } else {
                $_SESSION['add'] = "Failed to Add Category";
                header("location:".SITEURL."adminpanel/dashboard/add-category.php");
            }
        }
            
        ?>

        <!--Add Category End-->

    </div>
</div>

<?php include "../partials/footer.php"; ?>