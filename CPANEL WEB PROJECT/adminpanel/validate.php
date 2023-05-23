<?php
include_once ("config/constants.php");

error_reporting(0); 


$sql = "SELECT * FROM adminlogin WHERE username='$_POST[username]';";
$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result);

if(isset($_POST['username'])) {
  if ($result_check > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      header("location: ./dashboard/adminpage.php");
    }
  }
  else {
      echo '<script language="javascript">';
      echo 'alert("Please try again!")';
      echo '</script>';
      
      }
  }
 
   
?>  
