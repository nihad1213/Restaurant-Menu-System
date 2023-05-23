<?php include ("../partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br>
        <a href="<?php echo SITEURL; ?>adminpanel/dashboard/add-food.php" class="btn-primary">Add Food</a>
        <br>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['unathorized'])) {
            echo $_SESSION['unathorized'];
            unset($_SESSION['unathorized']);
        }
        ?>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM food";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;
            if($count > 0) {
                while($row=mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                    ?>
                     <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>
                            <?php 
                                if($image_name == "") {
                                    echo "Image Not Added";
                                } else {
                                    ?>
                                        <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>adminpanel/dashboard/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"
                             class="btn-secondary">Delete Food</a> 
                        </td>
                    </tr>

                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>Food Not Added Yet<td></tr>";
            }
            ?>
        </table>    
    </div>
</div>

<?php include ("../partials/footer.php"); ?>
