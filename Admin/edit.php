<?php
include '../koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die('ID tidak ditemukan');
}

$id = (int)$_GET['id'];

$q = mysqli_query($koneksi, "SELECT * FROM cek_pembelian WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (!$data) {
  die('Data tidak ditemukan');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul    = $_POST['judul'];
  $email    = $_POST['email'];
  $resolusi = $_POST['resolusi'];
  $status   = $_POST['status'];

  mysqli_query($koneksi, "
    UPDATE cek_pembelian SET
      judul='$judul',
      email='$email',
      resolusi='$resolusi',
      status_pembayaran='$status'
    WHERE id=$id
  ");

  header("Location: cek_pembayaran.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pembayaran</title>
  <link rel="stylesheet" href="../Style/Admin.css?v=<?= time(); ?>">
</head>

<body>

<?php include 'header.php'; ?>

<div class="admin-container">
  <h2>Edit Pembayaran</h2>

  <form method="POST">
    <label>Judul</label>
    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']); ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>

    <label>Resolusi</label>
    <input type="text" name="resolusi" value="<?= htmlspecialchars($data['resolusi']); ?>" required>

    <label>Status</label>
    <select name="status" required>
      <option value="pending" <?= $data['status_pembayaran']=='pending'?'selected':'' ?>>Pending</option>
      <option value="lunas"   <?= $data['status_pembayaran']=='lunas'?'selected':'' ?>>Lunas</option>
      <option value="gagal"   <?= $data['status_pembayaran']=='gagal'?'selected':'' ?>>Gagal</option>
    </select>

    <button type="submit">Simpan</button>
  </form>
</div>

</body>
</html>
