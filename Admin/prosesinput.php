<?php

include '../koneksi.php';

$judul      = $_POST['judul'];
$deskripsi  = $_POST['deskripsi'];
$harga      = $_POST['harga'];
$url_gambar = $_POST['url_gambar'];

$query = "INSERT INTO Foto (Judul, Deskripsi, url_Gambar, Harga)
          VALUES ('$judul', '$deskripsi', '$url_gambar', '$harga')";

if (mysqli_query($koneksi, $query)) {
    header("Location: admin.php");
} else {
    echo mysqli_error($koneksi);
}
