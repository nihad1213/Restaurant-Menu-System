<?php include ("../partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>

        <br>
        <br>
            <a href="<?php echo SITEURL; ?>adminpanel/dashboard/add-category.php" class="btn-primary">Add Catagory</a>
        <br>


        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image Name</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            
            
            <?php
                //Query to get data
                $sql = "SELECT * FROM category";
                //Execute data
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                //Create serial number (sn)
                $sn = 1;
                //Check data exists or not
                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>
                                    <?php 
                                        if($image_name != "") {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/dishes/<?php echo $image_name;?>" width="100px">
                                             <?php
                                        } else {
                                            echo "Image doesn't included";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $active; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>adminpanel/dashboard/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Delete Category</a> 
                                </td>
                            </tr>
                        <?php

                    }
                } else {
                    ?>

                    <tr>
                        <td colspan="6">No Category Added</td>
                    </tr>

                    <?php
                }
            ?>
        </table>
    </div>
</div>

<?php include ("../partials/footer.php"); ?>
