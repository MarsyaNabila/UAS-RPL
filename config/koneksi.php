<?php
$conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
