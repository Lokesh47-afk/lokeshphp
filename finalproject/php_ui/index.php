<?php
require 'config.php';

//when password changed succesfull message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();
  
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['home'] = true;
    header("Location: home.php");
    exit();
  } else {
    $error = "Invalid login!";
  }
}

if (isset($_SESSION['change'])) {
    echo "<script>alert('Password changed successfully');</script>";
    unset($_SESSION['change']);
}

//when signup succesfull message

if (isset($_SESSION['sign'])) {
    echo "<script>alert('Signup successfully');</script>";
    unset($_SESSION['sign']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="login.css"/>
</head>
<style>
    span{
       color: red;
       font-weight: bold;
       font-size: 20px;
       text-align: center;
    }
</style>
<body>
  <div class="login-wrapper">
  <div class="login-form">
    <h1>Log In</h1>
    <form method="POST">
      <span>
      <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
      </span>
      <div class="input-group">
        <label><b>Email</b></label>
        <input type="email" name="email" placeholder="you@example.com" required/>
      </div>
      <div class="input-group">
        <label><b>Password</b></label>
        <input type="password" name="password" placeholder="••••••••" required/>
      </div>
      <button type="submit">Log in</button>
    </form>
    <div class="login-extra">
      <p><a href="forgotpassword.php"><b>Forgot password?</b></a></p>
      <p><b>Don't have an account?</b><a href="signUp.php"><b>Sign up</b></a></p>
    </div>
  </div>
  <div class="login-visual"><img class="logicon" src="assets/loginimg.jpeg" /></div>
</div>

</body>
</html>