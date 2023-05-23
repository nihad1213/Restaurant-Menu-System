<?php include ("../partials/menu.php"); ?>
<?php include ("../validate.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <br> <br>
        <h1>Add Admin</h1>

        <?php
        if(isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <br>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Admin's name..." required></td>
                </tr>

                <tr>
                    <br>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Admin's password..."required></td>
                </tr>

                <tr>
                    <br>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include ("../partials/footer.php"); ?>

<?php
//Take value and save it in database

//check if submit button is clicked or not

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SQL for Save data in database
    $sql = "INSERT INTO adminlogin SET
        username = '$username',
        password = '$password'
    ";

    //Execeute Query
    $conn = mysqli_connect('localhost', 'ijobsnearm_nihad', 'Nihad1213>') or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, 'restauran') or die(mysqli_error($conn));
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($res == TRUE) {
        $_SESSION['add'] = "Admin added succesfully";
        header("location: ".SITEURL. 'adminpanel/dashboard/admin-manager.php');
    }
    else {
        $_SESSION['add'] = "Failed to Admin added";
        header("location: ".SITEURL. 'adminpanel/dashboard/add-admin.php');
    }
}

?>