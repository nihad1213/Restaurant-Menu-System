<?php
session_start();

define('SITEURL', 'http://ijobsnearme.com/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'ijobsnearm_nihad');
define('DB_PASSWORD', 'Nihad1213>');
define('DB_NAME', 'ijobsnearm_restaurant');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));


?>