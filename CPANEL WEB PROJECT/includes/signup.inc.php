<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    require_once 'database.php';
    require_once 'functions.php';

    if(emptyInputSignUp($name, $email, $username, $password, $password2) !== false) {
        header("location: ../register/signup.php?error = emptyinput");
        exit();
    }

    
    if(invalidUid($username) !== false) {
        header("location: ../register/signup.php?error = invalidusername");
        exit();
    }
    
    if(invalidEmail($email) !== false) {
        header("location: ../register/signup.php?error = invalidemail");
        exit();
    }

    if(passwordMatch($password, $password2) !== false) {
        header("location: ../register/signup.php?error = passwordsdontmatch");
        exit();
    }
    
    if(usernameExists($conn, $username, $email) !== false) {
        header("location: ../register/signup.php?error = usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);
}
else {
    header("location: ../register/signup.php");
    exit();
}


?>