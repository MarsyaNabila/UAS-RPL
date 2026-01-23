<?php
include "../config/koneksi.php";

$judul     = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit  = $_POST['penerbit'];
$tahun     = $_POST['tahun_terbit'];
$stok      = $_POST['stok'];

$query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok)
          VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$stok')";

mysqli_query($conn, $query);

header("Location: index.php");
