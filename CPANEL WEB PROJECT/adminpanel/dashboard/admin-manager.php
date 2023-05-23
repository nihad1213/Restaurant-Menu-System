<?php include ("../partials/menu.php"); ?>

    <!--Main Part Start-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <!--Button to add admin-->

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
        ?>
        <br> <br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br>


        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
                
                
            <?php
            //Show admins
            $sql = "SELECT * FROM adminlogin";
            $res = mysqli_query($conn, $sql);
                
            if($res == true) {

                $rows = mysqli_num_rows($res);

                $sn = 1; //it is used to increase id number.

                if ($rows > 0) {
                    while($rows = mysqli_fetch_assoc($res)){    //in while loop we add admin it show admin
                        $id = $rows['id'];
                        $username = $rows['username'];
                    ?>

                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td> <?php echo $username; ?> </td>
                    <td>
                        <a href="<?php echo SITEURL;?>adminpanel/dashboard/delete-admin.php?id=<?php echo $id; ?>"
                        class="btn-secondary">Delete admin</a> 
                    </td>
                    </tr>
                
                <?php
                        
                    }

                }


                }else {

                }

                ?>
            </table>
        </div>
    </div>
    <!--Main Part End-->

<?php include ("../partials/footer.php"); ?>