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
      <header>Sign Up</header>

      <form action="../includes/signup.inc.php" method="POST">
        <input type="text" placeholder="Enter your name" name = "name" required>
        <input type="text" placeholder="Enter your email" name = "email" required>
        <input type="text" placeholder="Enter your username" name = "username" required>
        <input type="password" placeholder="Enter your password" name = "password" required>
        <input type="password" placeholder="Enter your password again" name = "password2" required>
        <input type="submit" class="button" value="Sign Up" name="submit">
      </form>

      <div class="signup"> 
        <span class="signup">Already have an account?</span>
      <a href="login.php">
        <span>Log in</span>
      </a>  
    </div>
  </div>
  <?php
  if (isset($_GET['error'])) {
  if($_GET['error'] == "emptyinput") {
    echo"<p>Fill in all fields!</p>";
  }
  else if($_GET['error'] == "invalidusername") {
    echo"<p>Choose a proper username!</p>";
  }
  else if($_GET['error'] == "invalidemail") {
    echo"<p>Choose a proper proper email!</p>";
  }
  else if($_GET['error'] == "passwordsdontmatch") {
    echo"<p>Passwords doesn't match!</p>";
  }
  else if($_GET['error'] == "stmtfailed") {
    echo"<p>Somethin went wrong, try again!</p>";
  }
  else if($_GET['error'] == "usernametaken") {
    echo"<p>Username has already taken!</p>";
  }
  else if($_GET['error'] == "none") {
    echo"<p>You have signed up!</p>";
  }

}
?>
</section>
</body>
</html>

<?php
/*
if (isset($_GET['error'])) {
  if($_GET['error'] == "emptyinput") {
    echo"<p>Fill in all fields!</p>";
  }
  else if($_GET['error'] == "invalidusername") {
    echo"<p>Choose a proper username!</p>";
  }
  else if($_GET['error'] == "invalidemail") {
    echo"<p>Choose a proper proper email!</p>";
  }
  else if($_GET['error'] == "passwordsdontmatch") {
    echo"<p>Passwords doesn't match!</p>";
  }
  else if($_GET['error'] == "stmtfailed") {
    echo"<p>Somethin went wrong, try again!</p>";
  }
  else if($_GET['error'] == "usernametaken") {
    echo"<p>Username has already taken!</p>";
  }
  else if($_GET['error'] == "none") {
    echo"<p>You have signed up!</p>";
  }
}
*/
?>
