<?php

$serverName = "localhost";
$dbUsername = "ijobsnearm_nihad";
$dbPassword = "Nihad1213>";
$dbName = "ijobsnearm_restaurant";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}

?>