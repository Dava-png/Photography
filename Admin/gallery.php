<?php
session_start();
include '../koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM Foto");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery - F2P Photography</title>
  <link rel="stylesheet" href="../Style/Gallery.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>

<header>
  <nav class="navbar">
    <div class="logo">F2P Photography</div>
    <ul class="nav-link">
      <li><a href="../index.php">Home</a></li>
      <li><a href="gallery.php">Gallery</a></li>
    </ul>
  </nav>
</header>

<section class="photo-list-section">
  <h2 class="photo-title">Koleksi Foto</h2>

  <div class="photo-list">
    <?php if(mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="photo-card">
          <img src="<?= $row['url_gambar']; ?>" alt="<?= $row['Judul']; ?>">
          <h3><?= $row['Judul']; ?></h3>
          <p><?= $row['Deskripsi']; ?></p>
          <span class="price">
            Rp <?= number_format($row['Harga'], 0, ',', '.'); ?>
          </span>
          <a href="../index.php?Id=<?= $row['Id']; ?>&img=<?= urlencode($row['url_gambar']); ?>#formPembelian" class="photo-btn">Beli</a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="color:white;">Belum ada foto.</p>
    <?php endif; ?>
  </div>
</section>

<footer>
  <p>© 2026 F2P Photography</p>
</footer>

</body>
</html>
