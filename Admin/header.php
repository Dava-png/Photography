<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Style/Admin.css?v=<?= time(); ?>">
</head>
<body>

<div class="admin-nav">
  <span class="admin-title">Admin Panel</span>
  <a href="cek_pembayaran.php" class="nav-btn">Cek Status Pembayaran</a>
</div>
