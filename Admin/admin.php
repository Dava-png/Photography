<?php
include '../koneksi.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin - Tambah Produk</title>
  <link rel="stylesheet" href="../Style/Admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

<div class="admin-container">
  <h2>Tambah Produk Baru</h2>

  <form action="prosesinput.php" method="POST">

    <label>Judul Foto</label>
    <input type="text" name="judul" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" required></textarea>

    <label>Harga</label>
    <input type="number" name="harga" required>

    <label>URL Gambar</label>
    <input type="text" name="url_gambar" required>

    <button type="submit">Simpan Produk</button>
  </form>
</div>

</body>
</html>
