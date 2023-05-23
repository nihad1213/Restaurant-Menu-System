<?php include ("../partials/menu.php"); ?>

 <html>   
    <!--Main Part Start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            
            <div class="col-4 textcenter">
                
                <?php
                $sql = "SELECT * FROM category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                Categories
            </div>

            <div class="col-4 textcenter">
                <?php
                $sql2 = "SELECT * FROM food";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2 ?></h1>
                <br>
                Foods
            </div>

            <div class="col-4 textcenter">
                <?php
                $sql3 = "SELECT * FROM users";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                Total Users
            </div>

            <div class="col-4 textcenter">
                <?php
                $sql4 = "SELECT * FROM users WHERE usersUid = '$_SESSION[username]'";
                $res4 = mysqli_query($conn, $sql4);
                $count4 = mysqli_num_rows($res4);
                ?>
                
                <h1><?php echo $count4; ?></h1>
                <br>
                Active Users
            </div>

            <div class="clearfix">

            </div>
        </div>
    </div>
    <!--Main Part End-->

    <?php include ("../partials/footer.php"); ?>
