<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'database.php';
    require_once 'functions.php';

    if(emptyInputLogIn($username, $password) !== false) {
        header("location: ../register/login.php?error = emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else {
    header("location: ../register/login.php?error = emptyinput");
    exit();
}

?>
