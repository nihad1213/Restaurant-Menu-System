<?php
  include_once '../includes/database.php';
  include_once '../includes/functions.php';

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSS Link Start -->
  <link rel="stylesheet" href="../css/login.css">
  <!-- CSS Link End -->
</head>
<body>
<section>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>User Profile</header>

      <div>
        <img src="../images/logos/user.png" alt="user">
      </div>


      <?php
        $sql = "SELECT * FROM users WHERE usersUid='$_SESSION[username]';";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<h4>Your Username: $row[usersUid]</h4>";
          }
        }
      ?>   
      
      <?php
        $sql = "SELECT * FROM users WHERE usersUid='$_SESSION[username]';";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<h4>Your Email: $row[usersEmail]</h4>";
          }
        }
      ?> 

      <div class="signup" class="btn"> 
        <a href="../includes/logout.inc.php">
          <span>Log Out</span>
        </a>  
      </div>
    </div>
</section>    
</body>
</html>