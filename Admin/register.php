<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek apakah username sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah dipakai!";
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
        if ($insert) {
            header("Location: login.php?msg=registered");
            exit;
        } else {
            $error = "Gagal registrasi: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../Style/Login.css">
</head>
<body>
  <div class="login-card">
    <h2>Registrasi</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
      <label>Username</label>
      <input type="text" name="username" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
  </div>
</body>
</html>
