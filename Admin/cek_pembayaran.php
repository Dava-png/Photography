<?php

include '../koneksi.php';
include 'header.php';
?>

<div class="admin-container page-table">
  <h2>Status Pembayaran</h2>

  <table class="table-status">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Email</th>
        <th>Resolusi</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $q = mysqli_query($koneksi, "SELECT * FROM cek_pembelian");
      while ($d = mysqli_fetch_assoc($q)) {
      ?>
      <tr>
        <td><?= htmlspecialchars($d['judul']); ?></td>
        <td><?= htmlspecialchars($d['email']); ?></td>
        <td><?= htmlspecialchars($d['resolusi']); ?></td>
        <td>
          <span class="status <?= $d['status_pembayaran']; ?>">
            <?= $d['status_pembayaran']; ?>
          </span>
        </td>
        <td>
          <!-- diarahkan ke edit.php -->
          <a href="edit.php?id=<?= (int)$d['id']; ?>" class="action-btn action-edit">Edit</a>
          
          <!-- diarahkan ke hapus.php -->
          <a href="hapus.php?id=<?= (int)$d['id']; ?>"
             class="action-btn action-hapus"
             onclick="return confirm('Yakin hapus data ini?')">
             Hapus
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
