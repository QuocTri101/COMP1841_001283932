<?php
session_start(); // Start session to store login info

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded login — you can change this
    if ($username === 'admin' && $password === 'secret123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: questions.php'); // Go to admin dashboard
        exit();
    } else {
        $error = 'Incorrect username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="login-wrapper">
  <div class="login-container">
    <h1>Admin Login</h1>

    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
      <label>Username:</label><br>
      <input type="text" name="username" required><br><br>

      <label>Password:</label><br>
      <input type="password" name="password" required><br><br>

      <button type="submit">Login</button>
      <a href="../index.php"><button type="button" class="cancel-button">Cancel</button></a>
    </form>
  </div>
</div>

</body>
</html>