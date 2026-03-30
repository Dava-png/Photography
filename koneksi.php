<?php
$koneksi = mysqli_connect("localhost", "root", "", "UAS_PBW");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}