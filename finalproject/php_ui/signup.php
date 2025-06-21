<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["sign"] = true;
    $email = $_POST['email'];
    $username = $_POST['username'];

    if ($_POST['create_password'] !== $_POST['confirm_password']) {
        die("Passwords do not match.");
    }

    $password = password_hash($_POST['create_password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
    $stmt->execute([$email, $password, $username]);

    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <link rel="stylesheet" href="signup.css" />
</head>
<body>
  <div class="signup-container">
    <h1>Registration Form</h1>

    <form method="POST" class="form">
       <div class="input-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      
      <div class="input-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
      </div>

      <div class="input-group">
        <label for="create_password">Create Password</label>
        <input type="password" name="create_password" id="create_password" required>
      </div>

      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
      </div>

      <button type="submit">Sign Up</button>
    </form>

    <button><a style="color:white; text-decoration:none;" href="index.php">Back to Login</a></button>
  </div>
</body>
</html>
