<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = $_POST['password'];

    // Ambil data user dari database
    $q = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user'");
    $data = mysqli_fetch_assoc($q);

    // Cek apakah user ada dan password cocok
    if ($data && password_verify($pass, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        // Redirect sesuai role
        if ($data['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../Style/Login.css">
</head>
<body>
  <div class="login-card">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
      <label>Username</label>
      <input type="text" name="username" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Registrasi di sini</a></p>
  </div>
</body>
</html>
