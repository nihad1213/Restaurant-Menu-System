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
      <header>Login</header>

      <form action="../includes/login.inc.php" method="POST">
        <input type="text" placeholder="Enter your username" name = "username" required>
        <input type="password" placeholder="Enter your password" name = "password" required>
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login" name="submit">
      </form>
      
      <div class="signup"> 
        <span class="signup">Don't have an account?</span>
      <a href="signup.php">
        <span>Sign Up</span>
      </a>  
      
      </div>
    </div>
<?php  
if (isset($_GET['error'])) {
  if($_GET['error'] == "emptyinput") {
    echo"<p>Fill in all fields!</p>";
  }
  else if($_GET['error'] == "wronglogin") {
    echo"<p>Incorrect login information!</p>";
  }
}
?>
</section>    
</body>
</html>

