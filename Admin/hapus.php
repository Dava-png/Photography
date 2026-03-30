<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../koneksi.php';

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die('ID tidak ditemukan');
}

$id = (int)$_GET['id'];
echo "ID yang diterima: $id<br>";

$hapus = mysqli_query($koneksi, "DELETE FROM cek_pembelian WHERE id=$id");

if ($hapus) {
  echo "Data dengan ID $id berhasil dihapus.";
  header("Location: cek_pembayaran.php");
  exit;
} else {
  die("Gagal hapus: " . mysqli_error($koneksi));
}
?>
