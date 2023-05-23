<?php
 
$conn = "";
  
try {
    $servername = "localhost";
    $dbname = "restauran";
    $username = "root";
    $password = "";
  
    $connect = new PDO( "mysql:host=$servername; dbname=login_register", $username, $password);
     
   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
?>