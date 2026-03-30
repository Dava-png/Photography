<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $fotoid   = (int) $_POST['foto_id'];
    $resolusi = mysqli_real_escape_string($koneksi, $_POST['Resolusi']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['Email']);

    // Ambil judul dari tabel Foto (kolom: Id dan Judul)
    $getJudul = mysqli_query($koneksi, "SELECT Judul FROM Foto WHERE Id = $fotoid");
    $dataFoto = mysqli_fetch_assoc($getJudul);
    $judul    = $dataFoto ? $dataFoto['Judul'] : 'Unknown';

    // Insert ke tabel cek_pembelian
    $sql = "INSERT INTO cek_pembelian (foto_id, judul, email, resolusi, status_pembayaran) 
            VALUES ('$fotoid', '$judul', '$email', '$resolusi', 'pending')";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['status'] = 'success';
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['status'] = 'error';
        echo "Query error: " . mysqli_error($koneksi);
    }
}
