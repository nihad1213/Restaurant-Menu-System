<?php
/*This is file is used to admin login to the admin panel */ 
include_once('config/constants.php');
include_once('validate.php');
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Login Page</title>
</head>
 
<body>
    <form action="validate.php" method="post">
        <div class="login-box">
            <h1>Admin Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="username" placeholder="Enter the admin username">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Enter the admin password">
            </div>
 
            <input class="button" type="submit" name="login" value="Log in">
        </div>
    </form>
</body>
 
</html>