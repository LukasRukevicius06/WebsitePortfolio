<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pixelify Sans' rel='stylesheet'>
</head>
<body class="login_body">
  <div class="login-container">
      <h2>Login</h2>

      <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-message">
            <?= htmlspecialchars($_SESSION['login_error']) ?>
        </div>
        <?php unset($_SESSION['login_error']); ?>
      <?php endif; ?>

      <form action="loginProcess.php" method="POST">
          <input type="email" name="email" class="input-field" placeholder="Email" required>
          <input type="password" name="password" class="input-field" placeholder="Password" required>
          <button type="submit" class="login-button">Login</button>
      </form>
  </div>
  <div class="back_button">
      <a href="index.php">Back</a>
  </div>
  <div class="grid_item_5">
      <footer>© 2025 Lukas Rukevicius. All Rights Reserved</footer>
  </div>
</body>
</html>