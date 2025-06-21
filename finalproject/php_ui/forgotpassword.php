<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $create_password = $_POST['create_pass'];
    $conform_password = $_POST['conform_pass'];

    if ($create_password !== $conform_password) {
        $error = "Passwords do not match!";
    } else {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {

            $_SESSION["change"] = true;
            $con_pass = password_hash($create_password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE `users` SET password = ? WHERE email = ?");
            $stmt->execute([$con_pass, $email]);
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email. Please sign up!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Change Password</title>
  <link rel="stylesheet" href="forgot.css" />
</head>
<body>
  <div class="login-container">
    <h2>Change Password</h2>
    
    <form method="POST" class="form">
      <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
      </div>

      <div class="input-group">
        <label for="create_password">Create Password</label>
        <input type="password" name="create_pass" id="create_password" required>
      </div>

      <div class="input-group">
        <label for="conform_password">Conform Password</label>
        <input type="password" name="conform_pass" id="conform_password" required>
      </div>

      <button type="submit">Change Password</button>
    </form>

    <p class="signup-link"><a href="index.php">Back to Login</a></p>
  </div>
</body>
</html>
