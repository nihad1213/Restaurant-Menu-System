<?php
function emptyInputSignUp($name, $email, $username, $password, $password2) {
    $result = 0;

    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($password2)) {
        $result = true;      
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidUid($username) {
    $result = 0;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;      
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
	$result = 0;

	if(!filter_var($email ,FILTER_VALIDATE_EMAIL)) {
        $result = true;      
    }
    else {
        $result = false;
    }

    return $result;
}

function passwordMatch($password, $password2) {
	$result = 0;

	if($password !== $password2) {
        $result = true;      
    }
    else {
        $result = false;
    }

    return $result;
}

function usernameExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register/signup.php?error = stmtfailed");
        exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
    
}

function createUser($conn, $name, $email, $username, $password) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPassword) VALUES (?, ?, ?, ?) ;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register/signup.php?error = stmtfailed");
        exit();
	}
	
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt); 
	header("location: ../register/signup.php?error = none");
    exit();
}

function emptyInputLogIn($username, $password) {
    $result = 0;

    if(empty($username) || empty($password)) {
        $result = true;      
    }
    else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $password){
    $usernameExists = usernameExists($conn, $username, $password);

    if ($usernameExists === false) {
        header("location: ../register/login.php?error = wronglogin");
        exit();
    }

    $hashPassword = $usernameExists["usersPassword"];
    $checkPassword = password_verify($password, $hashPassword);

    if ($checkPassword === false) {
        header("location: ../register/login.php?error = wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersID"];
        $_SESSION["username"] = $usernameExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

?>